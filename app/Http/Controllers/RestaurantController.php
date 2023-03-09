<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.restaurants.restaurants', compact('restaurants', 'restaurant'));
    }

    function create()
    {
        return view('pages.back.restaurants.restaurants-create');
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
                'code' => ['required'],
                'address' => ['required'],
                'desc' => ['required'],
                'menu_id' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'code.required' => 'Kodo laukelis privalomas',
                'address.required' => 'Adreso numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
                'menu_id.required' => 'Būtina pasirinkti valgiaraštį',
            ]
        );

        $incomingFields['menu_id'] = 1;
        Restaurant::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.restaurants.restaurants-edit', compact('restaurant'));
    }

    function update(Request $request, Restaurant $restaurant)
    {
        $incomingFields = $request->validate(
            [
                'title' => ['required'],
                'code' => ['required'],
                'address' => ['required'],
                'desc' => ['required'],
                'menu_id' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'code.required' => 'Kodo laukelis privalomas',
                'address.required' => 'Adreso numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
                'menu_id.required' => 'Būtina pasirinkti valgiaraštį',
            ]
        );

        $incomingFields['menu_id'] = 1;
        $restaurant->update($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
