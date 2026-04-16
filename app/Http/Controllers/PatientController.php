<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('id')->get();

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

        $tokenNumber = $this->generateNextToken();

        Patient::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'token_number' => $tokenNumber,
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
        $patientsWithTokens = Patient::whereNotNull('token_number')->orderBy('id')->get();

        $current = $patientsWithTokens->first();
        $queue = $patientsWithTokens->skip(1)->take(5);

        return view('patients.now-serving', compact('current', 'queue'));
    }

    public function printToken(string $id)
    {
        $patient = Patient::findOrFail($id);

        if (!$patient->token_number) {
            $patient->token_number = $this->generateNextToken();
            $patient->save();
        }

        return view('patients.print-token', compact('patient'));
    }

    public function myToken()
    {
        $patient = Patient::where('user_id', auth()->id())->firstOrFail();
        return view('patient.token', compact('patient'));
    }

    public function assignToken(string $id)
    {
        $patient = Patient::findOrFail($id);

        if (!$patient->token_number) {
            $patient->token_number = $this->generateNextToken();
            $patient->save();
        }

        return redirect()->route('patients.index')->with('success', 'Token assigned successfully.');
    }

    private function generateNextToken()
    {
        $lastPatient = Patient::whereNotNull('token_number')
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = 1;

        if ($lastPatient && $lastPatient->token_number) {
            $lastNumber = (int) preg_replace('/[^0-9]/', '', $lastPatient->token_number);
            $nextNumber = $lastNumber + 1;
        }

        return 'F' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }
}