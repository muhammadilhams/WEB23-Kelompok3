<x-guest-layout>
    <form method="POST" action="/addregist">
        @csrf

        <!-- Logo -->
        <a href="/">
            <img src="{{ url('AdminLTE-3.2.0/dist/img/louggo.jpg') }}" alt="logo">
        </a>
        <br>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Roles -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Roles')"/>
            <div class="roles" style="display:flex; ">
                <div class="choice" style="padding-right: 40px ">
                    <input type="radio" name="roles" value="seller" {{ old('role') == 'seller' ? 'checked' : '' }} required>
                    <label for="seller">Seller</label>
                </div>

                <div class="choice">
                    <input type="radio" name="roles" value="buyer" {{ old('role') == 'buyer' ? 'checked' : '' }} required>
                    <label for="buyer">Buyer</label>
                </div>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="confirm_password" :value="__('Confirm Password')" />

            <x-text-input id="confirm_password" class="block mt-1 w-full"
                            type="password"
                            name="confirm_password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
