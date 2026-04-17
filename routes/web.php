<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TreatmentController;

Route::get('/force-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('force.logout');

Route::get('/', function () {
    return view('auth.portal');
})->name('home');

Route::get('/portal', function () {
    return view('auth.portal');
})->name('portal');

Route::get('/login/admin', [AuthController::class, 'showLogin'])
    ->defaults('role', 'admin')
    ->name('login.admin');

Route::get('/login/doctor', [AuthController::class, 'showLogin'])
    ->defaults('role', 'doctor')
    ->name('login.doctor');

Route::get('/login/receptionist', [AuthController::class, 'showLogin'])
    ->defaults('role', 'receptionist')
    ->name('login.receptionist');

Route::get('/login/patient', [AuthController::class, 'showLogin'])
    ->defaults('role', 'patient')
    ->name('login.patient');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', function () {
        return redirect()->route('login.patient');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('verify.notice');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('verify.resend');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'otp.verified'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/doctor/dashboard', [DashboardController::class, 'doctor'])->name('doctor.dashboard');
    Route::get('/receptionist/dashboard', [DashboardController::class, 'receptionist'])->name('receptionist.dashboard');
    Route::get('/patient/dashboard', [DashboardController::class, 'patient'])->name('patient.dashboard');

    Route::resource('patients', PatientController::class)->except(['show']);
    Route::get('/now-serving', [PatientController::class, 'nowServing'])->name('patients.nowServing');
    Route::get('/patients/{id}/print-token', [PatientController::class, 'printToken'])->name('patients.printToken');
    Route::post('/patients/{id}/assign-token', [PatientController::class, 'assignToken'])->name('patients.assignToken');

    Route::resource('categories', CategoryController::class);
    Route::resource('drugs', DrugController::class);
    Route::resource('treatments', TreatmentController::class);

    Route::get('/patient/treatments', [TreatmentController::class, 'myTreatments'])->name('patient.treatments');
    Route::get('/patient/token', [PatientController::class, 'myToken'])->name('patient.token');
});