<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Catalogue</title>

    @vite('resources/css/home.css')
</head>

<body>

<div class="container">
    <header>
        <h1>Welcome to Our Catalogue</h1>
        <p>Explore our products and services</p>
    </header>

    <main>
        <div class="catalogue-preview">
            <a href="{{ route('catalogue') }}" class="cta-link">
                <img src="{{ asset('images/basket.png') }}" alt="Shopping Basket" class="basket-image mx-auto mb-4">
                <p class="cta-text">Check out our latest products in the catalogue.</p>
            </a>
        </div>
    </main>
</div>
<footer>
    <p>&copy; 2025 Basket App | All Rights Reserved</p>
</footer>
</body>

</html>
