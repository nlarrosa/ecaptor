<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('img/logo_color.png') }}" class="w-20 h-20" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="text-center mb-10">
            <h1 class="text-2xl">- Acceder a eCaptor -</h1>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input type="email" id="email" name="email" :value="old('email')" required autofocus placeholder="Ingresa tu Email" class="input input-bordered w-full mb-5">
            </div>
            <div class="mt-4">
                <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Ingresa tu Contraseña" class="input input-bordered w-full mb-5">
            </div>
            <div class="grid items-center justify-start mt-4  grid-cols-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class=" btn-md float-right text-center">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
