<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Your Cart</title>
</head>
<body class="bg-gray-100">
@include('layouts.nav')
@include('layouts.notifyError')
@include('layouts.notifySuccess')
    <div class="container mx-auto mt-10">
        <div class="flex flex-col md:flex-row shadow-md my-10">
            <div class="w-full md:w-3/4 bg-white px-4 md:px-10 py-10">
                <div class="flex flex-col md:flex-row justify-center border-b pb-8">
                    <h1 class="font-semibold text-2xl mb-4 md:mb-0">Your Cart ({{ count($cart) }} Item{{ count($cart) > 1 ? 's' : '' }})</h1>
                </div>
                @if(session()->has('cart'))
                @php
                    $cart = session('cart');
                    $totalAmount = 0;
                @endphp
                <div class="flex mt-10 mb-5 ml-4">
                    <h3 class="font-semibold text-gray-600 text-sm uppercase md:w-2/5 hidden md:block">Items</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-sm uppercase md:w-1/5 hidden md:block text-center">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-sm uppercase md:w-1/5 hidden md:block text-center">Price</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-sm uppercase md:w-1/5 hidden md:block text-center">Total</h3>
                </div>
                @foreach ($cart as $item => $each)
                    <div class="flex flex-col md:flex-row items-center hover:bg-gray-100 -mx-4 md:mx-0 px-4 py-5">
                        <div class="w-full md:w-2/5 md:flex">
                            <div class="w-full md:w-1/4">
                                <a href="{{ route('show', $each['product_id']) }}">
                                    <img class="object-contain h-24 md:h-auto w-full md:w-auto mx-auto" src="{{ asset('/storage/images/product-images/' . $each['product_id'] . '/' . $each['image']) }}" alt="{{ $each['name'] }}">
                                </a>
                            </div>
                                                   
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-lg">{{ $each['name'] }}</span>
                                <span class="font-bold text-sm">{{ $each['gender'] }}'s Shoes</span>
                                <span class="font-bold text-sm">Size: {{ $each['size'] }}</span>    
                                <form method="post" action="{{ route('removeItemFromCart') }}">
                                    @csrf
                                    <input name="product_id" type="hidden" value="{{ $item }}">
                                    <button class="font-semibold text-red-500 text-sm">Remove</button>
                                </form>                                                                                         
                            </div>
                        </div>
                        <div class="flex justify-center md:w-1/5">
                            <form method="post" action="{{ route('decreaseQuantity')}}">
                                @csrf
                                <input name="product_id" type="hidden" value="{{ $item }}">
                                <button>
                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                    </svg>
                                </button>
                            </form>
                            <input class="mx-2 border text-center w-8" type="text" value="{{ $each['quantity'] }}" disabled>
                            <form method="post" action="{{ route('increaseQuantity')}}">
                                @csrf
                                <input name="product_id" type="hidden" value="{{ $item }}">
                                <button>
                                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <span class="text-center md:w-1/5 font-semibold text-sm">{{ number_format($each['price'], 0, ',', '.')  . ' VNĐ' }}</span>
                        <span class="text-center md:w-1/5 font-semibold text-sm">{{ number_format($each['price'] * $each['quantity'], 0, ',', '.')  . ' VNĐ' }}</span>
                        @php $totalAmount += $each['price'] * $each['quantity']  @endphp
                    </div>
                @endforeach
                <a href="{{ route('index')}}#product" class="flex font-semibold text-indigo-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continue Shopping
                </a>
                @else
                <h1 class="font-semibold text-2xl text-center mt-8">Your Cart is Empty</h1>
                <a href="{{ route('index')}}#product" class="flex font-semibold text-indigo-600 text-sm mt-32">
                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continue Shopping
                </a>
                @endif
            </div>
            <div id="summary" class="w-full md:w-1/4 px-4 md:px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Cart Summary</h1>
                <div class="flex flex-col md:flex-row justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Quantity Items: {{ !empty($cart) ? count($cart) : '0'}}</span>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total</span>
                        <span>{{ !empty($cart) ? number_format($totalAmount, 0, ',', '.') : '0'}} VNĐ</span>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="total_vnpay" value="">
                        <button name="redirect" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full" type="submit">Check out</button>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</body>
</html>
