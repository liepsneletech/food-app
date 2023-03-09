<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    public function index(Meal $meal)
    {
        $meals = Meal::all();
        return view('pages.back.meals.meals', compact('meal', 'meals'));
    }

    function create(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.meals.meals-create', compact('restaurant', 'restaurants'));
    }

    public function store(Request $request)
    {
        $restaurants = Restaurant::all();
        if ($restaurants->isEmpty()) {
            redirect()->back()->with('error', 'Negalima pridėti produktų, jei nėra pridėtų teikėjų.');
        }

        $incomingFields = $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'provider_id' => ['required'],
            'img' => ['image', 'max:3000'],
            'price' => ['required'],
        ], [
            'title.required' => 'Pavadinimo laukelis yra privalomas',
            'desc.required' => 'Aprašymo laukelis yra privalomas',
            'provider_id.required' => 'Restorano laukelis yra privalomas',
            'img.image' => 'Netinkamas nuotraukos formatas',
            'img.max' => 'Nuotraukos dydis viršija 3MB.',
            'price.required' => 'Kainos laukelis yra būtinas.',
        ]);

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

        Meal::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Meal $meal, Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('pages.back.meals.meals-edit', compact('meal', 'restaurants', 'provider'));
    }

    function update(Request $request, Meal $meal)
    {
        $incomingFields = $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'provider_id' => ['required'],
            'img' => ['image', 'max:3000'],
            'price' => ['required'],
        ], [
            'title.required' => 'Pavadinimo laukelis yra privalomas',
            'desc.required' => 'Aprašymo laukelis yra privalomas',
            'provider_id.required' => 'Šis laukelis yra privalomas',
            'img.image' => 'Netinkamas nuotraukos formatas',
            'img.max' => 'Nuotraukos dydis viršija 3MB.',
            'price.required' => 'Kainos laukelis yra būtinas.',
        ]);

        if ($request->file('img')) {

            $image = $request->file('img');

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '-' . uniqid() . '.jpg';

            $image = Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 300)->encode('jpg');

            Storage::put("public/meals/$fileName", $image);
            $incomingFields['img'] = "/storage/meals/$fileName";

            $oldImage = $meal->img;
            Storage::delete(str_replace("storage", "public/", $oldImage));
        }

        $meal->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Meal $meal)
    {
        $meal->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
