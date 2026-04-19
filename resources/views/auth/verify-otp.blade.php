<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code | HopeCare Hospital</title>
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
            --danger: #c24141;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Manrope", sans-serif;
            color: #132536;
            background:
                radial-gradient(circle at 10% 20%, rgba(15, 159, 154, 0.2), transparent 28rem),
                radial-gradient(circle at 95% 10%, rgba(212, 154, 42, 0.2), transparent 24rem),
                linear-gradient(135deg, #f4fbfb 0%, #eef5fb 46%, #fff8ed 100%);
        }

        .otp-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 34px 16px;
            overflow: hidden;
            position: relative;
        }

        .otp-shell::before,
        .otp-shell::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            opacity: 0.22;
        }

        .otp-shell::before {
            width: 360px;
            height: 360px;
            left: -160px;
            bottom: -140px;
            background: var(--teal);
        }

        .otp-shell::after {
            width: 300px;
            height: 300px;
            right: -120px;
            top: -110px;
            background: var(--gold);
        }

        .otp-card {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1080px;
            overflow: hidden;
            border-radius: 34px;
            background: rgba(255, 255, 255, 0.86);
            border: 1px solid rgba(255, 255, 255, 0.92);
            box-shadow: 0 34px 100px rgba(8, 47, 73, 0.2);
            backdrop-filter: blur(22px);
        }

        .otp-visual {
            min-height: 640px;
            background:
                linear-gradient(180deg, rgba(3, 25, 38, 0.12), rgba(3, 25, 38, 0.86)),
                url('{{ asset('images/your-report.jpg') }}') center center / cover no-repeat;
            color: #ffffff;
            padding: 38px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            width: fit-content;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-radius: 999px;
            padding: 10px 14px;
            font-weight: 800;
            text-decoration: none;
            backdrop-filter: blur(12px);
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

        .security-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 26px;
        }

        .security-card {
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 18px;
            padding: 16px;
            backdrop-filter: blur(12px);
        }

        .security-card strong {
            display: block;
            font-size: 22px;
            line-height: 1;
        }

        .security-card span {
            display: block;
            color: rgba(255, 255, 255, 0.78);
            font-size: 12px;
            font-weight: 700;
            margin-top: 6px;
        }

        .otp-form-side {
            padding: clamp(32px, 5vw, 58px);
        }

        .otp-badge {
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

        .otp-title {
            color: var(--deep);
            font-family: "Playfair Display", serif;
            font-size: clamp(38px, 4vw, 54px);
            line-height: 1;
            letter-spacing: -0.04em;
            margin-bottom: 12px;
        }

        .otp-subtitle {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .form-label {
            color: var(--navy);
            font-weight: 800;
            font-size: 14px;
        }

        .otp-input {
            border: 1px solid var(--line);
            border-radius: 22px;
            min-height: 72px;
            padding: 16px 18px;
            background: #fbfdff;
            color: var(--deep);
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 0.42em;
            text-align: center;
        }

        .otp-input:focus {
            border-color: rgba(15, 159, 154, 0.7);
            box-shadow: 0 0 0 0.24rem rgba(15, 159, 154, 0.12);
        }

        .btn-verify,
        .btn-resend,
        .btn-logout {
            border-radius: 999px;
            font-weight: 800;
            min-height: 52px;
        }

        .btn-verify {
            border: 0;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            box-shadow: 0 16px 34px rgba(15, 108, 191, 0.28);
        }

        .btn-verify:hover {
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-resend {
            color: var(--navy);
            background: #ffffff;
            border: 1px solid var(--line);
        }

        .btn-resend:hover {
            color: var(--navy);
            background: #edf7f6;
        }

        .btn-logout {
            color: var(--danger);
            background: rgba(194, 65, 65, 0.08);
            border: 1px solid rgba(194, 65, 65, 0.18);
        }

        .helper-panel {
            background: #f7fbfd;
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 18px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        .helper-panel strong {
            color: var(--navy);
        }

        .alert {
            border-radius: 16px;
            border: 0;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .otp-visual {
                min-height: 390px;
            }
        }

        @media (max-width: 575px) {
            .otp-card {
                border-radius: 24px;
            }

            .otp-visual {
                padding: 24px;
                min-height: 350px;
            }

            .security-grid {
                grid-template-columns: 1fr;
            }

            .otp-input {
                font-size: 28px;
                letter-spacing: 0.26em;
            }
        }
    </style>
</head>
<body>
    <main class="otp-shell">
        <div class="otp-card">
            <div class="row g-0">
                <div class="col-lg-6 otp-visual">
                    <a href="{{ route('home') }}" class="brand-pill">
                        <span class="brand-mark">HC</span>
                        <span>HopeCare Hospital</span>
                    </a>

                    <div>
                        <h1 class="visual-title">One secure step before your dashboard.</h1>
                        <p class="visual-copy mb-0">
                            We sent a 6-digit verification code to your email so only you can access this HopeCare account.
                        </p>
                        <div class="security-grid">
                            <div class="security-card">
                                <strong>6</strong>
                                <span>Digit code</span>
                            </div>
                            <div class="security-card">
                                <strong>10m</strong>
                                <span>Valid window</span>
                            </div>
                            <div class="security-card">
                                <strong>Safe</strong>
                                <span>Account check</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 otp-form-side">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <div class="otp-badge">Secure verification</div>
                    <h2 class="otp-title">Verify your email</h2>
                    <p class="otp-subtitle">
                        Enter the 6-digit code from your inbox. After verification, we will take you straight to the correct portal for your role.
                    </p>

                    <form method="POST" action="{{ route('verify.otp') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Verification Code</label>
                            <input
                                type="text"
                                name="otp"
                                class="form-control otp-input"
                                maxlength="6"
                                inputmode="numeric"
                                autocomplete="one-time-code"
                                pattern="[0-9]{6}"
                                placeholder="000000"
                                required>
                            @error('otp')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-verify w-100">Verify and Continue</button>
                    </form>

                    <div class="row g-3 mt-2">
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('verify.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-resend w-100">Resend Code</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-logout w-100">Logout</button>
                            </form>
                        </div>
                    </div>

                    <div class="helper-panel mt-4">
                        <strong>Didn't receive the code?</strong>
                        Check your spam folder, confirm your email address is correct, or use Resend Code to generate a fresh verification code.
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
