@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <span class="w-[.5vw] h-[.5vw] bg-white inline-block"></span>
    <label class="font-bold" for="{{ $name }}">{{ $label }}</label>
</div>
