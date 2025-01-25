<x-layout>
    <main class="w-full h-full flex flex-col justify-center items-center px-16 before:absolute before:inset-0 before:-z-1 before:bg-[linear-gradient(to_right,var(--color-stone-50)_1px,transparent_1px),linear-gradient(to_bottom,var(--color-stone-50)_1px,transparent_1px)] before:bg-[size:24px_24px] before:[mask-image:linear-gradient(to_top,#000,transparent)]">
        <a href="{{ route('home') }}" class="absolute top-32 left-40 flex items-center group">
            <x-icon/>
        </a>
        <div class="max-w-400 w-full p-24 bg-white border border-stone-200 shadow-lg shadow-stone-200 rounded-xl transform-(--card-rotate) transition-all duration-300 ease-out hover:transform-none hover:shadow-md hover:duration-800 sm:p-40 sm:max-w-460">
            <h1 class="text-xl text-stone-800 font-bold sm:text-2xl">Welcome back</h1>
            <p class="text-stone-500 mt-8">Please entrer your credentials bellow to login.</p>
            <form action="{{ route('login.store') }}" method="POST" class="mt-24">
                @csrf
                <x-input-field id="email" name="email" type="email" label="Email" error="email"/>
                <x-input-field id="password" name="password" type="password" label="Password"/>
                <div class="flex items-end justify-between">
                    <x-checkbox-field id="remember" name="remember" label="Remember me"/>
                    <a href="#" class="text-stone-600 underline transition-colors hover:text-slate-800 focus-visible:outline-orange-600">Forgot password</a>
                </div>
                <x-button type="submit" class="mt-24 text-center w-full">Login</x-button>
            </form>
            <p class="mt-16 text-stone-500">No account yet? <a href="#" class="text-orange-500 underline transition-colors hover:text-orange-600 focus-visible:outline-orange-600">Register</a></p>
        </div>
    </main>
</x-layout>
