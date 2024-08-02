@can('viewAny',App\Models\Order::class)
<div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg lg:divide-y dark:divide-gray-900">
    <div class="p-1">
        {{$orders->links("vendor.pagination.tailwind")}}
    </div>
    @foreach ($orders as $order)

    <div class="py-6 flex space-x-2 dark:bg-gray-800 border-b-2">
        <div class="w-full">
            <div class="">
                    @switch($order->status)
                        @case("new")
                        <span class="text-gray-800 rounded-full bg-[#daf204] uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break
                    
                        @case("in_process")
                        <span class="text-gray-100 rounded-full bg-blue-500 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break

                        @case("finished")
                            <span class="text-gray-100 rounded-full bg-[#09456c] uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break
                        
                        @case("delivered")
                            <span class="text-gray-100 rounded-full bg-[#1ca39e] uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break

                    @endswitch



                    
                    @if ($order->paid)
                        <span class="rounded-full bg-green-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">{{__('Paid')}}</span>
                        
                    @else
                        <button class="rounded-full bg-red-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold origin-center transition ease-in-out duration-300  hover:scale-110">No {{__('Paid')}}</button>
                    @endif
                    @if ($order->delivery)    
                        <span class="text-center rounded-full bg-orange-500 text-white uppercase p-1 text-sm font-bold  f">{{__('With delivery')}}</span>

                    @else
                        <span class="rounded-full bg-gray-600 text-white uppercase px-1 py-1 text-sm font-bold f">{{__('Withdraw')}}</span>
                    @endif

                    <br>
                    @unless($order->created_at->eq($order->updated_at))
                        <small class="text-sm text-gray-600 dark:text-gray-400 mt-2"> &middot; {{ __('Edited') }}</small>
                        
                    @endunless
                  
                    <p class="text-xl text-gray-600 dark:text-white  font-bold">
                        {{$order->customer}}
                    </p>

                    <p class="mb-4 text-lg text-gray-900 dark:text-white text-left">{{ $order->description }}</p>   
                  
                    @if ($order->delivery)
                        <small >
                            <span class="text-base text-gray-600 dark:text-white font-bold">Direccion:</span><span class="text-gray-600 dark:text-white text-base"> {{ $order->address }} </span>
                        </small>
                        <br>
                        
                        <small >
                            <span class="text-base text-gray-600 dark:text-white font-bold">Precio envío:</span> <span class="text-gray-600 dark:text-white text-base">$ {{ $order->delivery_price }}</span>
                        </small>
                        <br>
                        
                        <small >
                            <span class="text-base text-gray-600 dark:text-white font-bold">Entrega:</span> <span class="text-gray-60 dark:text-white0 text-base font-bold">{{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                        </small>
                    @else
                        <small class="flex">
                            <span class="text-base text-gray-600 dark:text-white font-bold">Retira:</span><span class="text-gray-600 dark:text-white text-base font-bold"> {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                        </small>
                        
                    @endif              
               
            </div>
            <p class="text-base text-gray-600 dark:text-white font-bold">Total: <span class="text-gray-600 dark:text-white text-base font-bold">${{$order->total}}</p><span>
                                 

        </div>
        
        @can('update',$order)
       
        <x-dropdown>
            <x-slot name="trigger">
                <button class="text-blue-600 font-bold text-xl"><i class="fa-solid fa-ellipsis"></i></button>
            </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('orders.show',$order)">
                    <span class="font-bold">{{__('Details')}}</span>
                </x-dropdown-link>
                <x-dropdown-link :href="route('orders.edit',$order)">
                    <span class="font-bold">{{__('Edit order')}}</span>
                </x-dropdown-link>
                {{-- <form action="{{route('orders.destroy',$order)}}" method="POST">
                    @csrf @method('DELETE')
                    <x-dropdown-link href="" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="font-bold">{{__('Delete order')}}</span>
                    </x-dropdown-link>
                </form> --}}
            </x-slot>
        </x-dropdown>
                   
        @endcan
    </div>
    
    
    @endforeach
    

   
</div>
@endcan