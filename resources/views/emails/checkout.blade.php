<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="font-sans bg-gray-100">

    <div class="max-w-2xl mx-auto p-4">
        <h2 class="text-2xl text-blue-500">Hello {{ $customer->fullName }}</h2>
        <p class="text-gray-700">Thank you for order shoes at our website. Please check your invoice information!</p>
    </div>

    <div class="max-w-2xl mx-auto p-4 mt-4 bg-white shadow-md">
        <h3 class="text-2xl font-semibold mb-2">Order</h3>
        <table class="w-full table-auto">
            <tr>
                <th class="bg-blue-500 text-white p-2">Order ID</th>
                <td class="p-2">{{ $newOrder->order_id }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Customer</th>
                <td class="p-2">{{ $customer->fullName }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Email</th>
                <td class="p-2">{{ $customer->email }}</td>
            </tr>
            <tr>
                <th class="bg-blue-500 text-white p-2">Order Date</th>
                <td class="p-2">{{ $newOrder->order_date }}</td>
            </tr>
        </table>

        <h3 class="text-2xl font-semibold mb-2 mt-4">Detail Order</h3>
        <table class="w-full table-auto">
            <tr>
                <th class="bg-blue-500 text-white p-3">No</th>
                <th class="bg-blue-500 text-white p-3">Product Name</th>
                <th class="bg-blue-500 text-white p-3">Gender</th>
                {{-- <th class="bg-blue-500 text-white p-3">Category</th> --}}
                <th class="bg-blue-500 text-white p-3">Quantity</th>
                <th class="bg-blue-500 text-white p-3">Price</th>
            </tr>
            @php $no = 1; @endphp
            @foreach($cart as $cartItem => $each)
                <tr>
                    <td class="p-3">{{ $no++ }}</td>
                    <td class="p-3">
                        @if(isset($each['product_name']))
                            {{ $each['product_name'] }}
                        @else
                            Product not Exsits
                        @endif
                    </td>
                    <td class="p-3">{{ $each['gender'] }}'s shoes' </td>
                    {{-- <td class="p-2">{{ $each['category'] }} </td> --}}
                    <td class="p-3">{{ $each['quantity'] }} </td>
                    <td class="p-3">{{ number_format($each['price'], 0, ',', '.')  . ' VNĐ'}}</td>
                </tr>
            @endforeach
        </table>

        <h3 class="text-2xl font-semibold mb-2 mt-4">Tổng thanh toán</h3>
        <h3 class="text-2xl font-semibold mb-2 mt-4">
            @php
                $totalAmount = 0;
                foreach ($cart as $cartItem => $each) {
                    $totalAmount += $each['quantity'] * $each['price'];
                }
                echo number_format($totalAmount, 0, ',', '.') . ' VNĐ';
            @endphp
        </h3>
    </div>
</body>
</html>
