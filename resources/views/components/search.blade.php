<div class="relative flex items-center">
    <input type="search"
        id="search"
        name="search"
        value="{{ old('search') }}"
        placeholder="Search"
        class="border pl-32 pr-12 py-8 shadow-xs w-320 text-base rounded-lg text-stone-800 transition-all duration-250 outline-none ring-0 ring-orange-100 focus-visible:ring-2 border-stone-300 hover:border-stone-500 focus-visible:border-orange-600"
    >
    <span class="absolute left-8 size-20 text-stone-400 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </span>
</div>
