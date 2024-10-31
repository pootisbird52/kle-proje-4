@props(['tag'])

@php
    $classes = "bg-gray-500/70 rounded-xl w-fit px-[2vw] text-center hover:bg-gray-500/30 transition-colors duration-300 h-fit"
@endphp

<a href="/tags/{{ $tag->name }}" class="{{$classes}}"> {{ $tag->name }} </a>
