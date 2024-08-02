<x-app-layout>
    @can('view',$order)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details') }} 
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('orders.index') }}" class="mb-4 text-white bg-cyan-700 rounded p-2">{{__('Back')}}</a>

                    <h2 class="text-gray-700 dark:text-white text-base font-bold my-4">{{__('Order details')}}</h2>
                    <h2 class="text-gray-500 dark:text-white text-base my-1">{{__('Order added by')}}: <span class="font-bold">{{$order->user->name}}</span></h2>
                    <h2 class="text-gray-500 dark:text-white text-base my-1">Agreado: {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('dddd D [de] MMMM [a las] H:mm') }}</h2>

                    <div class=" my-4 pb-1">
                        @switch($order->status)
                            @case("new")
                            <span class="text-white rounded-full bg-[#daf204] uppercase px-1 py-1 text-sm font-bold status-btn" data-status="new">{{__($order->status)}}</span>
                                @break

                            @case("in_process")
                            <span class="text-gray-100 rounded-full bg-blue-500 uppercase px-1 py-1 text-sm font-bold status-btn" data-status="in_process">{{__($order->status)}}</span>
                                @break

                            @case("finished")
                                <span class="text-gray-100 rounded-full bg-[#09456c] uppercase px-1 py-1 text-sm font-bold status-btn" data-status="finished">{{__($order->status)}}</span>
                                @break
                            
                            @case("delivered")
                                <span class="text-gray-100 rounded-full bg-[#1ca39e] uppercase px-1 py-1 text-sm font-bold status-btn" data-status="delivered">{{__($order->status)}}</span>
                                @break
                        @endswitch



                    
                        @if ($order->paid)
                            <span class="rounded-full bg-green-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold f">{{__('Paid')}}</span>
                            
                        @else
                            <span class="rounded-full bg-red-500 text-gray-100 uppercase px-1 py-1 text-sm font-bold ">No {{__('Paid')}}</span>
                        @endif
                        @if ($order->delivery)    
                            <span class="text-center rounded-full bg-orange-500 text-white uppercase p-1 text-sm font-bold  f">{{__('With delivery')}}</span>

                        @else
                            <span class="rounded-full bg-gray-600 text-white uppercase px-1 py-1 text-sm font-bold f">{{__('Withdraw')}}</span>
                        @endif
                        <br>

                        
                       
                        @unless($order->created_at->eq($order->updated_at))
                            <small class="text-sm text-gray-600 dark:text-gray-400 mb-1"> &middot; {{ __('Edited') }}</small>
                           
                        @endunless
                        
                        <p class="text-xl text-gray-600 dark:text-white font-bold">
                            {{$order->customer}}
                        </p>
                        
                        <p class=" text-lg text-gray-900 dark:text-white text-left">{{ $order->description }}</p>   

                        <hr>
                        @if ($order->delivery)
                            <small >
                                <span class="text-base text-gray-600 dark:text-white font-bold">Direccion:</span><span class="text-gray-600 dark:text-white text-base"> {{ $order->address }} </span>
                            </small>
                            <br>
                            
                            <small >
                                <span class="text-base text-gray-600 dark:text-white font-bold">Precio envío:</span> $ <span class="text-gray-600 dark:text-white text-base">{{ $order->delivery_price }}</span>
                            </small>
                            <br>
                            
                            <small >
                                <span class="text-base text-gray-600 dark:text-white font-bold">Entrega:</span> <span class="text-gray-600 dark:text-white text-base font-bold">{{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                            </small>
                        @else
                            <small >
                                <span class="text-base text-gray-600 dark:text-white font-bold">Retira:</span>  <span class="text-gray-600 dark:text-white text-base font-bold"> {{ \Carbon\Carbon::parse($order->delivery_date)->isoFormat('dddd D [de] MMMM [a las] H:mm [hs]') }}</span>
                            </small>
                            
                        @endif   
                        


                        <p class="text-base text-gray-600 dark:text-white font-bold">Total: <span class="text-gray-600 dark:text-white text-base font-bold">${{$order->total}}</p><span>
                        
                                               
                        
                        <form action="{{route('orders.changeStatus',$order)}}" method="POST" class="my-7">
                            @csrf @method('PUT')
                            <label class="block uppercase tracking-wide text-gray-700 dark:text-white text-xs font-bold mt-3" for="grid-state">
                                {{__('Change status')}}:
                            </label>
                            
                            <div class="flex">
                                <select name="status" class="block appearance-none w-36 bg-white  border-gray-200 text-gray-700 py-1 px-2 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                    <option value="new" class="hover:bg-red-200">Nuevo</option>
                                    <option value="in_process">En proceso</option>
                                    <option value="finished">Terminado</option>
                                    <option value="delivered">Entregado</option>
                                </select>
                                <button class="mx-2 p-2 rounded bg-gray-800 text-white dark:bg-gray-600">{{__('Change')}}</button>
                            </div>
                        </form>

                        <div class="flex float-right m-2">
                            <a href="{{route('orders.edit',$order)}}" class="bg-blue-700 hover:bg-blue-900 text-white text-sm font-bold p-1 rounded mx-1" id="loadOrdersBtn">{{__('Edit')}}</a>
                            {{-- <form action="{{route('orders.destroy',$order)}}" method="POST">
                                @csrf @method('DELETE')
                                <button class="bg-red-800 hover:bg-red-900 text-white text-sm font-bold p-1 rounded" id="loadOrdersBtn">{{__('Delete')}}</button>
                            </form> --}}

                            <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-order-deletion')"
                            >{{ __('Delete') }}</x-danger-button>


                            <x-modal name="confirm-order-deletion"  focusable>
                                <form method="post" action="{{route('orders.destroy',$order)}}" class="p-6">
                                    @csrf
                                    @method('delete')
                        
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 uppercase">
                                        {{ __('¿Are you sure you want to delete this order?') }}
                                    </h2>
                        
                                    {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                    </p> --}}
                        
                                    <div class="mt-6">                    
                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>
                        
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                        
                                        <x-danger-button class="ms-3">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t px-6 mt-2">
                <h2 class="text-xl pt-3 mb-3 border-b dark:text-gray-100 border-b-gray-200">{{__('comments')}}</h2>
                <form action="{{route("comment.store",$order)}}" method="POST" class="mb-3">
                    @csrf
                    {{-- <input type="hidden" name="order_id" value="{{ $order->id }}"> --}}
                    <textarea name="comment" id="" cols="30" rows="2" class="w-full border-gray-300" placeholder="{{__('comment')}}...">{{old('comment')}}</textarea>
                    <x-input-error :messages="$errors->get('comment')"/>
                    <button class="float-right mx-2 p-1 bg-blue-600 rounded text-white font-bold">{{__('Add')}}</button>
                </form>
                <br>
                <hr>
                
                @if (count($comments) > 0)
                @foreach ($comments as $comment)
                    <div class="border-t border-b rounded mb-3 text-gray-400 dark:text-gray-100">                        
                        <p class="px-2 text-sm">{{$comment->user->name}}:</p>
                        <p class="text-gray-600 dark:text-gray-200 px-2"> {{$comment->comment}}</p>
                        <p class="px-2 text-[10px]">{{$comment->created_at}}</p>                        
                        
                    </div>
                @endforeach
                @else
                    <p class="text-base">{{__('No comments yet')}}</p>
                @endif
            
                
            </div>
        </div>
    </div>                           
    @endcan
</x-app-layout>