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

    <title>Brands</title>
</head>
<body>
@include('layouts.nav')

<h1>Products by {{ $brand->brand_name }}</h1>

    @foreach ($products as $product)
        <div>
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->description }}</p>
            {{-- Thêm thông tin khác về sản phẩm nếu cần --}}
        </div>
    @endforeach
</body>
</html>