<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Enquiry Received</title>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f9f9f9; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; padding:20px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="text-align:center; padding-bottom:20px; border-bottom:1px solid #e5e5e5;">
                            <h2 style="margin:0; color:#1f2937; font-size:24px;">New Enquiry Received</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:20px 0;">
                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">Name:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['name'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">Organisation:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['organisation'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">Email:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['email'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">Phone:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['phone'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">City:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['city'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">State:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['state'] }}</p>

                            <p style="margin:0 0 10px; font-weight:bold; color:#374151;">Message:</p>
                            <p style="margin:0 0 15px; color:#4b5563;">{{ $data['message'] }}</p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="text-align:center; padding-top:20px; border-top:1px solid #e5e5e5; color:#9ca3af; font-size:12px;">
                            This is an automated notification. Please do not reply.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
