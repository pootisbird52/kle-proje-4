<x-my-layout>
    <div class="mb-[10vh]">
        @foreach ($product as $product)
            <x-card-wide :$product></x-card-wide>
        @endforeach

    </div>
   <div>
    </div>
</x-my-layout>
