<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>
    <div class="py-5 ">
        <div class="max-w-7xl mx-auto   sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="javascript:history.back()" class="mb-4 text-white bg-cyan-500 rounded p-1"><i class="fa-solid fa-backward text-white m-2"></i>{{__('Back')}}</a>

                    <h2 class="text-gray-700 text-base font-bold">{{__('Order details')}}</h2>
                    <h2 class="text-gray-500 text-base my-1">{{__('Order added by')}}: <span class="font-bold">{{$order->user->name}}</span></h2>
                    <h2 class="text-gray-500 text-base my-1">Agreado: {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}</h2>

                    <div class=" m-2 p-1">
                        @switch($order->status)
                            @case("new")
                            <span class="text-white rounded-full bg-indigo-700 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                                @break
                        
                            @case("in_process")
                            <span class="text-gray-100 rounded-full bg-blue-500 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                                @break

                            @case("finished")
                                <span class="text-gray-100 rounded-full bg-teal-600 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                                @break
                            
                            @case("delivered")
                                <span class="text-gray-100 rounded-full bg-blue-900 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                                @break

                        @endswitch



                    
                        @if ($order->paid)
                            <span class="rounded-full bg-green-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">{{__('Paid')}}</span>
                            
                        @else
                            <span class="rounded-full bg-red-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">No {{__('Paid')}}</span>
                        @endif
                        @if ($order->delivery)    
                            <span class="text-center rounded-full bg-orange-400 text-gray-100 uppercase p-1 text-sm font-bold  f">{{__('With delivery')}}</span>

                        @else
                            <span class="rounded-full bg-gray-400 text-gray-200 uppercase px-1 py-1 text-sm font-bold f">{{__('Without delivery')}}</span>
                        @endif
                        <br>
                        <span class="text-lg  text-gray-600 dark:text-gray-200 font-bold m-2">
                            {{$order->customer}}
                        </span>
                        <hr>
                        
                        @if ($order->delivery)
                            <small class="text-sm text-gray-600 dark:text-gray-400 font-bold m-1">
                                Direccion: {{ $order->address }}
                            </small>
                            <hr>
                            <small class="text-sm text-gray-600 dark:text-gray-400 font-bold m-1">
                                Entrega: {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}
                            </small>
                        @else
                            <small class="text-sm text-gray-600 dark:text-gray-400 font-bold m-1">
                                Retira: {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}
                            </small>
                        @endif
                        <hr>
                        @unless($order->created_at->eq($order->updated_at))
                            <small class="text-sm text-gray-600 dark:text-gray-400 m-1"> &middot; {{ __('edited') }}</small>
                            <br>
                        @endunless

                        <p class="text-sm text-gray-600 dark:text-gray-400 font-bold m-1">Total: ${{$order->total}}</p>

                        <p class="mt-4 text-lg text-gray-900 dark:text-gray-100 font-bold">{{ $order->description }}</p>                        

                        <div class="flex float-right m-2">
                            <a href="{{route('orders.edit',$order)}}" class="bg-blue-700 hover:bg-blue-900 text-white text-sm font-bold p-1 rounded mx-1" id="loadOrdersBtn">{{__('Edit')}}</a>
                            <form action="{{route('orders.destroy',$order)}}" method="POST">
                                @csrf @method('DELETE')
                                <button class="bg-red-800 hover:bg-red-900 text-white text-sm font-bold p-1 rounded" id="loadOrdersBtn">{{__('Delete')}}</button>
                            </form>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>                           
</x-app-layout>