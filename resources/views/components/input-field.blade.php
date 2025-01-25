<div class="flex flex-col mt-24">
    <label for="{{ $id }}" class="text-stone-800">{{ $label }}</label>
    <input type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        class="mt-8 border px-16 py-10 text-base rounded-lg text-stone-800 transition-all duration-250 outline-none ring-0 ring-orange-100 focus-visible:ring-2 @error($name) border-red-600 @else border-stone-300  hover:border-stone-500 focus-visible:border-orange-600 @enderror"
    >
    <x-error :$name class="mt-4"/>
</div>
