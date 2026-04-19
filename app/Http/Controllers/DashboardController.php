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

        $patientsByGender = Patient::get(['gender'])
            ->groupBy(function ($patient) {
                return $patient->gender ? ucfirst(strtolower($patient->gender)) : 'Unspecified';
            })
            ->map->count();

        $drugsByCategory = Category::withCount('drugs')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->drugs_count];
            });

        return view('dashboards.admin-dashboard', [
            'totalPatients' => Patient::count(),
            'totalDrugs' => Drug::count(),
            'totalCategories' => Category::count(),
            'totalTreatments' => Treatment::count(),
            'recentPatients' => Patient::latest()->take(5)->get(),
            'dashboardData' => [
                'patientsByGender' => [
                    'labels' => $patientsByGender->keys()->values(),
                    'values' => $patientsByGender->values(),
                ],
                'drugsByCategory' => [
                    'labels' => $drugsByCategory->keys()->values(),
                    'values' => $drugsByCategory->values(),
                ],
            ],
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

    public function nurse()
    {
        if (!auth()->check() || !auth()->user()->hasRole('nurse')) {
            abort(403);
        }

        return $this->staffDashboard(
            'Nurse Dashboard',
            'Coordinate patient care, bedside support, treatment follow-up, and daily clinical communication.',
            'nurse-smile.jpg',
            [
                ['label' => 'Patients in System', 'value' => Patient::count(), 'icon' => 'fa-user-injured'],
                ['label' => 'Treatment Records', 'value' => Treatment::count(), 'icon' => 'fa-notes-medical'],
                ['label' => 'Active Care Queues', 'value' => Patient::whereNotNull('token_number')->count(), 'icon' => 'fa-ticket'],
            ],
            [
                'Review patient queue and token status.',
                'Support doctors with treatment coordination.',
                'Guide patients toward follow-up and report access.',
            ]
        );
    }

    public function cne()
    {
        if (!auth()->check() || !auth()->user()->hasRole('cne')) {
            abort(403);
        }

        return $this->staffDashboard(
            'CNE Dashboard',
            'Support clinical nursing education, care standards, team readiness, and patient-safety workflows.',
            'cne.jpg',
            [
                ['label' => 'Care Team Roles', 'value' => 6, 'icon' => 'fa-people-group'],
                ['label' => 'Treatment Records', 'value' => Treatment::count(), 'icon' => 'fa-notes-medical'],
                ['label' => 'Patient Records', 'value' => Patient::count(), 'icon' => 'fa-hospital-user'],
            ],
            [
                'Coordinate nursing education priorities.',
                'Monitor clinical documentation quality.',
                'Support safe handover and care standards.',
            ]
        );
    }

    public function housekeeping()
    {
        if (!auth()->check() || !auth()->user()->hasRole('housekeeping')) {
            abort(403);
        }

        return $this->staffDashboard(
            'House Keeping Dashboard',
            'Keep hospital spaces clean, safe, welcoming, and ready for patients, visitors, and care teams.',
            'housekeeping.jpg',
            [
                ['label' => 'Priority Areas', 'value' => 8, 'icon' => 'fa-broom'],
                ['label' => 'Patient Areas', 'value' => Patient::count(), 'icon' => 'fa-bed'],
                ['label' => 'Safety Checks', 'value' => 'Daily', 'icon' => 'fa-shield-heart'],
            ],
            [
                'Prioritize reception, walkways, and patient areas.',
                'Support infection prevention and comfort.',
                'Coordinate readiness with reception and nursing teams.',
            ]
        );
    }

    public function security()
    {
        if (!auth()->check() || !auth()->user()->hasRole('security')) {
            abort(403);
        }

        return $this->staffDashboard(
            'Security Dashboard',
            'Support access control, visitor flow, safety monitoring, and secure hospital operations.',
            'security-team.jpg',
            [
                ['label' => 'Open Hours', 'value' => '24/7', 'icon' => 'fa-clock'],
                ['label' => 'Visitor Flow', 'value' => 'Active', 'icon' => 'fa-person-walking'],
                ['label' => 'Safety Status', 'value' => 'Ready', 'icon' => 'fa-shield-halved'],
            ],
            [
                'Monitor public entrances and staff access points.',
                'Support safe visitor movement through the facility.',
                'Coordinate urgent response with clinical teams.',
            ]
        );
    }

    private function staffDashboard(string $title, string $subtitle, string $image, array $stats, array $tasks)
    {
        return view('dashboards.staff-dashboard', [
            'title' => $title,
            'subtitle' => $subtitle,
            'image' => $image,
            'stats' => $stats,
            'tasks' => $tasks,
            'recentPatients' => Patient::latest()->take(5)->get(),
        ]);
    }
}
