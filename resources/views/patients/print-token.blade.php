<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Token</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: #f5f7fa;
            font-family: Arial, sans-serif;
        }

        .token-slip {
            width: 400px;
            margin: 40px auto;
            background: #ffffff;
            border: 2px dashed #0d6efd;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .hospital-name {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
        }

        .token-number {
            font-size: 56px;
            font-weight: bold;
            color: #dc3545;
            margin: 20px 0;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                background: white;
            }

            .token-slip {
                box-shadow: none;
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <div class="token-slip">
        <div class="hospital-name">HopeCare Hospital</div>
        <p class="mb-1">Newark, New Jersey</p>
        <hr>

        <p class="label mb-1">Patient Name</p>
        <h4>{{ $patient->name }}</h4>

        <p class="label mb-1 mt-3">Token Number</p>
        <div class="token-number">{{ $patient->token_number }}</div>

        <p class="mb-1"><span class="label">Gender:</span> {{ $patient->gender }}</p>
        <p class="mb-1"><span class="label">Age:</span> {{ $patient->age }}</p>
        <p class="mb-1"><span class="label">Phone:</span> {{ $patient->phone }}</p>
        <p class="mb-1"><span class="label">Date:</span> {{ now()->format('d M Y, h:i A') }}</p>

        <div class="footer-note">
            Please wait for your turn.  
            Present this token at the consultation desk.
        </div>

        <div class="mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="fa-solid fa-print me-1"></i> Print Token
            </button>

            <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
</body>
</html>