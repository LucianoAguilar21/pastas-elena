<x-app-layout>
    @if (auth()->user()->role ==='admin')
        
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold mb-2">{{ __("Panel de administrador") }}</h2>
                    <hr>

                    

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mb-3 border-b">
                            <tr>
                                <th scope="col" class="p-2 border-r">{{__('User')}}</th>                                
                                <th scope="col" class="p-2 border-r">{{__('Permissions')}}</th>
                                <th scope="col" class="p-2 border-r">{{__('Role')}}</th>
                                <th scope="col" class="p-2 border-r">{{__('Actions')}}</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)        
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="p-1 text-center border-r">{{$user->name}}</td>                                    
                                    <td class="p-1 text-center border-r">{{$user->permissions ? 'Si' : 'No'}}</td>                                    
                                    <td class="p-1 text-center border-r">{{$user->role}}</td>                                    
                                    <td class="p-1 border-r text-center">
                                       <a href="{{route('admin.user.show',$user)}}" class="text-xl text-blue-500 font-bold"> <i class="fa-solid fa-user-gear"></i></a>
                                       
                                    </td>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
