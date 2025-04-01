<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    @vite('resources/css/cart.css')
</head>
<body>

    <div class="container">
        @extends('layouts.app')

        @section('content')
        <div class="cart-header">
            <h1>Your Cart</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @if(count($cart) > 0)
            <div class="cart-items">
                @foreach($cart as $id => $item)
                    <div class="cart-item">
                        <img src="{{ asset('images/catalogue/' . getRandomImageFromCatalogue()) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                        <h3>{{ $item['name'] }}</h3>
                        <p class="price">${{ number_format($item['price'], 2) }}</p>
                        <p class="quantity">Quantity: {{ $item['quantity'] }}</p>
                        <p class="total">Total: ${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="remove-item">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <p class="total">Total: ${{ number_format(array_sum(array_map(function ($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart)), 2) }}</p>
                <a href="" class="checkout-button">Proceed to Checkout</a>
            </div>
        @else
            <p class="empty-cart-message">Your cart is empty.</p>
        @endif
    </div>
</body>
</html>
@endsection
