@extends('layouts.layoutProfile')
@section('title', 'Profile')
@section('main')
<style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>

<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3">
                    <div class="image overflow-hidden  border-b-4 border-green-400">
                        <img class="h-auto w-full mx-auto" src="{{ asset('storage/images/user_avt/' . $user->customer_id . '/' . $user->avatar) }}" alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$name}}</h1>
                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{$member}}</span>
                            <span class="ml-auto">
                                @if ($member == 'Thành viên')
                                    <span class="bg-amber-400 py-1 px-2 rounded text-white text-lg">
                                        VIP
                                    </span>
                                @else
                                    <span class="bg-blue-900 py-1 px-2 rounded text-white text-lg">
                                        ADMIN
                                    </span>                                   
                                @endif
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Tài khoản từ</span>
                            <span class="ml-auto">{{$user->created_at}}</span>
                        </li>
                    </ul>
                </div>
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Hồ sơ -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                        <a class='text-blue-500' href="{{route('edit-profile')}}">Edit</a>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-lg">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Name</div>
                                <div class="px-4 py-2">{{$name}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birth Date</div>
                                <div class="px-4 py-2">{{$user->birthDay}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{$gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Address</div>
                                <div class="px-4 py-2">{{$user->address}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">{{$user->email}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Phone Number</div>
                                <div class="px-4 py-2">{{$user->phone}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-5"></div>
                <!-- Hóa đơn đã từng mua -->
                <div class="bg-white p-3 shadow-sm rounded-sm mt-4">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide text-lg">Show Full Orders Placed!</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-lg text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-center px-6 py-3">
                                            STT
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Order Date
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Delivery Date
                                        </th>
                                        <th scope="col" class="text-center px-6 py-3">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($order_histories as $item)
                                        <tr class="bg-white">
                                            <td class="text-center px-6 py-4">
                                                {{ $stt++ }}
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                {{ $item->order_date }}
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                {{ $item->delivery_date }}
                                            </td>
                                            <td class="text-center px-6 py-4">
                                                {{ $item->status }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
