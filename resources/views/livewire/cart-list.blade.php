<div>
    <h1>Shopping Cart</h1>

    @foreach($cart as $productId => $quantity)
        <p>Product {{ $productId }} - Quantity: {{ $quantity }}</p>
        <form action="{{ route('cart.update') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $productId }}">
            <input type="number" name="quantity" value="{{ $quantity }}" min="1">
            <button type="submit">Update Quantity</button>
        </form>
    @endforeach

    <h2>Add Product to Cart</h2>
    <form action="{{ route('cart.add') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="1"> 
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
</div>
