<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index',['orders'=>Order::with('user')->orderByDesc('created_at')->paginate(10)]);
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

        $validated = $request->validate([
            'description' => ['required','min:3'],
            'customer' => ['required','min:3'],
            'paid'=> ['required','boolean'],
            'delivery'=>['required','boolean'],
            'address'=> ['nullable','min:4','max:255'],
            'delivery_price' =>['nullable','numeric','gt:0'],
            'delivery_date' =>['required','date','date_format:Y-m-d\TH:i','after_or_equal:today'],
            'total'=>['required','numeric','gt:0']
        ]);

        $request->user()->orders()->create($validated);

        return to_route('orders.index')
                ->with('status',__('¡Order created Successfully!'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
