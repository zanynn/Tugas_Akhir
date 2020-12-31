<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\User;
use PDF;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order', compact('orders'));
        // return view('admin.order_show', compact('orders'));
    }
    public function show($id)
    {
        $orders = Order::find($id);
        $users = User::where('id', $orders->user_id)->first();
        $carts = Cart::all();
        return view('admin.order_show', compact('orders', 'carts', 'users'));
    }
    public function cetak_pdf()
    {
        $orders = Order::all();
        $pdf = PDF::loadview('admin.order_pdf', ['orders' => $orders]);
        return $pdf->stream();
    }
}
