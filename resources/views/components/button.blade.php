<{{ $tag }}
    {{ $contextualizedAttributes($attributes)->merge([
        'class' => 'px-12 py-10 bg-orange-500 border border-orange-600 text-white rounded-lg transition-all duration-250 outline-none ring-0 ring-orange-100 inset-shadow-[0_1px_rgba(255,255,255,.25)] hover:bg-orange-600 hover:inset-shadow-[0_0_rgba(255,255,255,.25)] active:scale-98 active:bg-orange-600 focus-visible:ring-2 focus-visible:bg-orange-600'
    ]) }}
>
    <span class="button__content">
        {{ $slot }}
    </span>
</{{ $tag }}>
