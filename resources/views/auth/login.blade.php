<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}" class="mt-[70px]">
        @csrf
       
        <div>
        <h3 class="text-center text-4xl font-bold leading-9 tracking-tight text-gray-900">Welcome!</h3>
        <p class=" text-center text-xs text-[#605C5C]">Sign in to your account</p>
        </div>

        <!-- Email Address -->
        <x-input-label for="email" :value="__('Email')" />
        <div class="border-l-[5px] border-[#4E92F3] rounded-l">
            
            <x-text-input id="email" class="block my-4 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        
        <x-input-label for="password" :value="__('Password')" class="mt-4" />
        <div class="mt-1 border-l-[5px] border-[#4E92F3] rounded-l">
            
            
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="items-center justify-end mt-4">
           

            <x-primary-button class="mx-auto px-auto">
                {{ __('LOGIN') }}
            </x-primary-button>

            
            @if (Route::has('password.request'))
                <a class="underline text-sm px-[125px] text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            
        </div>

    </form>
</x-guest-layout>
