@props(['product' , 'productnum'])

{{-- @php
    $test = $productnum-1;
    $product = collect($product);
    $test = strval($test);
    // $counts = array_map('count', $data);
    // $key = array_flip($counts)[$max_counts];
    $productnum = $product['data'][$test];
@endphp --}}
<div class="card-responsive group">
    <div class="flex items-center">
        <x-logo :product="$product" :productnum="$productnum"></x-logo>
    </div>
    

    <div class="flex flex-col min-w-[30vw] justify-between my-auto">
        
        <div class="flex justify-between hover:cursor-default">
            <h1 class="card-h1">
                {{ $productnum['user']['first_name']." ".$productnum['user']['last_name'] }}
            </h1>            
        </div>  

        <div class="card-text hover:cursor-default">
            {{-- <a href="/product/{{$product->id}}"> --}}
                {{ $productnum['title'] }}
            {{-- </a> --}}
        </div>

        <div>
            <div class="flex justify-between  space-x-[2vw] ml-[2vw] mt-[6vw] mx-auto">
                <form method="POST" action="/product/{{$productnum['id']}}" id="delete-form-{{$productnum['id']}}" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <button class="home-button-responsive bg-red-600 font-thin hover:bg-red-900 transition-colors duration-300 rounded form-button-text-responsive" style="padding-left: 2vw !important; padding-right: 2vw !important" form="delete-form-{{$productnum['id']}}">Sil</button>
                <a href="/product/{{$productnum['id']}}" class="home-button-responsive bg-blue-600 font-thin hover:bg-blue-900 transition-colors duration-300 rounded form-button-text-responsive "><p class="py-[1vw]">Göster</p></a>
                <a href="/product/{{$productnum['id']}}/edit" class="home-button-responsive bg-green-600 font-thin hover:bg-green-900 transition-colors duration-300 rounded form-button-text-responsive "><p class="py-[1vw]">Düzenle</p></a>
                <h2 class="card-h2 hover:cursor-default xsm:max-md:hidden">
                    {{ $productnum['price'] }}₺
                </h2>
            </div>
            <div class="md:hidden" style="flex items-center self-center text-center ">
                <h2 class="font-thin hover:cursor-default product-text mt-[1vw]" style="text-align:center !important">
                    {{ $productnum['price']."₺" }}
                </h2>
            </div>

            <div class="tagdiv ml-[5vw]">
                {{-- @foreach ($product->tags as $tag)
                    <x-tag :$tag/>
                @endforeach --}}
                
            </div>
        </div>
    </div>

    

    
</div>