<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    @vite('resources/css/checkout.css')
</head>

<body>
    <div class="container">
        @extends('layouts.app')

        @section('content')
                <div class="checkout-header">
                    <h1>Checkout</h1>
                </div>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf

                    <div class="checkout-summary">
                        <p class="total">
                            <strong>Grand Total:</strong> ${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}
                        </p>

                        <button type="submit" class="checkout-button">Confirm Purchase</button>
                    </div>
                </form>

            </div>

</body>

</html>
@endsection
