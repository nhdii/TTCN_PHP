@extends('layouts.layoutProfile')
@section('title', 'Profile')
@section('main')
<!-- component -->
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
                        <img class="h-auto w-full mx-auto"
                            src="{{ asset('storage/images/user_avt/' . $user->customer_id . '/' . $user->avatar) }}"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$name}}</h1>
                    <!--
                        
                        ẢNH SIÊU TO KHỔNG LỒ HERE!
                        
                    -->
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>{{$member}}</span>
                            <span class="ml-auto">
                            @if ($member == 'Thành viên')
                                <span class="bg-amber-400 py-1 px-2 rounded text-white text-lg">
                                    VIP
                                <span>
                            @else
                            <span class="bg-blue-900 py-1 px-2 rounded text-white text-lg">
                                ADMIN
                            <span>                                     
                            @endif
                            </span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Tài khoản từ</span>
                            <span class="ml-auto">{{$user->created_at}}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Thông tin</span>
                    </div>
                    <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-lg">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-3 font-semibold">Name</div>
                                    @if(Auth::User()->admin == 0)
                                    <input type="text" name="fullName" class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->fullName}}">
                                    @else
                                    <input type="text" name="fullName" class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->name}}">
                                    @endif
                                </div>
                                @if (Auth::User()->admin == 0)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Birth Date</div>
                                        <input type="date" name="birthDay" class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->birthDay}}">
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Gender</div>
                                        <select name="gender" class="px-3 w-full h-10 border border-gray-400 rounded-lg">
                                            <option value="Male" {{ $gender === 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $gender === 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="None" {{ $gender === 'None' ? 'selected' : '' }}>None</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Address</div>
                                        <input type="text" name="address" class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->address}}">
                                    </div>
                                @endif
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-3 font-semibold">Email</div>
                                    <input type="email" name="email" disabled class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->email}}">
                                </div>
                                @if (Auth::User()->admin == 0)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-3 font-semibold">Phone Number</div>
                                        <input type="text" name="phone" pattern="[0-9]{10}" class="px-3 w-full h-10 border border-gray-400 rounded-lg" value="{{$user->phone}}">
                                    </div>
                                @endif
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-3 font-semibold">Avatar</div>
                                    <input value="{{ old('avatar', $user->avatar) }}" name="avatar" type="file" class="w-full h-10 border border-gray-400 cursor-pointer rounded-lg bg-transparent outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-1 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                                    @if($errors->has('avatar'))
                                        <span class="text-red-500">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="my-4 flex justify-center items-center">
                            <button type="submit" name='submit' class="bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">
                                Update
                            </button>
                            <div class="mx-3"></div>
                            <button type="submit" name='cancel' class="text-center bg-amber-300 border-2 border-amber-300 w-40 h-10 rounded-full hover:bg-white">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
                <!-- End of about section -->
            </div>
        </div>
    </div>
</div>
@endsection