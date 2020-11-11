<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

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

        return view('admin.restaurant.index')
            ->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new restaurant([
            'user_id' => $request->get('user_id'),
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

        return view('admin.restaurant.show')
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
        $restaurant = Restaurant::find($id);
        $restaurant->title = $request->get('title');
        $restaurant->description = $request->get('description');
        $restaurant->password = bcrypt($request->get('password'));
        $restaurant->admin = ($request->admin) ? 0 : 1;
        $restaurant->save();

        return redirect(route('users.index'))->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(route('users.index'))->with('success', 'user has been deleted Successfully');
    }
}
