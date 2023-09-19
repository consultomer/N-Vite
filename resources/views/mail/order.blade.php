<!DOCTYPE html>
<html>

<head>
    <title>Order</title>
</head>

<body>
    <h1>Thank you for your order</h1>
    <p>Hi {{ $order['firstname'] }},</p>
    <br>
    <p>Your order has been placed successfully. Your Order number is #{{ $order['id'] }}</p>
    <br>
    <p>Thank you for shopping with us.</p>
    <br>
    <p>Regards,</p>
    <p>N-Vite: Digital Invitations & Cards</p>
    <img src="{{ asset($order['image_src']) }} " alt="">
</body>

</html>
