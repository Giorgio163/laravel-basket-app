<div>
    @isset($userId)
        <strong>User ID:</strong> {{ $userId }}
    @endisset

    @isset($totalPrice)
        <strong>Total Price:</strong> {{ $totalPrice }}
    @endisset

    @isset($items)
        @foreach($items as $item)
            <div>
                <strong>Name:</strong> {{ $item['name'] }}<br>
                <strong>Quantity:</strong> {{ $item['quantity'] }}<br>
                <strong>Price:</strong> ${{ number_format($item['price'], 2) }}<br>
                <strong>Description:</strong> {{ $item['description'] ?? 'No description available' }}<br><br>
            </div>
        @endforeach
    @endisset
</div>
