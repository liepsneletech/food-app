<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function index()
  {
    $user_id = Auth::user()->id;

    $orders = Order::all();

    return view('pages.back.orders.orders', compact('orders', 'user_id'));
  }

  public function orderConfirm(Order $order)
  {
    $order->status = 1;
    $order->save();

    return redirect()->back();
  }

  public function orderCancel(Order $order)
  {
    $order->status = 2;
    $order->save();

    return redirect()->back();
  }

  public function orderDelete(Order $order)
  {
    if ($order->status == 0) {
      return redirect()->back()->with('not', 'Jūs negalite ištrinti nebaigto užsakymo.');
    }
    $order->delete();
    return redirect()->back();
  }
}
