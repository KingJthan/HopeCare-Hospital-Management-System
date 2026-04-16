<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | HopeCare Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: #f5f7fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .otp-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.12);
            border: none;
        }

        .otp-title {
            color: #173b6d;
            font-weight: 700;
        }

        .btn-primary {
            padding: 12px;
            font-weight: 600;
        }

        .btn-outline-secondary,
        .btn-danger {
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card otp-card">
                    <div class="card-body p-4">
                        <h3 class="mb-3 text-center otp-title">Verify OTP</h3>
                        <p class="text-muted text-center">Enter the 6-digit code sent to your email.</p>

                        <form method="POST" action="{{ route('verify.otp') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">OTP Code</label>
                                <input type="text" name="otp" class="form-control" maxlength="6" required>
                                @error('otp')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
                        </form>

                        <form method="POST" action="{{ route('verify.resend') }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary w-100">Resend OTP</button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>