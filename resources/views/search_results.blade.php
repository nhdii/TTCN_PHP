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
    
    <title>Search Results</title>
</head>
<body>
@include('layouts.nav')
<h2 class="text-center pt-10 text-xl">Search Results for "{{ $keywords }}"</h2>
<div class="flex flex-col lg:flex-row mt-2">
    <div id="search" class="lg:w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-4 justify-center p-4 md:p-12 mx-auto">
        @if($results->isEmpty())
            <p class="text-xl justify-center">No results found.</p>
        @else
            @foreach($results as $result)
                <div class="w-[250px]">
                <figure class="shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105">
                    <a href="{{ route('show', $result->product_id)}}">
                    <div class="h-[250px]">
                        <img class="h-[250px] w-full" src="/storage/images/product-images/{{$result->product_id}}/{{$result->image}}" alt="">
                    </div>
                    </a>
                </figure>
                <div class="text-left p-4">
                    <a href="{{ route('show', $result->product_id)}}">
                    <p class="font-bold text-lg mt-2">{{ $result->product_name }}</p>
                    </a>
                    <p class="text-lg mt-2">{{ $result->gender }}</p>
                    <p class="text-lg mt-2">{{ number_format($result->default_price, 0, ',', '.') }} VNĐ</p>
                </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="mt-6 mb-10 px-2 flex justify-center items-center">
    {!! $results->appends(['keywords' => $keywords])->links('layouts.pagination') !!}
</div>

@include('layouts.footer')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam = urlParams.get('page');
        if (pageParam && parseInt(pageParam) >= 1) {
            window.location.hash = 'search';
            document.getElementById('search').scrollIntoView();
        }
    });
  
</script>
</body>
</html>
