<div class="h-[88.8px]">
	<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
		<nav class="relative px-4 py-4 flex justify-between items-center bg-white">
			<a class="text-3xl font-bold leading-none" href="/">
				<img src="/storage/images/logo.jpg" class="h-14" alt="Logo">
			</a>
			<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-5">
				<li><a class="text-[15px] text-gray-400 hover:text-gray-500" href="/">Home</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-[15px] text-gray-400 hover:text-gray-500" href="{{ route('feature')}}">New & Feature</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-[15px] text-gray-400 hover:text-gray-500" href="{{ route('men_products')}}">Men</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-[15px] text-gray-400 hover:text-gray-500" href="{{ route('women_products')}}">Women</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li><a class="text-[15px] text-gray-400 hover:text-gray-500" href="{{ route('kid_products')}}">Kid</a></li>
				<li class="text-gray-300">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
					</svg>
				</li>
				<li>
					<div class="relative mx-auto text-gray-600">
						<form action="{{ route('search') }}"  method="GET" class="relative mx-auto w-max">
							<input class="border-2 border-gray-300 bg-white h-10 px-4 py-5 pr-6 rounded-full text-sm focus:outline-none"
								type="search"
								id="search-input"
								name="keywords"
								placeholder="Search"
							>
							<button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
								<svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="5px"
									viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
									width="512px" height="512px">
									<path
									d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
								</svg>
							</button>
							<div id="suggestionsContainer" class="relative">
								<ul id="suggestionsDropdown" class="dropdown-list bg-white shadow-md rounded-md absolute w-max mt-2 pl-2"></ul>
							</div>
						</form>
					</div>
				</li>
			</ul>

			<div class="flex">
				{{-- Cart --}}
				<a href="{{ route('cartIndex')}}" type="button" class="md:flex custom-btn cursor-pointer duration-300 text-gray-500 hover:bg-gray-300 border border-gray-400 font-medium rounded-full focus:outline-none focus:ring focus:border-blue-300 text-[15px] px-4 py-2 text-center relative mr-2">
					<div class="relative scale-125">
						<svg fill="none" class="mx-3" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke="currentColor" stroke-width="1.5" d="M8.25 8.25V6a2.25 2.25 0 012.25-2.25h3a2.25 2.25 0 110 4.5H3.75v8.25a3.75 3.75 0 003.75 3.75h9a3.75 3.75 0 003.75-3.75V8.25H17.5"></path>
						</svg>
						<span class="absolute scale-75 -top-2 left-6 rounded-full bg-red-500 p-0.5 px-2 text-[14px] text-red-50">{{ Session::has('cart') ? array_sum(array_column(Session::get('cart'), 'quantity')) : 0 }}</span>
					</div>
				</a>		

				@if (Auth::check())
				<div class="relative">
					<a href="{{ route('show-profile')}}" class="text-[15px] text-gray-400 hover:text-gray-500 mr-2">
						<i class="fas fa-user-circle text-3xl"></i>					
					</a>
				</div>
					<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-[15px] text-gray-900 font-bold  rounded-xl transition duration-200" href="{{route('logout')}}">Sign Out</a>
				@else			
					<a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-[15px] text-white font-bold rounded-xl transition duration-200" href="{{route('show-login')}}">Sign In</a>
				@endif
			</div>
			
			<div class="lg:hidden">
				<button class="navbar-burger flex items-center text-gray-600 p-3">
					<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<title>Mobile menu</title>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
					</svg>
				</button>
			</div>
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
							<div class="relative mx-auto text-gray-600">
								<form action="{{ route('search') }}"  method="GET" class="relative mx-auto w-max">
									<input class="border-2 border-gray-300 bg-white h-10 px-4 py-5 pr-6 rounded-full text-sm focus:outline-none"
										type="search"
										id="search-input"
										name="keywords"
										placeholder="Search"
									>
									<button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
										<svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="5px"
											viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
											width="512px" height="512px">
											<path
											d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
										</svg>
									</button>
									<div id="suggestionsContainer" class="relative">
										<ul id="suggestionsDropdown" class="dropdown-list bg-white shadow-md rounded-md absolute w-max mt-2 pl-2"></ul>
									</div>
								</form>
							</div>						
						</li>
						<li class="mb-1">
							<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="/">Home</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('feature')}}">New & Feature</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('men_products')}}">Men</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('women_products')}}">Women</a>
						</li>
						<li class="mb-1">
							<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{ route('kid_products')}}">Kids</a>
						</li>
						@if (Auth::check())
							<li class="mb-1">
								<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{route('logout')}}">Sign Out</a>
							</li>						
						@else			
							<li class="mb-1">
								<a class="block p-4 text-[15px] font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="{{route('show-login')}}">Sign In</a>
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

<script src="{{ asset('js/search-suggestions.js') }}"></script>
