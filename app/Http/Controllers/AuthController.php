<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'gender' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer', 'min:0'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $otp = (string) random_int(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
            'email_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Patient::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'token_number' => null,
        ]);

        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        Auth::login($user);

        return redirect()->route('verify.notice')->with('success', 'OTP sent to your email.');
    }

    public function showLogin($role = null)
    {
        $allowedRoles = ['admin', 'doctor', 'receptionist', 'patient'];

        if ($role !== null) {
            $role = strtolower($role);

            if (!in_array($role, $allowedRoles, true)) {
                abort(404);
            }
        }

        return view('auth.login', [
            'roleLabel' => $role ? ucfirst($role) : 'User',
            'expectedRole' => $role ?? '',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'expected_role' => ['nullable', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->withInput();
        }

        $request->session()->regenerate();

        $user = Auth::user();
        $expectedRole = strtolower(trim($request->expected_role ?? ''));

        if ($expectedRole !== '' && strtolower((string) $user->role) !== $expectedRole) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'You do not have access to the selected portal.',
            ])->withInput();
        }

        $otp = (string) random_int(100000, 999999);

        $user->update([
            'email_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        return redirect()->route('verify.notice')->with('success', 'OTP sent to your email.');
    }

    public function showVerifyOtp()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->email_otp || !$user->otp_expires_at) {
            return back()->withErrors([
                'otp' => 'No OTP found. Please request a new one.',
            ]);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors([
                'otp' => 'OTP has expired. Please request a new one.',
            ]);
        }

        if ($request->otp !== $user->email_otp) {
            return back()->withErrors([
                'otp' => 'Invalid OTP.',
            ]);
        }

        $user->update([
            'email_verified_at' => now(),
            'email_otp' => null,
            'otp_expires_at' => null,
        ]);

        return $this->redirectByRole($user)->with('success', 'Email verified successfully.');
    }

    public function resendOtp()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $otp = (string) random_int(100000, 999999);

        $user->update([
            'email_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        return back()->with('success', 'New OTP sent successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('portal')->with('success', 'Logged out successfully.');
    }

    private function redirectByRole($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('doctor')) {
            return redirect()->route('doctor.dashboard');
        }

        if ($user->hasRole('receptionist')) {
            return redirect()->route('receptionist.dashboard');
        }

        if ($user->hasRole('patient')) {
            return redirect()->route('patient.dashboard');
        }

        return redirect()->route('portal')->with('error', 'No role assigned to this account.');
    }
}