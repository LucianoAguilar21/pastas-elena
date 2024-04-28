<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pastas Elena</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="shortcut icon" href="https://scontent.fsty1-1.fna.fbcdn.net/v/t1.6435-9/209762159_341557424073447_222755981763541434_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=eY4q_Hht1pMAb6W3XEW&_nc_ht=scontent.fsty1-1.fna&oh=00_AfCrqaM7PmEf6HCrHDaSV2ETNZcVb8BMEt95kPi5h8SQLw&oe=6648FCE9" type="image/x-icon">
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class=" font-sans antialiased dark:text-white/50 bg-[url('../img/background-pastas2.jpg')] sm:h-screen bg-cover lg:bg-scroll bg-fixed">
        <header class="items-center gap-2 text-gray-400 bg-slate-900">                        
            <div class="w-full p-2 text-center  font-bold">Rawson 1008, Concordia, Argentina 3200</div>
        </header>


        <nav x-data="{ open: false }" class="dark:bg-gray-800  dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex justify-between w-full">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <a href="">                                
                                <span class="ml-2 text-3xl font-semibold sm:text-center sm:m-auto"><span class="text-cyan-500">Pastas</span><span class="text-pink-400">Elena</span></span>
                            </a>
                        </div>
        
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:flex flex items-center justify-end">
                            <a href="#" class="text-white font-bold hover:text-pink-400 rounded">Inicio</a>
                            <a href="#" class="text-white font-bold hover:text-pink-400 rounded">Menú</a>
                            <a href="#" class="text-white font-bold hover:text-pink-400 rounded">Contacto</a>
                        </div>
                    </div>
               
                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1 text-center space-x-6">
                    <a href="#" class="text-white hover:text-gray-600">Inicio</a>
                    <a href="#menu" class="text-white hover:text-gray-600">Menu</a>
                    <a href="#" class="text-white hover:text-gray-600">Contacto</a>
                </div>
            </div>
        </nav>
        
        <main class="mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <section class="container mx-auto h-screen px-4 py-8  ">
                <div class="m-auto">
                    <h1 class="text-5xl font-semibold text-white lg:text-center sm:text-justify">
                       Pastas Elena
                    </h1>
                    <p class="text-5xl font-semibold text-white lg:text-center sm:text-justify">Rotisería <br> Fábrica de Pastas</p>R
                </div>
                <div class="text-center mt-20">
                    <a href="#menu" class="text-white font-bold text-xl p-2 bg-rose-500 rounded">MENU</a>
                </div>
            </section>
            <section class="menu h-screen" id="menu">
                <h2 class="text-white font-bold text-5xl mb-10 ">MENU</h2>
                <div class="product text-white">
                    <img class="img-product" src="https://assets.elgourmet.com/wp-content/uploads/2023/03/fd00834207b69421f6e7ec82132c9445_3_3_photo-1024x683.png.webp" alt="f">
                    <h3 class="text-xl font-bold border-dashed border-b">Ravioles</h3>
                </div>
            </section>
        </main>
    
   
        <div class="bottom-0 left-0 w-full h-32  bg-gray-500/50 z-50">
        <footer class="p-2  text-center text-sm text-white dark:text-white/70 ">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            {{__('Dashboard')}}
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            {{__('Log in')}}
                        </a>

                    
                    @endauth
                </nav>
            @endif
           
        </footer>
        </div>
        <div class="whatsapp-btn">
            <a href="https://wa.me/5493454952680" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/174/174879.png" width="50px" alt=""></a>
        </div>
    </body>
<style>
   
</style>
</html>