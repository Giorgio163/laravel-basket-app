<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    @vite('resources/css/catalogue.css')
</head>
<body>

<div class="container">
    <header>
        <h1>Our Exclusive Catalogue</h1>
        <p>Find the best products just for you!</p>
    </header>

    @if($catalogues->isEmpty())
        <div class="no-items-message">
            <p>We are out of stock at the moment. Please check back later!</p>
        </div>
    @else
        <div class="catalogue-items">
            @foreach($catalogues as $item)
                <div class="catalogue-item">
                    <img src="{{ asset('images/catalogue/' . getRandomImageFromCatalogue()) }}"
                         alt="{{ $item->name }}" class="catalogue-item-image">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ $item->description }}</p>
                    <p class="price">${{ number_format($item->price, 2) }}</p>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            @endforeach
        </div>
    @endif
</div>

<footer>
    <p>&copy; 2025 Basket App | All Rights Reserved</p>
</footer>
</body>
</html>
