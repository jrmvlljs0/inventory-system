<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php else: ?>
    <?php endif; ?>
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-2xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        <?php if(Route::has('login')): ?>
            <div class="bg-gray-800 rounded-md max-w-auto">

                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        
                        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign in to your
                            account
                        </h2>
                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
                            <?php echo csrf_field(); ?>
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
                                <div class="mt-2">
                                    <label for="password" :value="__('Password')"
                                        class="block text-sm/6 font-medium text-gray-100">Password
                                    </label>
                                    <input id="password" type="password" name="password" required
                                        autocomplete="current-password"
                                        class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                    <?php echo e(__('Log in')); ?></button>
                            </div>
                        </form>
                        <div class="mt-3">

                            <?php if(Route::has('password.request')): ?>
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot your password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                        <p class="mt-5 text-center text-sm/6 text-gray-400">
                            Don't have an account?
                            <a href="<?php echo e(route('register')); ?>"
                                class="inline-block py-1.5 text-indigo-400 hover:text-indigo-300 ">
                                Register
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        
    </header>
    <?php if(Route::has('login')): ?>
        <div class="h-14.5 hidden lg:block"></div>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\AIO Wireless\Documents\github\inventory-system\resources\views/welcome.blade.php ENDPATH**/ ?>