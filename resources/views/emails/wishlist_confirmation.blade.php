<!-- resources/views/emails/wishlist_confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Confirmation</title>
</head>
<body>
    <p>Hi {{ $fullName }},</p>
    <p>Thank you for adding the course <strong>{{ $courseName }}</strong> to your wishlist.</p>
    <p>We will notify you with more details soon. We hope you enjoy the course!</p>
    <p>Best regards,</p>
    <p>IRES Team.</p>
</body>
</html>
