<div class="h-[88.8px]">
	<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
		<nav class="relative px-4 py-4 flex justify-between items-center bg-white">
			<a class="text-3xl font-bold leading-none" href="/">
				<img src="/storage/images/logo.jpg" class="h-14" alt="Logo">
			</a>
			<div class="lg:hidden">
				<button class="navbar-burger flex items-center text-blue-600 p-3">
					<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<title>Mobile menu</title>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
					</svg>
				</button>
			</div>
			<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
				<li><a class="text-lg text-gray-400 hover:text-gray-500" href="/">Home</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-lg text-gray-400 hover:text-gray-500" href="{{ route('feature')}}">New & Feature</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-lg text-gray-400 hover:text-gray-500" href="{{ route('men_products')}}">Men</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-lg text-gray-400 hover:text-gray-500" href="{{ route('women_products')}}">Women</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-lg text-gray-400 hover:text-gray-500" href="{{ route('kid_products')}}">Kid</a></li>
			</ul>


			<div class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-lg text-gray-900 font-bold  rounded-xl transition duration-200">
				<div class="mx-auto max-w-md">
					<form action="" class="relative mx-auto w-max">
						<input type="search" class="peer cursor-pointer relative z-10 h-12 w-12 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-lime-300 focus:pl-16 focus:pr-4" />
						<svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-lime-300 peer-focus:stroke-lime-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
						</svg>
					</form>
				</div>		
			</div>
			<div class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-lg text-gray-900 font-bold  rounded-xl transition duration-200">
				<a href="{{ route('cartIndex')}}" type="button" class="md:flex custom-btn cursor-pointer duration-300 text-black hover:bg-gray-300 border border-gray-400 font-medium rounded-full focus:outline-none focus:ring focus:border-blue-300 text-sm px-4 py-2 text-center relative">
					<div class="relative scale-125">
						<svg fill="none" class="mx-3" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke="currentColor" stroke-width="1.5" d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5"></path>
						</svg>
						@if($cart && count($cart) > 0)
							<span class="absolute scale-75 -top-2 left-5 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">{{ count($cart) }}</span>
						@endif
					</div>
				</a>				
			</div>

			@if (Auth::check())
				<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-lg text-gray-900 font-bold  rounded-xl transition duration-200" href="{{route('logout')}}">Sign Out</a>
			@else			
				<a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-lg text-white font-bold rounded-xl transition duration-200" href="{{route('show-login')}}">Sign In</a>
			@endif
	
		</nav>
		<div class="navbar-menu relative z-50 hidden">
			<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
			<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
				<div class="flex items-center mb-8">
					<a class="mr-auto text-3xl font-bold leading-none" href="/">
						<img src="/storage/images/logo.jpg" class="h-14" alt="Logo">
					</a>
					<button class="navbar-close">
						<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
						</svg>
					</button>
				</div>
				<div>
					<ul>
						<li class="mb-1">
							<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="/">Home</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('feature')}}">New & Feature</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('men_products')}}">Men</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('women_products')}}">Women</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('kid_products')}}">Kids</a>
						</li>
						@if (Auth::check())
							<li class="mb-1">
								<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{route('logout')}}">Sign Out</a>
							</li>						
						@else			
							<li class="mb-1">
								<a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{route('show-login')}}">Sign In</a>
							</li>						
						@endif
					</ul>
				</div>
				<div class="mt-auto">
					<p class="my-4 text-xs text-center text-gray-400">
						<span>Copyright © 2021</span>
					</p>
				</div>
			</nav>
		</div>
	</nav>
</div>

<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>