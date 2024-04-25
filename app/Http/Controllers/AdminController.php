<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard',[
            'users'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user-details',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->permissions = true;
        $user->save();
        return to_route('dashboard')->with('status',__('Permissions added successfully'));
    }

    public function toAdmin(User $user)
    {
        $user->role == 'user' ?  $user->role ='admin':  $user->role ='user';
        $user->save();
        return to_route('dashboard')->with('status',__('Role changed successfully'));
    }

    public function remove(Request $request, User $user)
    {
     
    }
    public function removePermissions(Request $request, User $user)
    {
        $user->permissions = false;
        $user->save();
        return to_route('dashboard')->with('status',__('Permissions removed successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('dashboard')->with('status',__('User deleted successfully'));
    }
}
