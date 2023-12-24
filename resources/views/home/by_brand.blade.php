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

    <title>Brands </title>
</head>
<body>
@include('layouts.nav')
 
<div class="flex flex-col lg:flex-row">
    <div class="lg:w-1/4 p-4 md:p-12 simplebar lg:flex-shrink-0" data-simplebar>
        <h6 class="font-bold text-[25px] mb-4">Filter</h6>
    
        <!-- Filter theo categories -->
        <div class="hidden">
            <label for="brandFilter" class="block text-lg font-medium text-gray-600">Brand</label>
            <select id="brandFilter" class="mt-1 p-2 border rounded-md w-full">
                @foreach($brands as $brand)
                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div>
      
        <div>
            <label for="genderFilter" class="block text-lg font-medium text-gray-600">Gender</label>
            <select id="genderFilter" class="mt-1 p-2 border rounded-md w-full">
                <option value="">All Genders</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Kid">Kid</option>
            </select>
        </div>
        
        <div>
            <label for="categoryFilter" class="block text-lg font-medium text-gray-600">Category</label>
            <select id="categoryFilter" class="mt-1 p-2 border rounded-md w-full">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        
        <button id="applyFilters" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4 hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100 hover:scale-105">Apply Filters</button>
    </div>
    
    <!-- Hiển thị sản phẩm chiếm 3/4 màn hình trên màn hình lớn (lg) -->
    <div id="product" class="lg:w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-4 justify-center p-4 md:p-12 mx-auto">
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
                    <p class="text-lg mt-2">{{ $product->gender }}'s Shoes</p>
                    <p class="text-lg mt-2">{{ number_format($product->default_price, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="mt-6 mb-10 px-2 flex justify-center items-center">
    {!! $products->links('layouts.pagination') !!}
</div>

@include('layouts.footer')

<script>

    //bộ lọc
    $(document).ready(function () {
        $('#applyFilters').on('click', function () {
            var brandFilter = $('#brandFilter').val();
            var genderFilter = $('#genderFilter').val();
            var categoryFilter = $('#categoryFilter').val();

            $.ajax({
                type: 'GET',
                url: '{{ route("filter-products") }}',
                data: {
                    brand: brandFilter,
                    gender: genderFilter,
                    category: categoryFilter,
                },
                success: function (data) {
                    console.log(data); // Log the response data
                    $('#product').html(data);
                    
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
  document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const pageParam = urlParams.get('page');
      if (pageParam && parseInt(pageParam) >= 1) {
          window.location.hash = 'product';
          document.getElementById('product').scrollIntoView();
      }
  });


</script>

</body>
</html>
