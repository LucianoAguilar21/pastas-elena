<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    
    <div class="py-5 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="javascript:history.back()" class="mb-4 text-white bg-cyan-500 rounded p-1"><i class="fa-solid fa-backward text-white m-2"></i>{{__('Back')}}</a>

                    <h2 class="text-gray-700 text-base font-bold">{{__('Edit order')}}</h2>
                    <h2 class="text-gray-500 text-base my-4">{{__('Order added by')}}: <span class="font-bold">{{$order->user->name}}</span></h2>

                    <form action="{{route('orders.update',$order)}}" method="POST">
                        @csrf @method('PUT')

                        <label class="block text-gray-700 text-sm font-bold dark:text-white" for="username">
                            {{__('Description')}}
                        </label>
                        <input required class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="{{__('Description')}}"
                         type="text" name="description" id="description" value="{{old('description',$order->description)}}">
                         <x-input-error :messages="$errors->get('description')"/>
            
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="username">
                            {{__('Customer')}}
                        </label>
                        <input required class=" w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="customer" type="text" placeholder="{{__('Customer')}}"
                         type="text" name="customer" id="customer" value="{{old('customer',$order->customer)}}">
                        <x-input-error :messages="$errors->get('customer')"/>
            
                        {{-- PAGO ? --}}
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="username">
                            {{__('¿Paid?')}}
                        </label>
                        @if (!$order->paid)
                            <div class="flex">
                                <div class="">
                                    <input type="radio" name="paid" id="inlineRadio1" value="1">
                                    <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio1">Si</label>
                                </div>
                                <div class="mx-5">
                                    <input checked type="radio" name="paid" id="inlineRadio2" value="0">
                                    <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio2" >No</label>
                                </div>
                            </div>
                        @else
                            <div class="flex">
                                <div class="">
                                    <input checked type="radio" name="paid" id="inlineRadio1" value="1">
                                    <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio1">Si</label>
                                </div>
                                <div class="mx-5">
                                    <input type="radio" name="paid" id="inlineRadio2" value="0">
                                    <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio2" >No</label>
                                </div>
                            </div>
                        @endif
                        <x-input-error :messages="$errors->get('paid')"/>
                        
                        <hr>
            
            
                        {{--DELIVERY--}}
                        
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="username">
                            {{__('¿With Delivery?')}}
                        </label>
            
                        @if ($order->delivery || ($errors->get('address') || $errors->get('delivery_price')))
                        <div class="flex">
                            <div class="">
                                <input class="" checked type="radio" name="delivery" id="inlineRadio3" value="true" onclick="enableAddress()">
                                <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio3">Si</label>
                            </div>
                            <div class="mx-5">
                                <input class="" type="radio" name="delivery" id="inlineRadio4" value="false" onclick="disableAddress()">
                                <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio4" >No</label>
                            </div>
                        </div>
                            
                        @else            
                        <div class="flex">
                            <div class="">
                                <input class="" type="radio" name="delivery" id="inlineRadio3" value="1" onclick="enableAddress()">
                                <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio3">Si</label>
                            </div>
                            <div class="mx-5">
                                <input class="" checked type="radio" name="delivery" id="inlineRadio4" value="0" onclick="disableAddress()">
                                <label class="text-gray-700 text-sm font-bold mb-2 dark:text-white" for="inlineRadio4" >No</label>
                            </div>
                        </div>
                        @endif
                        <x-input-error :messages="$errors->get('delivery')"/>
            
            
                        {{--DIRECCION--}}
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="addressInput" id="addressLabel">
                            {{__('Address')}}
                        </label>
                        <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                name="address" id="addressInput" type="text" placeholder="{{__('Address')}}:" value="{{old('address',$order->address)}}">
                        <x-input-error :messages="$errors->get('address')"/>
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="deliveryPrice" id="deliveryPriceLabel">
                            {{__('Delivery price')}}
                        </label>
                        <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:text-white"
                                name="delivery_price" id="deliveryPrice" min="1" type="number" placeholder="{{__('Delivery price')}}:"
                                value="{{old('delivery_price',$order->delivery_price)}}">
                        <x-input-error :messages="$errors->get('delivery_price')"/>
            
            
                        {{--FECHA DE ENTREGA--}}
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="delivery_date">
                            {{__('Delivery date')}}
                        </label>
                        <input required class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="datetime-local" name="delivery_date" id="delivery_date" 
                                value="{{ old('delivery_date',$order->delivery_date) ? \Carbon\Carbon::parse(old('delivery_date',$order->delivery_date))->format('Y-m-d\TH:i') : '' }}">
                        <x-input-error :messages="$errors->get('delivery_date')"/>
            
            
                        <label class="block text-gray-700 text-sm font-bold mt-2 dark:text-white" for="total">
                            {{__('Total')}} $
                        </label>
                        <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="total" required min="1" id="total" type="number" 
                                placeholder="{{__('Total')}}:" value="{{old('total',$order->total)}}">
                        <x-input-error :messages="$errors->get('total')"/>
            
                        <x-primary-button class="mt-4">{{__('Edit')}}</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    

        if(document.getElementById("addressInput").value.trim() !== '' ||
            document.getElementById("deliveryPrice").value.trim() !== ''     
        ){
            document.addEventListener('onload',enableAddress());
            document.getElementById('inlineRadio3').checked = true;
        }else{
            document.addEventListener('onload',disableAddress());
        }
    
        function enableAddress() {
            document.getElementById("addressInput").style.display = 'block';
            document.getElementById("deliveryPrice").style.display = 'block';
    
            document.getElementById("addressLabel").style.display = 'block';
            document.getElementById("deliveryPriceLabel").style.display = 'block';
    
            document.getElementById("addressInput").disabled = false;
            document.getElementById("deliveryPrice").disabled = false;
            document.getElementById('addressInput').setAttribute('required', 'required');
            document.getElementById('deliveryPrice').setAttribute('required', 'required');
        }
    
        function disableAddress() {
            document.getElementById("addressInput").style.display = 'none';
            document.getElementById("deliveryPrice").style.display = 'none';
    
            document.getElementById("addressLabel").style.display = 'none';
            document.getElementById("deliveryPriceLabel").style.display = 'none';
    
            document.getElementById("addressInput").disabled = true;
            document.getElementById("deliveryPrice").disabled = true;
            document.getElementById('addressInput').removeAttribute('required');
            document.getElementById('deliveryPrice').removeAttribute('required');
        }
    </script>
   
</x-app-layout>