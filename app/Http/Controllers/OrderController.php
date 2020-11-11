<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumable;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id);

        return view('order.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(session()->get('cart'));
        $order = new Order([
            // foreach (session()->get('cart') as $id => $consumable) {
            //     $consumable = Consumable::where('id', $id);

            //     $order->consumable => $consumable,

            //     $order->save();
            // }
            'user_id' => Auth::user()->id,
            'address' => 'test',
            'zip_code' => 'fawmkw',
            'restaurant_id' => 1,
            // 'category' => $request->get('category'),
            
        ]);

        foreach (session()->get('cart') as $id => $consumable) {
            $order->attach(['consumable_id' => $id, 'order_id' => $order->id]);
        }


        $order->save();

        foreach (session()->get('cart') as $id => $consumable) {
            $order->attach(['consumable_id' => $id, 'order_id' => $order->id]);
        }

        dd($order);

        return redirect(route('restaurant.show', $request->restaurant_id))->with('success', 'product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
