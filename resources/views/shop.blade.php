<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to cart with livewire</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div  class="bg-white">
        <header>
            <div class="container px-6 py-3 mx-auto">
                <div class="flex items-center justify-between">


                    <div class="flex items-center justify-end w-full">
                        <button" class="mx-4 text-gray-600 focus:outline-none sm:mx-0">

                        </button>
                    </div>
                </div>
                <nav  class="p-6 mt-4 text-white bg-black sm:flex sm:justify-center sm:items-center">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="/">Shop</a>
                        <a href="{{ route('cart.list') }}" class="flex items-center">
                          profile
                        </a>

                    </div>
                </nav>
            </div>
        </header>

        <main class="my-8">
            <div class="container px-6 mx-auto">
                <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
                <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                    <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                        <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
                        <div class="flex items-end justify-end w-full bg-cover">

                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                            <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                            </form>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </main>

    </div>
    @livewireScripts
</body>
</html>
