<div id="product"
    @forelse($products as $product)
        <div class="w-[250px]">
            <figure class="shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105">
                <a href="{{ route('show', $product->product_id) }}">
                    <div class="h-[250px]">
                        <img class="h-[250px] w-full" src="/storage/images/product-images/{{$product->product_id}}/{{$product->image}}" alt="">
                    </div>
                </a>
            </figure>
            <div class="text-left p-4">
                <a href="{{ route('show', $product->product_id) }}">
                    <p class="font-bold text-lg mt-2">{{ $product->product_name }}</p>
                </a>
                <p class="text-lg mt-2">{{ $product->gender }}'s shoes</p>
                <p class="text-lg mt-2">{{ number_format($product->default_price, 0, ',', '.') }} VNĐ</p>
            </div>
        </div>
    @empty
        <p>No products found</p>
    @endforelse
</div>
