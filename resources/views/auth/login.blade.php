<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $roleLabel ?? 'Login' }} Login | HopeCare Hospital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        :root {
            --deep: #031926;
            --navy: #082f49;
            --blue: #0f6cbf;
            --teal: #0f9f9a;
            --gold: #d49a2a;
            --paper: #ffffff;
            --muted: #667789;
            --line: #dfeaf2;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Manrope", sans-serif;
            color: #132536;
            background:
                radial-gradient(circle at 12% 16%, rgba(15, 159, 154, 0.22), transparent 28rem),
                radial-gradient(circle at 92% 8%, rgba(212, 154, 42, 0.2), transparent 24rem),
                linear-gradient(135deg, #f4fbfb 0%, #eef5fb 48%, #fff8ed 100%);
        }

        .auth-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding: 34px 16px;
            position: relative;
            overflow: hidden;
        }

        .auth-shell::before,
        .auth-shell::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            opacity: 0.24;
            pointer-events: none;
        }

        .auth-shell::before {
            width: 360px;
            height: 360px;
            background: var(--teal);
            left: -160px;
            bottom: -140px;
        }

        .auth-shell::after {
            width: 300px;
            height: 300px;
            background: var(--gold);
            right: -120px;
            top: -110px;
        }

        .auth-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1120px;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.92);
            border-radius: 34px;
            overflow: hidden;
            box-shadow: 0 34px 100px rgba(8, 47, 73, 0.2);
            backdrop-filter: blur(22px);
        }

        .auth-visual {
            min-height: 680px;
            background:
                linear-gradient(180deg, rgba(3, 25, 38, 0.16), rgba(3, 25, 38, 0.88)),
                url('{{ asset('images/doctor-nurse-celebrate.jpg') }}') center center / cover no-repeat;
            position: relative;
            padding: 38px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #ffffff;
        }

        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-radius: 999px;
            padding: 10px 14px;
            backdrop-filter: blur(12px);
            font-weight: 800;
            width: fit-content;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            font-weight: 800;
        }

        .visual-title {
            font-family: "Playfair Display", serif;
            font-size: clamp(36px, 4vw, 58px);
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 16px;
        }

        .visual-copy {
            color: rgba(255, 255, 255, 0.84);
            font-size: 17px;
            line-height: 1.75;
            max-width: 520px;
        }

        .visual-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 28px;
        }

        .visual-stat {
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 18px;
            padding: 16px;
            backdrop-filter: blur(12px);
        }

        .visual-stat strong {
            display: block;
            font-size: 24px;
            line-height: 1;
        }

        .visual-stat span {
            display: block;
            color: rgba(255, 255, 255, 0.78);
            font-size: 12px;
            font-weight: 700;
            margin-top: 6px;
        }

        .auth-form-side {
            padding: clamp(32px, 5vw, 58px);
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--teal);
            background: rgba(15, 159, 154, 0.1);
            border: 1px solid rgba(15, 159, 154, 0.2);
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 9px 13px;
            margin-bottom: 18px;
        }

        .auth-title {
            color: var(--deep);
            font-family: "Playfair Display", serif;
            font-size: clamp(38px, 4vw, 54px);
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 12px;
        }

        .auth-subtitle {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .form-label {
            color: var(--navy);
            font-weight: 800;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid var(--line);
            border-radius: 16px;
            min-height: 52px;
            padding: 13px 15px;
            background: #fbfdff;
            font-weight: 600;
        }

        .form-control:focus {
            border-color: rgba(15, 159, 154, 0.7);
            box-shadow: 0 0 0 0.24rem rgba(15, 159, 154, 0.12);
        }

        .btn-login {
            border: 0;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            box-shadow: 0 16px 34px rgba(15, 108, 191, 0.28);
            color: #ffffff;
            font-weight: 800;
            min-height: 52px;
        }

        .btn-login:hover {
            color: #ffffff;
            transform: translateY(-1px);
        }

        .portal-links {
            background: #f7fbfd;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 18px;
        }

        .small-link {
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .small-link a {
            color: var(--blue);
            font-weight: 800;
            text-decoration: none;
        }

        .auth-credit-footer {
            position: relative;
            z-index: 2;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-align: center;
        }

        @media (max-width: 991px) {
            .auth-visual {
                min-height: 420px;
            }
        }

        @media (max-width: 575px) {
            .auth-card {
                border-radius: 24px;
            }

            .auth-visual {
                padding: 24px;
                min-height: 360px;
            }

            .visual-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="auth-shell">
        <div class="auth-card">
            <div class="row g-0">
                <div class="col-lg-6 auth-visual">
                    <a href="{{ route('home') }}" class="brand-pill text-white">
                        <span class="brand-mark">HC</span>
                        <span>HopeCare Hospital</span>
                    </a>

                    <div>
                        <h1 class="visual-title">Secure access for modern care teams.</h1>
                        <p class="visual-copy mb-0">
                            A polished digital entry point for patients, clinical teams, care support, and administrators.
                        </p>
                        <div class="visual-stats">
                            <div class="visual-stat">
                                <strong>24/7</strong>
                                <span>Ambulance support</span>
                            </div>
                            <div class="visual-stat">
                                <strong>Home</strong>
                                <span>Care access</span>
                            </div>
                            <div class="visual-stat">
                                <strong>Fast</strong>
                                <span>Digital records</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 auth-form-side">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <div class="role-badge">{{ $roleLabel ?? 'User' }} Portal</div>
                    <h2 class="auth-title">{{ $roleLabel ?? 'User' }} Login</h2>
                    <p class="auth-subtitle">
                        Sign in to continue to your secure HopeCare workspace. We will confirm your email before opening your dashboard.
                    </p>

                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf

                        <input type="hidden" name="expected_role" value="{{ strtolower($expectedRole ?? '') }}">

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="name@example.com" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-login w-100">Continue Securely</button>
                    </form>

                    <div class="portal-links mt-4 text-center">
                        @if(($expectedRole ?? '') === 'patient')
                            <div class="small-link">
                                New patient? <a href="{{ route('register') }}">Create a patient account</a>
                            </div>
                        @elseif(in_array(($expectedRole ?? ''), ['doctor', 'receptionist', 'nurse', 'cne', 'housekeeping', 'security'], true))
                            <div class="small-link">
                                New staff member? <a href="{{ route('staff.register') }}">Register staff account</a>
                            </div>
                        @endif

                        <div class="small-link mt-2">
                            <a href="{{ route('portal') }}">Back to portal selection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="auth-credit-footer">
            Copyright {{ date('Y') }} HopeCare Hospital. All rights reserved. | Jonathan Mugume VU-BBC-2411-1587-DAY {{ date('Y') }}.
        </footer>
    </main>
</body>
</html>
