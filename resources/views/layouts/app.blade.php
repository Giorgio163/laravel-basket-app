<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catalogue')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @vite('resources/css/navigation.css')
        <!-- Include Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('catalogue') }}"><i class="fa-regular fa-newspaper"></i> Catalogue</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Cart</a></li>
        </ul>
    </nav>
</header>

<div class="content">
    @yield('content') <!-- This is where your page content will be injected -->
</div>

<footer>
    <p>&copy; 2025 Basket App | All Rights Reserved</p>
</footer>

</body>
</html>
