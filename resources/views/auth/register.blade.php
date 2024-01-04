<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
        <h3 class="text-center text-4xl font-bold leading-9 tracking-tight text-gray-900">Welcome!</h3>
        <p class=" text-center text-xs text-[#605C5C]">Sign in to your account</p>
        </div>

        <!-- Name -->
        <x-input-label for="name" :value="__('Name')" class="mt-4" />
        <div class=" mt-2 border-l-[5px] border-[#4E92F3] rounded-xl">
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <x-input-label for="email" :value="__('Email')" class="mt-4"/>
        <div class="mt-2 border-l-[5px] border-[#4E92F3] rounded-xl">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <x-input-label for="password" :value="__('Password')" class="mt-4"/>
        <div class="mt-2 border-l-[5px] border-[#4E92F3] rounded-xl">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mt-4" />
        <div class="mt-2 border-l-[5px] border-[#4E92F3] rounded-xl">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- button Register -->
        <div class="mt-4">
            <x-primary-button class=" bg-[#4E92F3] from-gray-700 to-gray-900 font-medium md:p-4 text-white uppercase w-full rounded-3xl">
                {{ __('Register') }}
            </x-primary-button>
        </div>


        <!-- Sudah punya akun? -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>


    </form>
</x-guest-layout>
