<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Register | HopeCare Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(16, 44, 84, 0.6), rgba(16, 44, 84, 0.6)),
                url('{{ asset('images/nurse-smile.jpg') }}') center center / cover no-repeat;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding: 30px 15px;
        }

        .register-card {
            width: 100%;
            max-width: 620px;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 18px;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.18);
            padding: 36px;
        }

        .register-title {
            font-size: 28px;
            font-weight: 700;
            color: #173b6d;
            margin-bottom: 4px;
        }

        .register-subtitle {
            color: #6c757d;
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-register {
            background: #1e63b5;
            border: none;
            padding: 12px;
            font-weight: 600;
        }

        .btn-register:hover {
            background: #184f90;
        }

        .notice-box {
            background: #eaf3ff;
            border: 1px solid #cfe2ff;
            border-radius: 12px;
            color: #173b6d;
            padding: 12px 14px;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .auth-credit-footer {
            color: rgba(255, 255, 255, 0.88);
            font-size: 13px;
            font-weight: 700;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.35);
        }
    </style>
</head>
<body>
    <div class="container register-wrapper">
        <div class="register-card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <div class="register-title">Create Staff Account</div>
            <div class="register-subtitle">Register as a clinical, care support, facilities, or security staff member.</div>

            <div class="notice-box">
                Admin accounts are not created from this public form. Use this page for approved staff roles only.
            </div>

            <form method="POST" action="{{ route('staff.register.store') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Staff Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Staff Role</option>
                            @foreach($staffRoles as $value => $label)
                                <option value="{{ $value }}" {{ old('role') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-register w-100 mt-4">Register Staff Account</button>
            </form>

            <div class="mt-4 text-center">
                Already have a staff account? <a href="{{ route('login.doctor') }}">Login here</a>
            </div>

            <div class="mt-2 text-center">
                <a href="{{ route('portal') }}">Back to portal selection</a>
            </div>
        </div>
        <footer class="auth-credit-footer">
            Copyright {{ date('Y') }} HopeCare Hospital. All rights reserved. | Jonathan Mugume VU-BBC-2411-1587-DAY {{ date('Y') }}.
        </footer>
    </div>
</body>
</html>
