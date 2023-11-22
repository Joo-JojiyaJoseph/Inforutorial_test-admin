<div>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="container mx-auto">
        <div class="flex shadow-md my-10">
          <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
              <h1 class="font-semibold text-2xl text-black">Shopping Cart</h1>
              <h2 class="font-semibold text-2xl text-black">{{$cartcount}} Items</h2>
            </div>
            <div class="flex mt-10 mb-5">
              <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Quantity</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Price</h3>
              <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5">Total</h3>
            </div>
            @if($cartcount>0)
            @foreach($cart as $productId => $quantity)
            @foreach($foods as $food)
            @if($food->id== $productId)

            <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-2/5"> <!-- product -->
                  <div class="w-20">
                    <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
                  </div>
                  <div class="flex flex-col justify-between ml-4 flex-grow">
                    {{-- <span class="font-bold text-sm">{{ $productId }}</span> --}}
                    <span class="text-red-500 text-xs">{{ $food->fdtitle }}</span>
                    <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
                  </div>
                </div>
                <div class="flex justify-center w-1/5">
                  <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>
                  <input class="mx-2 border text-center w-8" type="number" name="quantity" value="{{ $quantity }}" min="1">
                  {{-- <input class="mx-2 border text-center w-8" type="text" value="1"> --}}

                  <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>
                </div>
                <span class="text-center w-1/5 font-semibold text-sm text-black">{{ $food->amount }}</span>
                <span class="text-center w-1/5 font-semibold text-sm text-black">{{ $food->amount }}</span>
              </div>
              @endif
              @endforeach
            @endforeach
            @endif

            <a href="{{route('menu')}}" class="flex font-semibold text-indigo-600 text-sm mt-10">
              <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
              Continue Shopping
            </a>
          </div>

          <div id="summary" class="w-1/4 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
              <span class="font-semibold text-sm uppercase">Items {{$cartcount}} </span>
              {{-- <span class="font-semibold text-sm">590$</span> --}}
            </div>
            <div class="border-t mt-8">
              <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                <span>Total cost</span>
                <span>${{$totalamount}}</span>
              </div>
              <a href="{{route('checkout')}}"><button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
              </a></div>
          </div>

        </div>
      </div>

    {{-- @foreach($cart as $productId => $quantity)
        <p>Product {{ $productId }} - Quantity: {{ $quantity }}</p>
         <form action="{{ route('cart.update') }}" method="post">
            <form action="" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $productId }}">
            <input type="number" name="quantity" value="{{ $quantity }}" min="1">
            <button type="submit">Update Quantity</button>
        </form>
    @endforeach --}}
{{--
    <h2>Add Product to Cart</h2>
    <form action="" method="post">
        {{ route('cart.add') }}
        @csrf
        <input type="hidden" name="product_id" value="1">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form> --}}
</div>
