<div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
    <div>
        {{$orders->links()}}
    </div>
    @foreach ($orders as $order)

    <div class="py-6 flex space-x-2">
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>

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
                    <span class="text-lg  text-gray-600 dark:text-gray-200 font-bold">
                        {{$order->customer}}
                    </span>
                    <hr >
                    
                    @if ($order->delivery)
                        <small class="text-sm text-gray-600 dark:text-gray-400 font-bold">
                            Direccion: {{ $order->address }}
                        </small>
                        <hr>
                        <small class="text-sm text-gray-600 dark:text-gray-400 font-bold">
                            Entrega: {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}
                        </small>
                    @else
                        <small class="text-sm text-gray-600 dark:text-gray-400 font-bold">
                            Retira: {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}
                        </small>
                    @endif
                    
                    <br>
                    @unless($order->created_at->eq($order->updated_at))
                        <small class="text-sm text-gray-600 dark:text-gray-400"> &middot; {{ __('edited') }}</small>
                        <br>
                    @endunless

                </div>
            </div>
            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100 font-bold">{{ $order->description }}</p>                        

        </div>
        
        {{-- @can('update',$order) --}}
        <x-dropdown>
            <x-slot name="trigger">
                <button class="text-blue-600 font-bold"><i class="fa-solid fa-ellipsis"></i></button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('orders.show',$order)">
                    {{__('Details')}}
                </x-dropdown-link>
                <x-dropdown-link :href="route('orders.edit',$order)">
                    {{__('Edit order')}}
                </x-dropdown-link>
                <form action="{{route('orders.destroy',$order)}}" method="POST">
                    @csrf @method('DELETE')
                    <x-dropdown-link href="" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{__('Delete order')}}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>                
        {{-- @endcan --}}
    </div>
    
    
    @endforeach

   
</div>