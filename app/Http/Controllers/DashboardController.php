<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        if (!auth()->check() || !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        return view('dashboards.admin-dashboard', [
            'totalPatients' => Patient::count(),
            'totalDrugs' => Drug::count(),
            'totalCategories' => Category::count(),
            'totalTreatments' => Treatment::count(),
            'recentPatients' => Patient::latest()->take(5)->get(),
        ]);
    }

    public function receptionist()
    {
        if (!auth()->check() || !auth()->user()->hasRole('receptionist')) {
            abort(403);
        }

        return view('dashboards.receptionist-dashboard', [
            'totalPatients' => Patient::count(),
            'recentPatients' => Patient::latest()->take(5)->get(),
            'queuePatients' => Patient::latest()->take(5)->get(),
        ]);
    }

    public function doctor()
    {
        if (!auth()->check() || !auth()->user()->hasRole('doctor')) {
            abort(403);
        }

        return view('dashboards.doctor-dashboard', [
            'totalDrugs' => Drug::count(),
            'totalCategories' => Category::count(),
            'totalTreatments' => Treatment::count(),
            'recentTreatments' => Treatment::with(['patient', 'drug'])->latest()->take(5)->get(),
        ]);
    }

    public function patient()
    {
        if (!auth()->check() || !auth()->user()->hasRole('patient')) {
            abort(403);
        }

        $patient = Patient::where('user_id', auth()->id())->first();

        if (!$patient) {
            return view('dashboards.patient-dashboard', [
                'latestTreatment' => null,
                'latestPatient' => null,
                'patientTreatments' => collect(),
            ]);
        }

        $latestTreatment = Treatment::with(['patient', 'drug'])
            ->where('patient_id', $patient->id)
            ->latest()
            ->first();

        $patientTreatments = Treatment::with(['patient', 'drug'])
            ->where('patient_id', $patient->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboards.patient-dashboard', [
            'latestTreatment' => $latestTreatment,
            'latestPatient' => $patient,
            'patientTreatments' => $patientTreatments,
        ]);
    }
}