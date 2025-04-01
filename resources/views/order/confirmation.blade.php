<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>

    @vite('resources/css/order.css')
</head>

<body>
<div class="container">
    <div class="order-header-title">
        <h1>Order Confirmation</h1>
    </div>
    <div class="order-header">
        <p>Your order has been placed successfully!</p>
        <p>Order ID: {{ $order->id }}</p>
        <p>Total Price: ${{ number_format($order->total_price, 2) }}</p>
    </div>

    <div class="order-summary">
            <h3>Items in your order:</h3>
            <ul>
                @foreach (json_decode($order->items, true) as $item)
                    <li>
                        <h4>{{ $item['name'] }} (x{{ $item['quantity'] }})</h4>
                        <p class="price">${{ number_format($item['price'], 2) }}</p>
                        <p class="quantity">Quantity: {{ $item['quantity'] }}</p>
                    </li>
                @endforeach
            </ul>

            <p class="total">
                Grand Total: ${{ number_format($order->total_price, 2) }}
            </p>

            <a href="{{ route('home') }}" class="order-confirmation-button">Back to Home</a>
        </div>
</div>
</body>

</html>

