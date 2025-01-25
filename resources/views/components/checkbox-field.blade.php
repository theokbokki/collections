<div class="flex mt-24 items-center">
    <label for="{{ $id }}" class="text-stone-800 pl-24 relative hover:cursor-pointer before:absolute before:left-0 before:w-10 before:h-10 before:[background-image:var(--checkmark)] before:z-1 before:mt-8 before:bg-no-repeat ml-3">{{ $label }}</label>
    <input type="checkbox"
        id="{{ $id }}"
        name="{{ $name }}"
        class="appearance-none -order-1 w-16 h-16 rounded-sm border border-stone-300 transition-all duration-250 outline-none ring-0 ring-orange-100 absolute  hover:cursor-pointer hover:not-checked:border-stone-500 focus-visible:border-orange-600 focus-visible:ring-2 checked:border-orange-600 checked:bg-orange-500"
    >
</div>
