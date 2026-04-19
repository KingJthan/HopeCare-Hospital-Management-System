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

    public function showStaffRegister()
    {
        return view('auth.staff-register', [
            'staffRoles' => $this->staffRegistrationRoles(),
        ]);
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

        $this->logoutCurrentUser($request);

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

        return redirect()->route('verify.notice')->with('success', 'Verification code sent to your email.');
    }

    public function registerStaff(Request $request)
    {
        $allowedRoles = array_keys($this->staffRegistrationRoles());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'string', 'in:' . implode(',', $allowedRoles)],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $this->logoutCurrentUser($request);

        $otp = (string) random_int(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        Auth::login($user);

        return redirect()->route('verify.notice')->with('success', 'Staff account created. Verification code sent to your email.');
    }

    public function showLogin($role = null)
    {
        $allowedRoles = array_keys($this->roleLabels());

        if ($role !== null) {
            $role = strtolower($role);

            if (!in_array($role, $allowedRoles, true)) {
                abort(404);
            }
        }

        return view('auth.login', [
            'roleLabel' => $role ? $this->roleLabels()[$role] : 'User',
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

        $credentials = $request->only('email', 'password');

        $this->logoutCurrentUser($request);

        if (!Auth::attempt($credentials)) {
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

        return redirect()->route('verify.notice')->with('success', 'Verification code sent to your email.');
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
                'otp' => 'No verification code found. Please request a new one.',
            ]);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors([
                'otp' => 'Verification code has expired. Please request a new one.',
            ]);
        }

        if ($request->otp !== $user->email_otp) {
            return back()->withErrors([
                'otp' => 'Invalid verification code.',
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

        return back()->with('success', 'New verification code sent successfully.');
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

        if ($user->hasRole('nurse')) {
            return redirect()->route('nurse.dashboard');
        }

        if ($user->hasRole('cne')) {
            return redirect()->route('cne.dashboard');
        }

        if ($user->hasRole('housekeeping')) {
            return redirect()->route('housekeeping.dashboard');
        }

        if ($user->hasRole('security')) {
            return redirect()->route('security.dashboard');
        }

        if ($user->hasRole('patient')) {
            return redirect()->route('patient.dashboard');
        }

        return redirect()->route('portal')->with('error', 'No role assigned to this account.');
    }

    private function staffRegistrationRoles(): array
    {
        return [
            'doctor' => 'Doctor',
            'receptionist' => 'Receptionist',
            'nurse' => 'Nurse',
            'cne' => 'CNE',
            'housekeeping' => 'House Keeping',
            'security' => 'Security',
        ];
    }

    private function roleLabels(): array
    {
        return [
            'admin' => 'Admin',
            'doctor' => 'Doctor',
            'receptionist' => 'Receptionist',
            'nurse' => 'Nurse',
            'cne' => 'CNE',
            'housekeeping' => 'House Keeping',
            'security' => 'Security',
            'patient' => 'Patient',
        ];
    }

    private function logoutCurrentUser(Request $request): void
    {
        if (!Auth::check()) {
            return;
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
