<x-auth-layout title="Welcome to Collections">
    <p class="text-stone-500 mt-8">Please fill the form bellow to create an account.</p>
    <x-auth-form :route="route('register.store')" button="Register">
        <x-input-field id="username" name="username" type="text" label="Username"/>
        <x-input-field id="email" name="email" type="email" label="Email"/>
        <x-input-field id="password" name="password" type="password" label="Password"/>
    </x-auth-form>
    <p class="mt-16 text-stone-500">Already have an account? <a href="{{ route('login') }}" class="text-orange-500 underline transition-colors hover:text-orange-600 focus-visible:outline-orange-600">Login</a></p>
</x-auth-layout>
