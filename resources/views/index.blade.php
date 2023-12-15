<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
  <title>Trang Chủ</title>

  <style>
    .image-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image-media-img {
      width: 100%; 
      height: auto; 
    }

    .featured-products {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .featured-products .bg-white {
      width: 300px; 
      margin: 10px;
    }

    /* css brand-logo */
    .brand-logo img {
      width: 100px; 
      height: 100px;
      opacity: 0.6; /* Đặt mức độ mờ cho các logo */
      transition: opacity 0.3s ease-in-out; /* Áp dụng hiệu ứng chuyển động cho opacity */
    }

    .max-w-screen-xl {
      margin: 0 auto; 
    }

    .brand-list {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
      justify-content: center; 
      align-items: center; 
    }

    .brand-logo {
      margin-right: 10px;
    }

    .brand-logo:last-child {
      margin-right: 0; 
    }

    .brand-logo:hover img {
      opacity: 1; 
    }

    /* carousel */
    #default-carousel {
      z-index: 1; 
    }

    .bg-gray-100 {
      position: relative;
      z-index: 2; 
    }

    .bg-white {
      position: relative;
      z-index: 2; 
    }

    #brands {
      position: relative;
      z-index: 2;
    }

    .bg-white.p-6 {
      position: relative;
      z-index: 2; 
    }

    /*border */
    .brand-item {
      border: 1px solid #ddd; 
      border-radius: 25px; 
      overflow: hidden; 
    }

    .brand-link {
      display: block;
      height: 100%;
    }

    .brand-image img {
      object-fit: auto;
      height: 100%;
      width: 100%;
    }

  </style>

</head>
<body>
@include('layouts.nav')


<div id="default-carousel" class="relative w-full overflow-hidden" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-96 md:h-64 lg:h-[400px] xl:h-[500px] 2xl:h-[600px]">
    <!-- Item 1 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="storage/images/carousel/carousel-1.jpg" class="absolute block w-full h-full object-cover" alt="...">
    </div>
    <!-- Item 2 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="storage/images/carousel/carousel-2.jpg" class="absolute block w-full h-full object-cover" alt="...">
    </div>
    <!-- Item 3 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="storage/images/carousel/carousel-3.jpg" class="absolute block w-full h-full object-cover" alt="...">
    </div>
    <!-- Item 4 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="storage/images/carousel/carousel-5.jpg" class="absolute block w-full h-full object-cover" alt="...">
    </div>
    <!-- Item 5 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="storage/images/carousel/carousel-6.jpg" class="absolute block w-full h-full object-cover" alt="...">
    </div>
  </div>
  
  <!-- Slider indicators -->
  <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
      <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
  </div>
  <!-- Slider controls -->
  <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
      </span>
  </button>
  <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
      </span>
  </button>
</div>


<div class="bg-gray-100 p-6 text-center md:flex md:flex-col md:items-center">
  <h2 class="text-3xl font-bold text-gray-800">Move, Shop, Customize & Celebrate With Us.</h2>
  <p class="text-lg text-gray-600">No matter what you feel like doing today, It's better as a Member.</p>
  {{-- <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full inline-block mt-4">Shop Now</a> --}}
</div>

<div class="bg-cover h-[200px] md:h-[250px] lg:h-[300px] bg-[url('/storage/images/carousel/bg.jpg')] flex items-center justify-center">
  <div class="md:ml-8 text-white text-center">
      <p class="text-xl md:text-3xl lg:text-4xl font-bold">Order Deadline</p>
      <h2 class="text-lg md:text-2xl lg:text-3xl">MARK YOUR CALENDAR</h2>
      <p class="text-l md:text-l lg:text-xl">
          Order online by 6 Dec, 11:59PM to get your gifts in time.
      </p>
      <div class="mt-4">
          <a href="#" class="bg-white text-black px-6 py-2 rounded-full inline-block">Shop</a>
      </div>
  </div>
</div>


<div id="brands" class="mt-6 p-12">
  <div class="pl-6">
      <h6 class="font-bold text-[20px]">BRANDS</h6>
  </div>

  <div class="flex flex-wrap gap-x-2 gap-y-8 mt-4 justify-center">
    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/jordan.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">Jordan</p>
        </div>
      </a>
    </div>

    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/nike-image.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">Nike</p>
        </div>
      </a>
    </div>

    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/new-balance-logo.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">New Balance</p>
        </div>
      </a>
    </div>

    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/adidas-logo.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">Adidas</p>
        </div>
      </a>
    </div>

    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/mlb-logo.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">MLB</p>
        </div>
      </a>
    </div>

    <div class="brand-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
      <a href="#" class="brand-link">
        <div class="h-[350px] brand-image">
          <img class="h-[350px] w-full" src="/storage/images/brands/converse-logo.jpg" alt="">
        </div>
        <div class="text-center">
            <p class="font-bold text-lg mt-2">Converse</p>
        </div>
      </a>
    </div>
  </div>
</div>

<div class="max-w-screen-xl mx-auto">
  <div class="brand-container">
    <ul class="brand-list">
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-nike.jpg" alt="Logo 1"></a></li>
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-adidas.jpg" alt="Logo 2"></a></li>
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-jordan.jpg" alt="Logo 3"></a></li>
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-mlb.jpg" alt="Logo 4"></a></li>
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-converse.jpg" alt="Logo 5"></a></li>
      <li class="brand-logo"><a href="#"><img src="storage/images/brands/logo-nb.jpg" alt="Logo 6"></a></li>
    </ul>
  </div>
</div>

<div id="product" class="mt-6 p-4 md:p-12">
  <div class="pl-6 grid place-items-center">
    <h6 class="font-bold text-[25px]">NIKE FOR YOU</h6>
  </div>

  <div class="flex flex-wrap gap-x-2 gap-y-8 mt-4 justify-center p-4 md:p-12">
    @foreach($products as $product)
      <div class="w-[250px]">
        <figure class="shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105">
          <a href="{{ route('show', $product->product_id)}}">
            <div class="h-[250px]">
              <img class="h-[250px] w-full" src="/storage/images/product-images/{{$product->product_id}}/{{$product->image}}" alt="">
            </div>
          </a>
        </figure>
        <div class="text-left p-4">
          <a href="{{ route('show', $product->product_id)}}">
            <p class="font-bold text-lg mt-2">{{ $product->product_name }}</p>
          </a>
          <p class="text-lg mt-2">{{ $product->gender }}</p>
          <p class="text-lg mt-2">{{ number_format($product->default_price, 0, ',', '.') }} VNĐ</p>
        </div>
      </div>
    @endforeach
  </div>
  {{-- <div class="mt-6 px-2 flex justify-center items-center">
    {!! $products->links('layouts.pagination') !!}
  </div> --}}
</div>

@include('layouts.footer')

{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const pageParam = urlParams.get('page');
      if (pageParam && parseInt(pageParam) >= 1) {
          window.location.hash = 'product';
          document.getElementById('product').scrollIntoView();
      }
  });
</script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>