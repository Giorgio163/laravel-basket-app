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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
