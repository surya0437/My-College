<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('staff.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1 rounded" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1 rounded" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <a href="{{ route('password.request') }}">forget password</a>
            <x-primary-button
                class="ms-3 inline-flex items-center px-4 py-2 bg-[#ff9f43] dark:bg-[#ff9f43] border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-[#fe820e] dark:hover:bg-[#fe820e] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="mt-4">
            <a class="ms-3 inline-flex items-center px-4 py-2 bg-[#ff9f43] dark:bg-[#ff9f43] border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-[#fe820e] dark:hover:bg-[#fe820e] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            href="http://127.0.0.1:5000/markAttendance">
                    Mark Attendance
                </a>
        </div>
        {{-- <div class="mt-4">

            <div class="flex items-center justify-between">

                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-[#fe820e] dark:hover:text-[#fe820e] focus:outline-none dark:focus:ring-offset-gray-800"
            href="{{ route('register') }}">
                    {{ __('New here?') }}
                </a>
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>

        </div> --}}
    </form>
</x-guest-layout>
