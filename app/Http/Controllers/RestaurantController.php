<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
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
                'img' => ['image'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'code.required' => 'Kodo laukelis privalomas',
                'address.required' => 'Adreso numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
                'img.image' => 'Netinkamas nuotraukos formatas',
            ]
        );

        if ($request->file('img')) {

            $image = $request->file('img');

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '-' . uniqid() . '.jpg';

            $image = Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 300)->encode('jpg');

            Storage::put("public/meals/$fileName", $image);
            $incomingFields['img'] = "/storage/meals/$fileName";
        }

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
                'code' => ['required', 'max:9'],
                'address' => ['required'],
                'desc' => ['required'],
            ],
            [
                'title.required' => 'Pavadinimo laukelis privalomas',
                'code.required' => 'Kodo laukelis privalomas',
                'max.required' => 'Kodas per ilgas',
                'address.required' => 'Adreso numerio laukelis privalomas',
                'desc.required' => 'Aprašymo laukelis privalomas',
            ]
        );

        if ($request->file('img')) {

            $image = $request->file('img');

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '-' . uniqid() . '.jpg';

            $image = Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 300)->encode('jpg');

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
