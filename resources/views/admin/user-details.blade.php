<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') . ': '. $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="javascript:history.back()" class="mb-4 text-white bg-cyan-500 rounded p-1"><i class="fa-solid fa-backward text-white m-2"></i>{{__('Back')}}</a>

                    <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Email')}} </span>: {{$user->email}} </p>
                    <div class="flex">
                        <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Role')}} </span> : {{$user->role}} </p>

                        @if( auth()->user()->role =='super-admin' && $user->role !== 'super-admin' && !auth()->user()->is($user))
                                                 
                            <form action="{{ route('admin.user.toAdmin',  $user) }}" method="POST">
                                @csrf  @method('PUT')
                                <select name="role" id="" class=" appearance-none w-36 bg-gray-200 border border-gray-200 text-gray-700 py-1 px-2 pr-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="{{$user->role == 'admin' ? 'user' : 'admin'}}">{{$user->role == 'admin' ? 'user' : 'admin'}}</option>                                    
                                </select>              
                                <button>{{__('Change')}}</button>              
                            </form>
                            
                        @endif

                    </div>
                    <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Permissions')}} </span>{{$user->permissions ? 'Si' : 'No'}} </p>
                </div>

                {{-- @can('update',$user) --}}
                @if ($user->role !== 'super-admin' && !auth()->user()->is($user))
                    @if ($user->permissions == false)
                    <form class="" action="{{ route('admin.user.update',  $user) }}" method="POST">
                        @csrf @method('PUT')
                        <button class="rounded bg-green-500 m-3 p-1  text-white font-bold" type="submit">{{__('Grant permissions')}}</button>
                    </form>    
                    @endif
                        @if ( $user->permissions == true)
                        <form class="" action="{{ route('admin.user.remove',  $user) }}" method="POST">
                            @csrf @method('PUT')
                            <button class="rounded bg-blue-400 m-3 p-1  text-white font-bold" type="submit">{{__('Remove permissions')}}</button>
                        </form> 
                        @endif
                    @endif
                {{-- @endcan --}}

                @if(auth()->user()->role == 'super-admin' && $user->role != 'super-admin')
                    <form class="" action="{{ route('admin.user.destroy',  $user) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="rounded bg-red-600 m-3 p-1 text-white font-bold" type="submit">{{__('Delete user')}}</button>
                    </form> 
                @endif
                
            </div>
        </div>
    </div>

    
</x-app-layout>