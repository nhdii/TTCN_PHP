@extends('layouts.master')
@section('content')

<div class="container px-6 py-2 mx-auto">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">THÔNG TIN NHANH</h3>
        <div class="mt-4 flex flex-wrap -mx-6">
            <!-- Hiển thị số liệu cho User -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-user text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">4</h4>
                            <div class="text-gray-500"><b>KHÁCH HÀNG</b></div>
                        </div>
                    </div>
                    </a>
                </div>
            <!-- Hiển thị số liệu cho Service -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-star text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">4</h4>
                            <div class="text-gray-500"><b>SẢN PHẨM</b></div>
                        </div>
                    </div>
                    </a>
                </div>
            <!-- Hiển thị số liệu cho Order -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">6</h4>
                            <div class="text-gray-500"><b>ĐƠN HÀNG</b></div>
                        </div>
                    </div>
                    </a>
                </div>
                
        </div>
    </div>
</div>
@endsection
