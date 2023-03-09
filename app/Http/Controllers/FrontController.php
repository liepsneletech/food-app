<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role == User::ROLES['admin']) {
                return redirect()->route('admin-dashboard');
            }
        }

        return redirect()->route('home');
    }

    public function home()
    {
        return view('pages.front.home');
    }

    public function providers(Provider $provider)
    {
        $providers = Provider::all();
        return view('pages.front.providers', compact('providers', 'provider'));
    }

    public function products(Request $request, product $product, Provider $provider)
    {
        if (!$request->s) {
            if ($request->provider_id && $request->provider_id != 'Pasirinkite teikėją') {
                $products = Product::where('provider_id', $request->provider_id)->get();
            } else {
                $products = Product::where('provider_id', '>', '0')->get();
            }

            $products = match ($request->sort ?? '') {
                'asc_price' => $products->sortBy('price'),
                'dsc_price' => $products->sortByDesc('price'),
                default => $products,
            };
        } else {
            $products = Product::search($request->s)->get();
        }

        $sortSelect = Product::SORT;
        $sortShow = isset(Product::SORT[$request->sort]) ? $request->sort : '';

        $providers = Provider::all();
        $providerShow = $request->provider_id ? $request->provider_id : '';

        $searchTerm = $request->s;

        return view('pages.front.products', compact('product', 'products', 'provider', 'providers', 'providerShow', 'sortSelect', 'sortShow', 'searchTerm'));
    }

    public function search($searchTerm)
    {
        $products = Product::search($searchTerm)->get();
        return $products;
    }

    public function singleProduct(Product $product, Provider $provider)
    {
        $providers = Provider::all();
        $products = Product::all();

        return view('pages.front.single-product', compact('product', 'products', 'provider', 'providers'));
    }

    public function checkout(Product $product, Provider $provider)
    {
        $products = Product::all();
        $providers = Provider::all();

        return view('pages.front.checkout', compact('product', 'products', 'provider', 'providers'));
    }

    public function makeOrder(Request $request, Order $order, Product $product)
    {
        $incomingFields = $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required'],
        ], [
            'name.required' => 'Vardo laukelis yra privalomas',
            'surname.required' => 'Pavardės laukelis yra privalomas',
            'email.required' => 'El. pašto laukelis yra privalomas',
        ]);

        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email = $request->email;
        $incomingFields['user_id'] = Auth::user()->id;
        $incomingFields['product_id'] = $product->id;

        Order::create($incomingFields);

        return redirect()->route('order-success');
    }

    public function orderSuccess()
    {
        return view('pages.front.order-success');
    }

    public function userOrders()
    {
        $user_id = Auth::user()->id;

        $orders = Order::where('user_id', '=', $user_id)->get();

        return view('pages.front.orders', compact('orders', 'user_id'));
    }

    public function makeReview(Request $request, Product $product, Review $review)
    {
        $incomingFields = $request->validate([
            'reviewer' => ['required'],
            'rate' => ['required'],
        ], [
            'reviewer.required' => 'Vardo laukelis yra privalomas',
            'rate.required' => 'Įvertinimo laukelis yra privalomas',
        ]);

        $review->reviewer = $request->reviewer;
        $review->rate = $request->rate;
        $review->review_text = $request->review_text;
        $incomingFields['product_id'] = $product->id;
        // $incomingFields['user_id'] = Auth::user()->id;

        Review::create($incomingFields);

        return redirect()->route('make-review');
    }
}
