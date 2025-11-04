<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-2xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <div class="bg-gray-800 rounded-md max-w-auto">

                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company" class="mx-auto h-10 w-auto" />
                        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign in to your
                            account
                        </h2>
                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <div>
                                <label for="email" :value="__('Email')"
                                    class="block text-sm/6 font-medium text-gray-100">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" type="email" name="email" :value="old('email')" required
                                        autocomplete="email"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="password"
                                        class="block text-sm/6 font-medium text-gray-100">Password</label>
                                    <div class="text-sm">
                                        <a href="#"
                                            class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot
                                            password?</a>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <input id="password" type="password" name="password" required
                                        autocomplete="current-password"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                    {{ __('Log in') }}</button>
                            </div>
                        </form>

                        <p class="mt-10 text-center text-sm/6 text-gray-400">
                            Not a member?
                            <a href="{{ route('register') }}"
                                class="inline-block py-1.5 text-indigo-400 hover:text-indigo-300 ">
                                Register
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endif
        {{-- <nav class="flex items-center justify-end gap-4">
           @auth
               <a href="{{ url('/dashboard') }}"
                   class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                   Dashboard
               </a>
           @else
               <a href="{{ route('login') }}"
                   class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                   Log in
               </a>
    
               @if (Route::has('register'))
                   <a href="{{ route('register') }}"
                       class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                       Register
                   </a>
               @endif
           @endauth
       </nav> --}}
    </header>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
