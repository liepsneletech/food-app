<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pages.back.menus.menus', compact('menus'));
    }

    function create()
    {
        return view('pages.back.menus.menus-create');
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
            ]
        );

        Menu::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('pages.back.menus.menus-edit', compact('menu'));
    }

    function update(Request $request, Menu $menu)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
            ]
        );

        $menu->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
