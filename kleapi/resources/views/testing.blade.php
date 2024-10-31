@props(['products'])
<x-my-layout>
    <div class="mb-[10vh]">
        @foreach ($products as $product)
        <x-card-wide :$products></x-card-wide>  
        @endforeach
        
    </div>
</x-my-layout>

