<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.css" />
    <script src="https://unpkg.com/simplebar@5.3.4/dist/simplebar.min.js"></script>

    <title>Feature</title>
</head>
<body>
@include('layouts.nav')
 
<div class="flex">
  {{-- <div class="flex-none w-1/5 p-4 md:p-12 simplebar" data-simplebar>
    <h6 class="font-bold text-[25px] mb-4">Filter</h6>

    <!-- Filter theo brands -->
    <div class="mb-6">
        <label for="brandFilter" class="block text-sm font-medium text-gray-600">Brand</label>
        <select id="brandFilter" name="brandFilter" class="mt-1 p-2 border rounded-md w-full">
            <!-- Populate brands dynamically from your database -->
            @foreach($brands as $brand)
                <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Filter theo categories -->
    <div class="mb-6">
        <label for="categoryFilter" class="block text-sm font-medium text-gray-600">Category</label>
        <select id="categoryFilter" name="categoryFilter" class="mt-1 p-2 border rounded-md w-full">
            <!-- Populate categories dynamically from your database -->
            @foreach($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Filter theo gender -->
    <div class="mb-6">
        <label for="genderFilter" class="block text-sm font-medium text-gray-600">Gender</label>
        <select id="genderFilter" name="genderFilter" class="mt-1 p-2 border rounded-md w-full">
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <!-- Thêm các giá trị khác nếu cần -->
        </select>
    </div>

    <!-- Nút để kích hoạt bộ lọc -->
    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md">Apply Filters</button>
  </div>  --}}


  <div class="w-1/5 p-4">
    <!-- Bộ lọc -->
    <form action="" method="get">
        <div class="mb-4">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="w-full">
              @foreach($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="w-full">
              @foreach($brands as $brand)
                <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="brand">Brand:</label>
            <select name="brand_id" id="brand" class="w-full">
              <option value="Men">Men</option>
              <option value="Women">Women</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
    </form>
  </div>

  <div id="product" class="mt-6 p-4 md:p-12">
    <div class="flex-grow w-4/5 flex flex-wrap gap-x-2 gap-y-8 mt-4 justify-center p-4 md:p-12">
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
    <div class="mt-6 mb-10 px-2 flex justify-center items-center">
      {!! $products->links('layouts.pagination') !!}
    </div>
  </div>
</div>

{{-- <div id="product" class="mt-6 p-4 md:p-12">
    <div class="pl-6 grid place-items-center">
      <h6 class="font-bold text-[25px]">New</h6>
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
    <div class="mt-6 px-2 flex justify-center items-center">
      {!! $products->links('layouts.pagination') !!}
    </div>
</div> --}}

@include('layouts.footer')

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const pageParam = urlParams.get('page');
      if (pageParam && parseInt(pageParam) >= 1) {
          window.location.hash = 'product';
          document.getElementById('product').scrollIntoView();
      }
  });

  document.addEventListener('DOMContentLoaded', function () {
        new SimpleBar(document.querySelector('.simplebar'));
    });
</script>

</body>
</html>