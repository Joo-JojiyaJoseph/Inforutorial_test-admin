@extends('layouts.app')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Inner Banner Section -->
    <section class="inner-banner">
        <div class="image-layer" style="background-image: url({{ asset('/storage/images/background/banner-image-1.jpg') }});">
        </div>
        <div class="auto-container">
            <div class="inner">
                <div class="subtitle"><span>Shop With Us</span></div>
                <div class="pattern-image"><img src="{{ asset('/storage/images/icons/separator.svg') }}" alt=""
                        title=""></div>
                <h1><span>Checkout</span></h1>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    {{-- <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
    <a href="#" class="text-2xl font-bold text-gray-800">sneekpeeks</a>
    <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
      <div class="relative">
        <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
            </a>
            <span class="font-semibold text-gray-900">Shop</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2" href="#">2</a>
            <span class="font-semibold text-gray-900">Shipping</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">3</a>
            <span class="font-semibold text-gray-500">Payment</span>
          </li>
        </ul>
      </div>
    </div>
  </div> --}}
    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Order Summary</p>
            <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @foreach ($carts as $productId => $quantity)
                    @foreach ($foods as $food)
                        @if ($food->id == $productId)
                            <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                                <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                                    src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="" />
                                <div class="flex w-full flex-col px-4 py-4">
                                    <span class="font-semibold">{{ $food->fdtitle }}</span>
                                    <span class="float-right text-gray-400">Quantity: {{ $quantity }}</span>
                                    <p class="text-lg font-bold">{{ $food->amount * $quantity }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <p class="mt-8 text-lg font-medium">Shipping Methods</p>
            <form method="POST" class="mt-5 grid gap-6" action="{{ route('order') }}">
                @csrf
                <input class="peer hidden" type="text" name="type" value="delivery" />
                {{-- <div class="relative">
                    <input class="peer hidden" type="radio" name="type" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-red-400 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_1">
                        <img class="w-14 object-contain" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold text-black">Cash On Delivery</span>
                            <p class="text-black text-sm leading-6">Delivery: 2-4 Days</p>
                        </div>
                    </label>
                </div>
                <div class="relative">
                    <input class="peer hidden" type="radio" name="type" checked />
                    <span
                        class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
                    <label
                        class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
                        for="radio_2">
                        <img class="w-14 object-contain" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
                        <div class="ml-5">
                            <span class="mt-2 font-semibold">Pickup</span>
                        </div>
                    </label>
                </div> --}}
        </div>
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium text-black">Shipping Details</p>
            <p class="text-black">Complete your order by providing your payment details.</p>
            <div class="">
                <label for="Name" class="mt-4 mb-2 block text-sm font-medium">Name</label>
                <div class="relative">
                    <input type="text" name="name"
                        class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Name" required />
                </div>
                <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium text-black"></label>
                <div class="grid grid-cols-2 sm:flex-row gap-10">
                    <div class="relative">
                        <input type="text" name="phone"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Phone" required />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        </div>
                    </div>
                    <div class="relative">
                        <input type="text" name="email"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="your.email@gmail.com" required />
                        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                    </div>
                    <input type="text" name="housename"
                        class="w-full rounded-md border text-black border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="House Name" required />

                    <input type="text" name="country"
                        class="w-full rounded-md border text-black border-gray-200 px-4 py-3 text-sm shadow-sm outline-none  focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Country" required />
                    <input type="text" name="state"
                        class="w-full rounded-md border text-black border-gray-200 px-4 py-3 text-sm shadow-sm outline-none  focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="State" required />
                    <input type="text" name="place"
                        class="w-full rounded-md border text-black border-gray-200 px-4 py-3 text-sm shadow-sm outline-none  focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Place" required />
                    <input type="text" name="zipcode"
                        class="w-full rounded-md border text-black border-gray-200 px-4 py-3 text-sm shadow-sm outline-none  focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="ZIP" required />
                </div>

                <!-- Total -->
                <div class="mt-6 border-t border-b py-2">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Subtotal</p>
                        <p class="font-semibold text-gray-900">${{ $totalamount }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Shipping</p>
                        <p class="font-semibold text-gray-900">${{ env('SHIPPING') }}</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900">${{ $finalamount }}</p>
                </div>
            </div>

            <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place
                Order</button>
        </div>
        </form>
    </div>
@endsection
