<x-my-layout>
    @if (session('token'))
        <div class="mb-[10vh]">
            @foreach ($product as $productnum)
                <x-card-wide :$product :$productnum></x-card-wide>
            @endforeach
        </div>
        
        <div class="self-center">
            <div>
                {{$product->links()}} 
            </div>

        </div>
        {{-- <div class="bg-blue-500">
            <a href="{{$paginate['prev_page_url']}}"><</a>
        </div>
        <div>
            <a href="{{$paginate['next_page_url']}}">></a>
        </div> --}}
    @endif
</x-my-layout>
