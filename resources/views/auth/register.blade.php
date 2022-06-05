<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('img/logo_color.png') }}" class="w-20 h-20" />
            </a>
        </x-slot>
        <div class="text-center mb-10">
            <h1 class="text-2xl">- Registro de Usuarios -</h1>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <input type="text" id="name" name="name" :value="old('name')" required autofocus placeholder="Nombre" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="text" id="lastname" name="lastname" :value="old('lastname')" required autofocus placeholder="Apellido" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="email" id="email" name="email" :value="old('email')" required autofocus placeholder="Email" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="text" id="bussines" name="bussines" :value="old('bussines')" required autofocus placeholder="Empresa" class="input input-bordered w-full mb-5">
            </div>
            <div class="mt-4">
                <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Contraseña / Clave" class="input input-bordered w-full mb-5">
            </div>
            <div class="mt-4">
                <input type="password" id="password_confirmation" name="password_confirmation"  required placeholder="Repetir Contraseña " class="input input-bordered w-full mb-5">
            </div>

            <div class="grid items-center justify-start mt-4  grid-cols-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estoy Regiistrado?') }}
                </a>

                <x-button class=" btn-md float-right text-center">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
