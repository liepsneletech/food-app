<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.restaurants.restaurants', compact('restaurants', 'restaurant'));
    }

    function create()
    {
        $menus = Menu::all();
        return view('pages.back.restaurants.restaurants-create', compact('menus'));
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
                'menu_id.required' => 'Aprašymo laukelis privalomas',
            ]
        );

        if ($request->file('img')) {

            $image = $request->file('img');

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '-' . uniqid() . '.jpg';

            $image = Image::make($image)->resize(1600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(1600, 960)->encode('jpg');

            Storage::put("public/meals/$fileName", $image);
            $incomingFields['img'] = "/storage/meals/$fileName";
        }

        Restaurant::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Restaurant $restaurant, Meal $meal)
    {
        $restaurants = Restaurant::all();
        $menus = Menu::all();
        return view('pages.back.restaurants.restaurants-edit', compact('restaurant', 'menus', 'meal'));
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
                'menu_id.required' => 'Aprašymo laukelis privalomas',
            ]
        );

        if ($request->file('img')) {

            $image = $request->file('img');

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '-' . uniqid() . '.jpg';

            $image = Image::make($image)->resize(1600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(1600, 960)->encode('jpg');

            Storage::put("public/meals/$fileName", $image);
            $incomingFields['img'] = "/storage/meals/$fileName";
        }

        $restaurant->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
