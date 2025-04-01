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

    @extends('layouts.app')

    @section('content')
    <header>
        <h1>Our Exclusive Catalogue</h1>
        <p>Find the best products just for you!</p>
    </header>

    @if(session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if($catalogues->isEmpty())
        <div class="no-items-message">
            <p>We are out of stock at the moment. Please check back later!</p>
        </div>
    @else
        <div class="catalogue-items">
            @foreach($catalogues as $item)
                <div class="catalogue-item">
                    <img src="{{ asset('images/catalogue/' . getRandomImageFromCatalogue()) }}" alt="{{ $item->name }}" class="catalogue-item-image">
                    <h3>{{ $item->name }}</h3>
                    <p>{{ $item->description }}</p>
                    <p class="price">${{ number_format($item->price, 2) }}</p>
                    <form action="{{ route('cart.add', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="add-to-cart">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>
@endsection

