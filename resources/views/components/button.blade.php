@if($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'inline-block px-4 py-2 rounded text-white no-underline hover:opacity-90 transition-opacity']) }}>
        {{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => 'inline-block px-4 py-2 rounded text-white no-underline hover:opacity-90 transition-opacity']) }}>
        {{ $slot }}
    </button>
@endif
