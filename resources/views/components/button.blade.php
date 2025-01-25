<{{ $tag }}
    {{ $contextualizedAttributes($attributes)->merge([
        'class' => 'px-12 py-10 bg-orange-500 text-white rounded-lg transition-all  outline-none ring-0 ring-orange-100 hover:bg-orange-600 active:scale-98 active:bg-orange-600 focus-visible:ring-2 focus-visible:bg-orange-600'
    ]) }}
>
    <span class="button__content">
        {{ $slot }}
    </span>
</{{ $tag }}>
