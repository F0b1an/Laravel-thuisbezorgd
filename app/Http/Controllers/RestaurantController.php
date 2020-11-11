<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Restaurant;
use App\Consumables;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::get();

        return view('home')
            ->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', , 'max:255'],
        //     'opens_at' => ['required'],
        //     'closes_at' => ['required'],
        // ]);
        //dd($request);
        $restaurant = new restaurant([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'opens_at' => $request->get('opens_at'),
            'closes_at' => $request->get('closes_at'),
            'address' => $request->get('address'),
            'zip_code' => $request->get('zip_code'),
        ]);

        $restaurant->save();

        return redirect(route('restaurant.index'))->with('success', 'restaurant has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::where('id', $id)->firstOrFail();

        return view('restaurant')
            ->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return view('admin.restaurant.edit')
                ->with('restaurant', $restaurant);
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
