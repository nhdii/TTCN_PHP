<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Home</title>
</head>
<body>
@include('layouts.nav')
@include('layouts.notifyError')
@include('layouts.notifySuccess')
<section class="overflow-hidden bg-white py-11 font-poppins">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/2 ">
                <div class="sticky top-0 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                        <img src="/storage/images/product-images/{{ $product->product_id }}/{{ $product->image }}" alt="" class="object-cover w-full lg:h-full rounded-md">
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <div class="">
                        <h2 class="max-w-xl mt-2 mb-2 text-2xl font-bold md:text-4xl">
                            {{ $product->product_name }}</h2>
                        <div class="flex items-center mb-6">
                            <p class="max-w-md mb-2 text-gray-700 text-xl">
                                {{ $product->gender }}'s Shoes
                            </p>
                        </div>
                        <div class="h-16 overflow-hidden">
                            <p class="inline-block mb-4 text-2xl font-bold text-gray-700">
                                {{ number_format($product->default_price, 0, ',', '.') }} ₫
                            </p>
                        </div>
                        
                    </div>
                    
                    <form method="post" action="{{ route('addToCart') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <input type="hidden" name="selectedAttributeId" id="selectedAttributeId" value="">
                        <h6 class="text-lg font-bold mb-2">Select Size</h6>
                        <div class="flex flex-wrap -mx-2">
                            @foreach ($sizes as $size)
                                <div class="w-1/4 px-2 mb-4">
                                    <button type="button" class="size-button w-full h-14 flex items-center justify-center border rounded-lg px-3 py-1 focus:outline-none focus:ring focus:border-blue-500 focus:bg-blue-300 focus:text-black hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100" data-size="{{ $size->attribute_value }}" data-attribute-id="{{ $size->attribute_id }}" onclick="selectSize('{{ $size->attribute_value }}', '{{ $size->attribute_id }}')">
                                        {{ $size->attribute_value }}
                                    </button>
                                </div>
                            @endforeach
                        </div>                 
                        <div class="flex flex-wrap items-center -mx-4 mt-4">
                            <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                                <a href="{{ route('index') }}#product" class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100">
                                    Back
                                </a>
                            </div>
                            <div class="w-full px-4 mb-4 lg:mb-0 lg:w-1/2">
                                <button type="submit" id="addToCartBtn" class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>         
  
                    <div class="mt-10 h-20 overflow-hidden">
                        <p class="max-w-md mb-2 text-gray-700 text-lg">
                            {{ $product->desciption }}
                        </p>
                    </div>
                    <button id="showMoreButton" class="block mb-2 font-bold text-lg">More</button>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('showMoreButton').addEventListener('click', function() {
        var div = document.querySelector('.h-20');
        if (div.classList.contains('h-20')) {
            div.classList.remove('h-20');
            div.classList.add('h-auto');
        } else {
            div.classList.remove('h-auto');
            div.classList.add('h-20');
        }
    });

    function selectSize(size, attribute_id) {
        var buttons = document.querySelectorAll('.size-button');
        buttons.forEach(function(button) {
            button.classList.remove('selected');
        });

        var selectedButton = document.querySelector('[data-size="' + size + '"]');
        if (selectedButton) {
            selectedButton.classList.add('selected');
        }

        var sizeInput = document.getElementById('selectedAttributeId');
        if (sizeInput) {
            sizeInput.value = attribute_id;
        }

        console.log('Selected Size:', size);

    }
    
</script>


@include('layouts.footer')
</body>
</html>
