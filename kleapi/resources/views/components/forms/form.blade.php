<form {{ $attributes(["class" => "max-w-full form-text-responsive mx-auto space-y-[.3vw]", "method" => "GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>
