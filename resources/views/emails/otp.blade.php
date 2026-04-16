<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your OTP</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6f9; padding:30px;">
    <div style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:10px; padding:30px; border:1px solid #e5e7eb;">
        <h2 style="color:#0d6efd; margin-top:0;">HopeCare Hospital</h2>
        <p>Hello {{ $name }},</p>
        <p>Your email verification OTP is:</p>

        <div style="font-size:32px; font-weight:bold; letter-spacing:6px; color:#dc3545; margin:20px 0;">
            {{ $otp }}
        </div>

        <p>This OTP will expire in 10 minutes.</p>
        <p>If you did not request this, please ignore this email.</p>

        <hr style="margin:25px 0;">
        <p style="font-size:13px; color:#6b7280;">HopeCare Hospital Management System</p>
    </div>
</body>
</html>