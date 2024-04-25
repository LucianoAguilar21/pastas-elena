<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') . ': '. $user->name }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <a href="javascript:history.back()" class="mb-4 text-white bg-cyan-500 rounded p-1"><i class="fa-solid fa-backward text-white m-2"></i>{{__('Back')}}</a>

        <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Email')}} </span>: {{$user->email}} </p>
        <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Role')}} </span> : {{$user->role}} </p>
        <p class="text-gray-700 p-1"> <span class="font-bold">{{__('Permissions')}} </span>{{$user->permissions ? 'Si' : 'No'}} </p>
    </div>

    @if ($user->role !== 'admin')                                                                            
    @if ($user->permissions == false)
    <form class="" action="{{ route('admin.user.update',  $user) }}" method="POST">
        @csrf @method('PUT')
        <button class="rounded bg-blue-400 mx-3 p-1" type="submit">{{__('Grant permissions')}}</button>
    </form>    
    @endif
    @if (!$user->role == 'admin' || $user->permissions == true)
    <form class="" action="{{ route('admin.user.remove',  $user) }}" method="POST">
        @csrf @method('PUT')
        <button class="rounded bg-red-400 mx-3 p-1" type="submit">{{__('Remove permissions')}}</button>
    </form> 
    @endif
    @endif

    
</x-app-layout>