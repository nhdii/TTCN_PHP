<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hello {{ $name_user }},</p>
    
    <p>Your order with the following details has been confirmed:</p>

    <p>Order ID: {{ $order->order_id }}</p>
    <p>Order Date: {{ \Carbon\Carbon::parse($order->order_date)->format('m/d/Y') }}</p>
    <p>Delivery Date: {{ \Carbon\Carbon::parse($order->delivery_date)->format('m/d/Y') }}</p>

    <p>Thank you for shopping with us!</p>

    <p>Best regards,<br> Sneaker Shop</p>
</body>
</html>
