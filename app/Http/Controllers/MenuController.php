<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Menu $menu)
    {
        $menus = Menu::all();
        return view('pages.back.menus.menus', compact('menu', 'menus'));
    }

    function create(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.menus.menus-create', compact('restaurant', 'restaurants'));
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required'],
        ], [
            'title.required' => 'Pavadinimo laukelis yra privalomas',
        ]);

        Menu::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Menu $menu, Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.menus.menus-edit', compact('menu', 'restaurants', 'provider'));
    }

    function update(Request $request, Menu $menu)
    {
        $incomingFields = $request->validate([
            'title' => ['required'],
        ], [
            'title.required' => 'Pavadinimo laukelis yra privalomas',
        ]);

        $menu->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
