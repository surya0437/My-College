<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1 rounded-md" type="text" name="name"
                :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1 rounded-md" type="email" name="email"
                :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1 rounded-md" type="password" name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1 rounded-md" type="password"
                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            {{-- <div class="flex items-center ">
                <p class="mr-3">Already registered?</p>

                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-[#fe820e] dark:hover:text-[#fe820e] focus:outline-none dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('login') }}
                </a>
            </div> --}}
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-[#fe820e] dark:hover:text-[#fe820e] focus:outline-none dark:focus:ring-offset-gray-800"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
            <x-primary-button
                class="ms-4 inline-flex items-center px-4 py-2 bg-[#ff9f43] dark:bg-[#ff9f43] border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-[#fe820e] dark:hover:bg-[#fe820e] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
