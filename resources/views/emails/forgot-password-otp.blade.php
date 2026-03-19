<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body style="margin:0; padding:0; background:#f4f6f8; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="400" cellpadding="0" cellspacing="0" border="0" 
                       style="background:#ffffff; margin-top:50px; border-radius:10px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#f97316; color:#ffffff; padding:20px; text-align:center;">
                            <h2 style="margin:0;">Siya Collection</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:25px; text-align:center; color:#333;">
                            
                            <h3 style="margin-bottom:10px;">Hello 👋</h3>

                            <p style="font-size:14px; margin-bottom:20px;">
                                Use the OTP below to reset your password. This code is valid for a short time.
                            </p>

                            <!-- OTP Box -->
                            <div style="font-size:28px; font-weight:bold; letter-spacing:5px; 
                                        background:#f3f4f6; padding:15px; border-radius:8px; display:inline-block;">
                                {{$otp}}
                            </div>

                            <p style="font-size:12px; color:#777; margin-top:20px;">
                                If you didn’t request this, please ignore this email.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="text-align:center; padding:15px; font-size:12px; color:#999;">
                            © {{ date('Y') }} Siya Collection. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>