<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ChatMtaani</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (!Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8 grid grid-cols-1 lg:grid-cols-2">
                <div class="flex justify-center">
                    <img src="{{asset('images/Logo.webp')}}" class="w-full" alt="Chat Mtaani"/>
                </div>

                <div class="">

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div class="flex gap-x-10 items-center align-middle">

                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">What is ChatMtaani?</h2>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                ChatMtaani is an innovative solution designed to bridge the digital divide by making the power of artificial intelligence accessible to farmers in rural and underserved communities.</p>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Utilizing a simple shortcode <a class="hover:underline text-blue-400">23348</a>, this service allows users to interact with ChatGPT—a highly sophisticated AI chatbot—via SMS on both feature phones and smartphones. This enables farmers to receive real-time, actionable advice on a wide range of topics, from best farming practices to market trends, all without the need for internet access or advanced technological know-how.</p>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">By democratizing access to cutting-edge AI technology, ChatMtaani aims to empower farmers to make data-driven decisions, thereby increasing their productivity and improving their livelihoods.
                                </p>
                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-3xl leading-relaxed">
                                    To get started, send an SMS to 22348
                                </p>
                            </div>
                            </div>


                        </div>



                </div>


            </div>
        </div>
    </body>
</html>
