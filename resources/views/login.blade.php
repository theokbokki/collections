<x-auth-layout title="Welcome back">
    <p class="text-stone-500 mt-8">Please entrer your credentials bellow to login.</p>
    <x-auth-form :route="route('login.store')" button="Login">
        <x-input-field id="email" name="email" type="email" label="Email"/>
        <x-input-field id="password" name="password" type="password" label="Password"/>
        <div class="flex items-end justify-between">
            <x-checkbox-field id="remember" name="remember" label="Remember me"/>
            <a href="#" class="text-stone-600 underline transition-colors hover:text-slate-800 focus-visible:outline-orange-600">Forgot password</a>
        </div>
    </x-auth-form>
    <p class="mt-16 text-stone-500">No account yet? <a href="{{ route('register') }}" class="text-orange-500 underline transition-colors hover:text-orange-600 focus-visible:outline-orange-600">Register</a></p>
</x-auth-layout>
