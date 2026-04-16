<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Patient;
use App\Models\Drug;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::with(['patient', 'drug'])->latest()->get();
        return view('treatments.index', compact('treatments'));
    }

    public function myTreatments()
    {
        $patient = Patient::where('user_id', auth()->id())->firstOrFail();

        $treatments = Treatment::with(['patient', 'drug'])
            ->where('patient_id', $patient->id)
            ->latest()
            ->get();

        return view('patient.treatments', compact('treatments', 'patient'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        $drugs = Drug::orderBy('name')->get();

        return view('treatments.create', compact('patients', 'drugs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'drug_id' => 'required|exists:drugs,id',
            'dosage' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Treatment::create($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        $patients = Patient::orderBy('name')->get();
        $drugs = Drug::orderBy('name')->get();

        return view('treatments.edit', compact('treatment', 'patients', 'drugs'));
    }

    public function update(Request $request, string $id)
    {
        $treatment = Treatment::findOrFail($id);

        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'drug_id' => 'required|exists:drugs,id',
            'dosage' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $treatment->update($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment updated successfully.');
    }

    public function destroy(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('treatments.index')->with('success', 'Treatment deleted successfully.');
    }
}