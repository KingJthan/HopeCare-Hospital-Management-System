<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HopeCare Hospital</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(rgba(16, 44, 84, 0.55), rgba(16, 44, 84, 0.55)),
                url('{{ asset('images/hospital-building.jpg') }}') center center / cover no-repeat;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .register-card {
            width: 100%;
            max-width: 700px;
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
    </style>
</head>
<body>
    <div class="container register-wrapper">
        <div class="register-card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="register-title">Create Account</div>
            <div class="register-subtitle">Register to access HopeCare Hospital portal</div>

            <form method="POST" action="{{ route('register.store') }}">
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

                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" value="{{ old('age') }}" min="0" required>
                        @error('age')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                        @error('phone')
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

                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-register w-100 mt-4">Register</button>
            </form>

            <div class="mt-4 text-center">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>

            <div class="mt-2 text-center">
                <a href="{{ route('portal') }}">Back to portal selection</a>
            </div>
        </div>
    </div>
</body>
</html>