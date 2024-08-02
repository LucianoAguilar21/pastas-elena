<nav x-data="{ open: false }" id="nav" class="top-0 w-full">
    @include('partials.header')
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="flex items-center" id="pastas">
                    <a href="#pastas">                                
                        <span class="ml-2 text-3xl font-semibold sm:text-center sm:m-auto"><span class="text-cyan-500">Pastas</span><span class="text-pink-400">Elena</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex flex items-center justify-end">
                    <a href="#menu" class="btnNavMenu text-white font-bold hover:text-pink-400 rounded">Menú</a>
                    <a href="#contact" class="btnNavContact text-white font-bold hover:text-pink-400 rounded">Contacto</a>
                </div>
            </div>
       
            <!-- Hamburger -->
            <div class="space-me-2 flex items-center sm:hidden">
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
            
            <a href="#menu" class="btnNavMenu text-white hover:text-gray-600">Menu</a>
            <a href="#contact" class="btnNavMenu text-white hover:text-gray-600">Contacto</a>
        </div>
    </div>
</nav>