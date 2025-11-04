<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="bg-gray-800 rounded-md max-w-auto">

            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company" class="mx-auto h-10 w-auto" />
                    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Create Account
                    </h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" :value="__('Name')"
                                class="block text-sm/6 font-medium text-gray-100">Name
                            </label>
                            <div class="mt-2">
                                <input id="name" type="name" name="name" :value="old('name')" required
                                    autocomplete="name"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                        </div>
                        <div>
                            <label for="email" :value="__('Email')"
                                class="block text-sm/6 font-medium text-gray-100">Email
                            </label>
                            <div class="mt-2">
                                <input id="name" type="name" name="name" :value="old('name')" required
                                    autocomplete="name"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                        </div>
                        <div class="mt-2 mb-4">
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <label for="password" class="block text-sm/6 font-medium text-gray-100">Confirm
                                    Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                        </div>

                        <div class="">
                            <button type="submit"
                                class="flex w-full justify-center mt-2 rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                {{ __('Register') }}</button>
                        </div>
                    </form>

                    <p class="mt-2 text-center text-sm/6 text-gray-400">
                        Already have an account?
                        {{-- <a href="{{ route('/welcome') }}"
                            class="inline-block py-1.5 text-indigo-400 hover:text-indigo-300 ">
                            Login
                        </a> --}}
                    </p>
                </div>
            </div>
        </div>
        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}
    </form>
</x-guest-layout>
