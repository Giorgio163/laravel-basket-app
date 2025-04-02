@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="catalogue-preview">
                        <a href="{{ route('catalogue') }}" class="cta-link">
                            <img src="{{ asset('images/basket.png') }}" alt="Shopping Basket" class="basket-image mx-auto mb-4">
                            <p class="cta-text">Check out our latest products in the catalogue.</p>
                        </a>
                    </div>
                        <h2>Your Orders</h2>
                        @if(!empty($orders) && !$orders->isEmpty())
                            <ul class="order-status">
                                @foreach($orders as $order)
                                    <li>
                                        <strong>Order #{{ $order->id }}</strong> - {{ $order->created_at->format('d M Y') }}<br>
                                        <span>Total: ${{ number_format($order->total_price, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>You haven't placed any orders yet.</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
