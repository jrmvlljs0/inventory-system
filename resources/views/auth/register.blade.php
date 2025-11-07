<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="bg-gray-800 rounded-md max-w-auto">

            <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    {{-- <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company" class="mx-auto h-10 w-auto" /> --}}
                    <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-white">Create Account
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
                                <input id="name" type="email" name="email" :value="old('email')" required
                                    autocomplete="username"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                        </div>
                        <div class="mt-2 mb-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-sm/6 font-medium text-gray-100" for="password"
                                    :value="__('Password')">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password"
                                    class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <label for="password_confirmation" :value="__('Confirm Password')"
                                    class="block text-sm/6 font-medium text-gray-100">Confirm
                                    Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password_confirmation" type="password" name="password_confirmation" required
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
                        <a class="underline text-sm text-indigo-400 hover:text-indigo-300  dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ url('/') }}">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
