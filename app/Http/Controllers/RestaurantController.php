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
                'address' => ['required'],
                'tel' => ['required'],
                'desc' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'address.required' => 'Adreso laukelis privalomas',
                'tel.required' => 'Telefono numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
            ]
        );

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
                'address' => ['required'],
                'tel' => ['required'],
                'desc' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'address.required' => 'Adreso laukelis privalomas',
                'tel.required' => 'Telefono numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
            ]
        );

        $restaurant->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
