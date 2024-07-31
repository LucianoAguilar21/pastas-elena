@can('viewAny',App\Models\Order::class)
<div class="mt-6 bg-white dark:bg-white shadow-sm rounded-lg divide-y dark:divide-gray-900">
    <div >
        {{$orders->links("vendor.pagination.tailwind")}}
    </div>
    @foreach ($orders as $order)

    <div class="py-6 flex space-x-2 dark:bg-white">
        <div class="w-full">
            <div class="">
                    @switch($order->status)
                        @case("new")
                        <span class="text-white rounded-full bg-teal-600 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break
                    
                        @case("in_process")
                        <span class="text-gray-100 rounded-full bg-blue-700 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break

                        @case("finished")
                            <span class="text-gray-100 rounded-full bg-lime-950 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break
                        
                        @case("delivered")
                            <span class="text-gray-100 rounded-full bg-green-800 uppercase px-1 py-1 text-sm font-bold ">{{__($order->status)}}</span>
                            @break

                    @endswitch



                    
                    @if ($order->paid)
                        <span class="rounded-full bg-green-600 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">{{__('Paid')}}</span>
                        
                    @else
                        <span class="rounded-full bg-red-800 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">No {{__('Paid')}}</span>
                    @endif
                    @if ($order->delivery)    
                        <span class="text-center rounded-full bg-yellow-500 text-white uppercase p-1 text-sm font-bold  f">{{__('With delivery')}}</span>

                    @else
                        <span class="rounded-full bg-gray-400 text-white uppercase px-1 py-1 text-sm font-bold f">{{__('Without delivery')}}</span>
                    @endif

                    <br>
                    @unless($order->created_at->eq($order->updated_at))
                        <small class="text-sm text-gray-600 dark:text-gray-400 mt-2"> &middot; {{ __('Edited') }}</small>
                        <br>
                    @endunless
                  
                    <p class="text-xl py-3 text-gray-600 dark:text-gray-800 font-bold">
                        {{$order->customer}}
                    </p>
                  
                    @if ($order->delivery)
                        <small >
                            <span class="text-base text-gray-600 dark:text-gray-400 font-bold">Direccion:</span><span class="text-gray-600 text-base"> {{ $order->address }} </span>
                        </small>
                        <br>
                        
                        <small >
                            <span class="text-base text-gray-600 dark:text-gray-400 font-bold">Precio envío:</span> $ <span class="text-gray-600 text-base">{{ $order->delivery_price }}</span>
                        </small>
                        <br>
                        
                        <small >
                            <span class="text-base text-gray-600 dark:text-gray-400 font-bold">Entrega:</span> <span class="text-gray-600 text-base">{{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}</span>
                        </small>
                    @else
                        <small >
                            <span class="text-base text-gray-600 dark:text-gray-400 font-bold">Retira:</span>  <span class="text-gray-600 text-base"> {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}</span>
                        </small>
                        
                    @endif              
               
            </div>
            <p class="text-base text-gray-600 dark:text-gray-400 font-bold">Total: <span class="text-gray-600 text-base">${{$order->total}}</p><span>
            <p class="mt-4 text-lg text-gray-900 dark:text-gray-800 text-left">{{ $order->description }}</p>                        

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
                <form action="{{route('orders.destroy',$order)}}" method="POST">
                    @csrf @method('DELETE')
                    <x-dropdown-link href="" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="font-bold">{{__('Delete order')}}</span>
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
                   
        @endcan
    </div>
    
    
    @endforeach
    

   
</div>
@endcan