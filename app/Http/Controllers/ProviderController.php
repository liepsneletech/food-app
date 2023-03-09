<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index(Provider $provider)
    {
        $providers = Provider::all();
        return view('pages.back.providers.providers', compact('providers', 'provider'));
    }

    function create()
    {
        return view('pages.back.providers.providers-create');
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

        Provider::create($incomingFields);

        return redirect()->back()->with('success', 'Pridėjimas sėkmingas.');
    }

    function edit(Provider $provider)
    {
        $providers = Provider::all();
        return view('pages.back.providers.providers-edit', compact('provider'));
    }

    function update(Request $request, Provider $provider)
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

        $provider->update($incomingFields);

        return redirect()->back()->with('success', 'Atnaujinimas sėkmingas.');
    }

    function delete(Provider $provider)
    {
        $provider->delete();
        return redirect()->back()->with('success', 'Ištrynimas sėkmingas');
    }
}
