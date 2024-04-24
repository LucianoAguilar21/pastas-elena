<x-app-layout>
    @can('viewAny',App\Models\Order::class)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>


    <div class="py-5 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  
                      
                  
                        
                    
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="loadOrdersBtn">{{__('Orders')}}</button>
                    {{-- <a href="{{ route('users') }}" class="button {{ request()->is('users') ? 'active' : '' }}">Usuarios</a> --}}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="loadAddOrderBtn">{{__('Add order')}}</button>
                    
                    @if ($errors->any())
                    
                        <div  id="ordersSection" style="display: none;">
                            @include('orders.orders',[$orders,'orders'])
                        </div>
                        <div  id="addOrderSection" style="display: block;">
                            @include('orders.create')
                        </div>
                    @else
                        <div  id="ordersSection" style="display: block;">
                            @include('orders.orders',[$orders,'orders'])
                        </div>
                        <div  id="addOrderSection" style="display: none;">
                            @include('orders.create')
                        </div>
                    @endif
                    
                </div>
                
            </div>
        </div>
    </div>
    <script>
        // Manejador de clic en el botón de usuarios
        document.getElementById('loadOrdersBtn').addEventListener('click', function () {
            document.getElementById('ordersSection').style.display = 'block';
            // Ocultar la sección de pedidos
            document.getElementById('addOrderSection').style.display = 'none';
        });

        // Manejador de clic en el botón de pedidos
        document.getElementById('loadAddOrderBtn').addEventListener('click', function () {
            document.getElementById('ordersSection').style.display = 'none';
            // Ocultar la sección de pedidos
            document.getElementById('addOrderSection').style.display = 'block';
    });
    </script>
@endcan
<div class="py-5 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-center text-xl">Su usuario no tiene permisos</h1>
        </div>
    </div>
</div>
</x-app-layout>