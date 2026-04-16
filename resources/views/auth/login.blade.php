<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $roleLabel ?? 'Login' }} Login | HopeCare Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #eaf3ff, #f8fbff);
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.12);
            background: #fff;
        }

        .login-image-side {
            background: url('{{ asset('images/nurse-team.jpg') }}') center center/cover no-repeat;
            min-height: 520px;
            position: relative;
        }

        .login-image-side::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(21, 82, 160, 0.55);
        }

        .login-image-text {
            position: relative;
            z-index: 2;
            color: #fff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: end;
            height: 100%;
        }

        .login-form-side {
            padding: 40px 32px;
        }

        .brand-title {
            font-size: 30px;
            font-weight: 700;
            color: #173b6d;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            color: #6c757d;
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-login {
            background: #1e63b5;
            border: none;
            padding: 12px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #184f90;
        }

        .small-link {
            font-size: 14px;
        }

        .role-badge {
            display: inline-block;
            background: #eaf3ff;
            color: #173b6d;
            border-radius: 30px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="container login-wrapper">
        <div class="row g-0 login-card w-100" style="max-width: 1000px;">
            <div class="col-md-6 d-none d-md-block login-image-side">
                <div class="login-image-text">
                    <h2>HopeCare Hospital</h2>
                    <p class="mb-0">Secure access for {{ $roleLabel ?? 'User' }} portal.</p>
                </div>
            </div>

            <div class="col-md-6 login-form-side">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="role-badge">{{ $roleLabel ?? 'User' }} Portal</div>
                <div class="brand-title">{{ $roleLabel ?? 'User' }} Login</div>
                <div class="brand-subtitle">Sign in to continue to the hospital system</div>

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <input type="hidden" name="expected_role" value="{{ strtolower($roleLabel ?? 'user') }}">

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-login w-100">Login</button>
                </form>

                @if(($roleLabel ?? '') === 'Patient')
                    <div class="mt-4 text-center small-link">
                        New patient? <a href="{{ route('register') }}">Register here</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>