<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menus.index', ['menus' => Menu::orderBy('price')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'weight' => 'required|gt:meat'
        
        ]);
        $menu = new Menu();
        // can be used for seeing the insides of the incoming request
            // dd($request->all()); die();
           $menu->fill($request->all());
           $menu->save();
           return redirect()->route('menu.index')->with('menu_created_message', 'Naujas patiekalas sukurtas!');;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validateData = $request->validate([
            'weight' => 'required|gt:meat'
        
        ]);
        $menu->fill($request->all());
        $menu->save();
        return redirect()->route('menu.index')->with('menu_updated_message', 'Patiekalo informacija buvo pakeista!');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if (count($menu->restaurants)){ 
            return back()->withErrors(['error' => ['Can\'t delete country with cities assigned, please unassign cities first!']]);
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('menu_deleted_message', 'Patiekalas buvo ištrintas!');;

    }
}
