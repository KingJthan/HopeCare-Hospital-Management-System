<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('assignedDoctor')->orderBy('id')->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Patient::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'token_number' => Patient::nextTokenNumber(),
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $patient->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }

    public function nowServing()
    {
        $patientsWithTokens = Patient::with('assignedDoctor')
            ->whereNotNull('token_number')
            ->get()
            ->sortBy(fn (Patient $patient) => $this->queueSortKey($patient))
            ->values();

        $current = $patientsWithTokens->first();
        $queue = $patientsWithTokens->skip(1)->take(5)->values();
        $activeTokenCount = $patientsWithTokens->count();
        $managedPatients = Patient::with('assignedDoctor')
            ->get()
            ->sortBy(fn (Patient $patient) => $this->queueSortKey($patient))
            ->values();
        $doctors = User::where('role', 'doctor')->orderBy('name')->get();

        return view('patients.now-serving', compact('current', 'queue', 'activeTokenCount', 'managedPatients', 'doctors'));
    }

    public function printToken(string $id)
    {
        $patient = Patient::with('assignedDoctor')->findOrFail($id);

        if (!$patient->token_number) {
            $patient->token_number = Patient::nextTokenNumber();
            $patient->save();
        }

        return view('patients.print-token', compact('patient'));
    }

    public function myToken()
    {
        $patient = Patient::with('assignedDoctor')->where('user_id', auth()->id())->firstOrFail();
        return view('patient.token', compact('patient'));
    }

    public function assignToken(string $id)
    {
        $patient = Patient::findOrFail($id);

        if (!$patient->token_number) {
            $patient->token_number = Patient::nextTokenNumber();
            $patient->save();
        }

        return redirect()->route('patients.index')->with('success', 'Token assigned successfully.');
    }

    public function updateQueue(Request $request, Patient $patient)
    {
        $request->merge([
            'token_number' => $this->normalizeTokenInput($request->input('token_number')),
        ]);

        $validated = $request->validate([
            'token_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('patients', 'token_number')->ignore($patient->id),
            ],
            'assigned_doctor_id' => [
                'nullable',
                'integer',
                Rule::exists('users', 'id')->where(fn ($query) => $query->where('role', 'doctor')),
            ],
        ]);

        $patient->update([
            'token_number' => $validated['token_number'],
            'assigned_doctor_id' => $validated['assigned_doctor_id'] ?? null,
        ]);

        return redirect()->route('patients.nowServing')->with('success', 'Queue details updated successfully.');
    }

    private function normalizeTokenInput(?string $token): string
    {
        $token = strtoupper(trim((string) $token));

        if (preg_match('/^\d+$/', $token)) {
            return 'F' . str_pad($token, 3, '0', STR_PAD_LEFT);
        }

        return $token;
    }

    private function queueSortKey(Patient $patient): string
    {
        $hasToken = $patient->token_number ? 0 : 1;
        $tokenNumber = $patient->token_number
            ? (int) preg_replace('/[^0-9]/', '', $patient->token_number)
            : 999999;

        return sprintf('%d-%06d-%06d', $hasToken, $tokenNumber, $patient->id);
    }
}
