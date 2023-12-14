<div class="h-[88.8px]">
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/storage/images/logo.jpg" class="h-14" alt="Logo">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="relative">
                    <input type="text" placeholder="Search" class="py-2 mr-2 pl-10 pr-4 border rounded-full focus:outline-none focus:ring focus:border-blue-300">
                    <svg class="absolute left-3 top-2.5 text-gray-500 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5-5m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <a href="{{ route('cartIndex')}}" type="button" class="hidden md:flex custom-btn cursor-pointer duration-300 text-black hover:bg-gray-300 border border-gray-400 font-medium rounded-full focus:outline-none focus:ring focus:border-blue-300 text-sm px-4 py-2 text-center">
                    <svg fill="none" class="mx-3" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="currentColor" stroke-width="1.5" d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5"></path>
                    </svg>
                </a>             
                
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="{{ route('feature')}}" class="block text-lg py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Feature</a>
                    </li>
                    <li>
                        <a href="#" class="block text-lg py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Men</a>
                    </li>
                    <li>
                        <a href="#" class="block text-lg py-2 px-3 text-gray-900 rounded hover-bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Women</a>
                    </li>
                    <li>
                        <a href="#" class="block text-lg py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Kids</a>
                    </li>
                    @if (Auth::check())
                        {{-- <li>
                            <a href="{{route('show-profile')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Hello, {{auth()->user()->name}}</a>
                        </li> --}}
                        <li>
                            <a href="{{route('logout')}}" class="block text-lg py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Sign Out</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('show-login')}}" class="block text-lg py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Sign In</a>
                        </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>
</div>
