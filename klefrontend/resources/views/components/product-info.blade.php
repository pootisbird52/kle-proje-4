@props(['product'])
<div class="flex text-left max-md:text-center gap-y-[1vw] flex-col align-middle self-center">
    <h2 class="h2-responsive">
        {{ $product['user']['first_name']." ".$product['user']['last_name'] }}
    </h2>
    <hr class="w-[45vw] mx-auto">
    <h1 class="product-h1-responsive ">
        {{ $product['title'] }}
    </h1>
    <p class="product-text">
        {{ $product['description']}}
    </p>

    <div>
        <p class="product-text max-md:text-left mb-[2vw]">
            {{ $product['price'] }}₺
        </p>
    </div>  
</div>
