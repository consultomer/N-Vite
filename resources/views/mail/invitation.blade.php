<!DOCTYPE html>
<html>
<head>
    <title>Invitation</title>
</head>
<body>
    <h1>Invitation From {{ $order['firstname']}} </h1>
    <p>Hi {{ $email['name'] }},</p>
    <br>
    <p>This is Your invitaion Card. Please join us for a great time filled with exciting activities and wonderful people.</p>
    <br>
    <p>We look forward to celebrating with you!</p>
    <p>Regards,</p>
    <p><b> {{ $order['firstname'] }} {{ $order['lastname'] }} </b></p>
    <p>N-Vite: Digital Invitations & Cards</p>
    <img src="{{ asset($order['image_src']) }} " alt="">
</body>
</html>
