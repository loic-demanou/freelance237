<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            </div>
            @error('name')
            <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror


            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
            </div>
            @error('email')
            <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror


            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" />
            </div>
            @error('password')
            <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror


            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password" />
            </div>
            @error('password_confirmation')
            <span class="text-red-400 text-sm block">{{ $message }}</span>
            @enderror

            <div class="mt-4">
                <p for="role-select" class="font-semibold text-gray-700 mb-2">I want to be a </p>
                <div class="flex justify-between items-center pb-4">
                    <label for="freelance">Freelance
                        <input type="radio" value="1" id="freelance" name="role_id">
                        <span class="checkmark"></span>
                    </label>
                    <label for="client">Client
                        <input type="radio" value="2" id="client" name="role_id">
                        <span class="checkmark"></span>
                    </label>
                </div>
                @error('role_id')
                    <span class="text-red-400 text-sm block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
