<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(product $product)
    {
        $products = product::all();
        return view('pages.back.products.products', compact('product', 'products'));
    }

    function create(Provider $provider)
    {
        $providers = Provider::all();
        return view('pages.back.products.products-create', compact('provider', 'providers'));
    }

    public function store(Request $request)
    {
        $providers = Provider::all();
        if ($providers->isEmpty()) {
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
            'provider_id.required' => 'Teikėjo laukelis yra privalomas',
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

            Storage::put("public/products/$fileName", $image);
            $incomingFields['img'] = "/storage/products/$fileName";
        }

        Product::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Product $product, Provider $provider)
    {
        $providers = Provider::all();
        return view('pages.back.products.products-edit', compact('product', 'providers', 'provider'));
    }

    function update(Request $request, Product $product)
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

            Storage::put("public/products/$fileName", $image);
            $incomingFields['img'] = "/storage/products/$fileName";

            $oldImage = $product->img;
            Storage::delete(str_replace("storage", "public/", $oldImage));
        }

        $product->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
