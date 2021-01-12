<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->menu_id) && $request->menu_id !== 0)
        $restaurants = \App\Models\Restaurant::where('menu_id', $request->menu_id)->orderBy('title')->get();
    else
        $restaurants = \App\Models\Restaurant::orderBy('title')->get();
    $menus = \App\Models\Menu::orderBy('price')->get();
    return view('restaurants.index', ['restaurants' => $restaurants, 'menus' => $menus]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = \App\Models\Menu::orderBy('title')->get();
        return view('restaurants.create', ['menus' => $menus]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        // can be used for seeing the insides of the incoming request
        // dd($request->all());;
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('restaurant_created_message', 'Naujas restoranas sukurtas!');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = \App\Models\Menu::orderBy('title')->get();
        return view('restaurants.edit', ['restaurant' => $restaurant, 'menus' => $menus]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->fill($request->all());
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('restaurant_updated_message', 'Restorano informacija buvo pakeista!');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Request $request)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index', ['menu_id'=> $request->input('mneu_id')])->with('restaurant_deleted_message', 'Restoranas buvo ištrintas!');;

    }
}
