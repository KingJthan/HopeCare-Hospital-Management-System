<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Token | HopeCare Hospital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        :root {
            --deep: #031926;
            --navy: #082f49;
            --blue: #0f6cbf;
            --teal: #0f9f9a;
            --gold: #d49a2a;
            --mist: #edf7f6;
            --line: #dfeaf2;
            --muted: #667789;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: "Manrope", Arial, sans-serif;
            color: #132536;
            background:
                radial-gradient(circle at 12% 12%, rgba(15, 159, 154, 0.18), transparent 28rem),
                radial-gradient(circle at 88% 8%, rgba(212, 154, 42, 0.18), transparent 24rem),
                linear-gradient(135deg, #f4fbfb 0%, #eef5fb 48%, #fff8ed 100%);
        }

        .print-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 22px;
            padding: 34px 16px;
        }

        .token-slip {
            width: min(100%, 560px);
            overflow: hidden;
            border: 1px solid rgba(223, 234, 242, 0.95);
            border-radius: 34px;
            background: #ffffff;
            box-shadow: 0 34px 90px rgba(8, 47, 73, 0.18);
        }

        .token-header {
            position: relative;
            padding: 28px 30px;
            color: #ffffff;
            background:
                linear-gradient(135deg, rgba(3, 25, 38, 0.96), rgba(15, 108, 191, 0.88)),
                url('{{ asset('images/reception.jpg') }}') center/cover no-repeat;
        }

        .token-header::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -90px;
            top: -90px;
            border-radius: 50%;
            background: rgba(212, 154, 42, 0.28);
        }

        .brand-row {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand-lockup {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            font-weight: 900;
            box-shadow: 0 16px 34px rgba(0, 0, 0, 0.24);
        }

        .hospital-name {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: -0.04em;
            line-height: 1;
        }

        .hospital-meta,
        .visit-meta {
            color: rgba(255, 255, 255, 0.82);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .visit-meta {
            text-align: right;
        }

        .token-body {
            padding: 30px;
        }

        .token-label {
            color: var(--teal);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.16em;
            text-transform: uppercase;
        }

        .token-number-panel {
            position: relative;
            overflow: hidden;
            margin: 16px 0 24px;
            padding: 28px;
            border-radius: 28px;
            text-align: center;
            color: #ffffff;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            box-shadow: 0 20px 46px rgba(15, 108, 191, 0.26);
        }

        .token-number-panel::before,
        .token-number-panel::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
        }

        .token-number-panel::before {
            width: 150px;
            height: 150px;
            left: -70px;
            bottom: -70px;
        }

        .token-number-panel::after {
            width: 120px;
            height: 120px;
            right: -48px;
            top: -58px;
        }

        .token-number {
            position: relative;
            z-index: 1;
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(74px, 16vw, 118px);
            font-weight: 800;
            line-height: 0.9;
            letter-spacing: -0.08em;
            text-shadow: 0 18px 38px rgba(0, 0, 0, 0.22);
        }

        .token-caption {
            position: relative;
            z-index: 1;
            margin-top: 12px;
            color: rgba(255, 255, 255, 0.84);
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .patient-name {
            font-size: 28px;
            font-weight: 900;
            color: var(--deep);
            letter-spacing: -0.04em;
            margin-bottom: 4px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin: 24px 0;
        }

        .detail-card {
            border: 1px solid var(--line);
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff, #f7fbfd);
            padding: 15px;
        }

        .detail-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .detail-value {
            color: var(--navy);
            font-size: 15px;
            font-weight: 900;
            overflow-wrap: anywhere;
        }

        .doctor-card {
            display: flex;
            align-items: center;
            gap: 14px;
            border: 1px solid rgba(15, 159, 154, 0.24);
            border-radius: 22px;
            background: rgba(15, 159, 154, 0.08);
            padding: 16px;
        }

        .doctor-icon {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            font-weight: 900;
        }

        .barcode {
            display: flex;
            justify-content: center;
            align-items: end;
            gap: 4px;
            height: 46px;
            margin: 24px 0 12px;
        }

        .barcode span {
            width: 5px;
            border-radius: 999px 999px 0 0;
            background: var(--navy);
        }

        .barcode span:nth-child(2n) {
            height: 28px;
            background: var(--teal);
        }

        .barcode span:nth-child(2n + 1) {
            height: 42px;
        }

        .barcode span:nth-child(3n) {
            height: 34px;
            background: var(--gold);
        }

        .footer-note {
            border-top: 1px dashed var(--line);
            padding-top: 18px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            line-height: 1.7;
        }

        .action-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .btn-print {
            border: 0;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--teal), var(--blue));
            color: #ffffff;
            font-weight: 900;
            padding: 12px 22px;
            box-shadow: 0 16px 34px rgba(15, 108, 191, 0.22);
        }

        .btn-soft {
            border: 1px solid var(--line);
            border-radius: 999px;
            background: #ffffff;
            color: var(--navy);
            font-weight: 900;
            padding: 12px 22px;
            text-decoration: none;
        }

        @media (max-width: 575px) {
            .brand-row,
            .doctor-card {
                align-items: flex-start;
                flex-direction: column;
            }

            .visit-meta {
                text-align: left;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .token-body,
            .token-header {
                padding: 22px;
            }
        }

        @media print {
            @page {
                margin: 12mm;
                size: auto;
            }

            body {
                background: #ffffff;
            }

            .print-page {
                min-height: auto;
                padding: 0;
            }

            .token-slip {
                width: 100%;
                max-width: 520px;
                border-radius: 24px;
                box-shadow: none;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <main class="print-page">
        <section class="token-slip">
            <header class="token-header">
                <div class="brand-row">
                    <div class="brand-lockup">
                        <span class="brand-mark">HC</span>
                        <div>
                            <div class="hospital-name">HopeCare Hospital</div>
                            <div class="hospital-meta">Newark, New Jersey</div>
                        </div>
                    </div>
                    <div class="visit-meta">
                        <div>Patient Queue Pass</div>
                        <div>{{ now()->format('d M Y') }}</div>
                    </div>
                </div>
            </header>

            <div class="token-body">
                <div class="token-label">Now serving token</div>
                <div class="token-number-panel">
                    <div class="token-number">{{ $patient->token_number }}</div>
                    <div class="token-caption">Please listen for your call</div>
                </div>

                <div class="patient-name">{{ $patient->name }}</div>
                <div class="text-muted fw-bold">Registered patient visit slip</div>

                <div class="detail-grid">
                    <div class="detail-card">
                        <div class="detail-label">Gender</div>
                        <div class="detail-value">{{ $patient->gender }}</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Age</div>
                        <div class="detail-value">{{ $patient->age }} years</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">{{ $patient->phone }}</div>
                    </div>
                    <div class="detail-card">
                        <div class="detail-label">Printed</div>
                        <div class="detail-value">{{ now()->format('h:i A') }}</div>
                    </div>
                </div>

                <div class="doctor-card">
                    <span class="doctor-icon">DR</span>
                    <div>
                        <div class="detail-label">Assigned Doctor</div>
                        <div class="detail-value">{{ $patient->assignedDoctor?->name ?? 'Not assigned yet' }}</div>
                    </div>
                </div>

                <div class="barcode" aria-hidden="true">
                    @for($i = 0; $i < 28; $i++)
                        <span></span>
                    @endfor
                </div>

                <div class="footer-note">
                    Please keep this slip visible and wait for your token to be called.
                    Present it at the consultation desk when requested.
                </div>
            </div>
        </section>

        <div class="action-bar no-print">
            <button onclick="window.print()" class="btn-print">Print Token</button>
            <a href="{{ route('patients.nowServing') }}" class="btn-soft">Now Serving</a>
            <a href="{{ route('patients.index') }}" class="btn-soft">Patient List</a>
        </div>
    </main>
</body>
</html>
