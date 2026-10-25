<!DOCTYPE html>
<html>
<head>
    <title>Product Verification</title>
</head>
<body>
    <p>Dear Customer,</p>

    <p>Thank you for using the product verification option on Minimax Website.</p>

    <p>The details submitted for verification are:</p>
    <ul>
        <li>Batch Number: <strong>{{ $verificationData['batch_number'] }}</strong></li>
        <li>Serial Number: <strong>{{ $verificationData['serial_number'] }}</strong></li>
        <li>Organisation: <strong>{{ $verificationData['organisation'] }}</strong></li>
    </ul>

    <h3 style="color: #155724;">Product stands verified as genuine Minimax supply.</h3>

    <p>If you have any further questions, please contact our support team.</p>

    <p>Regards,<br>Minimax Team</p>
</body>
</html>