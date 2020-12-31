<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index()
    {
        // $menu_active = 3;
        // $i = 0;
        $totalproduct = Product::count();
        $totaluser = User::count();
        $totalorder = Order::count();
        $profit = DB::table('orders')->sum('grand_total');
        $ordersPrecentage = Order::count() / 10 * 100;
        $orders = Order::orderBy('created_at', 'desc')->limit(4)->get();
        // return view('admin.product', compact('menu_active', 'products', 'i'));
        return view('admin.home_dashboard', compact('totalproduct', 'totaluser', 'totalorder', 'ordersPrecentage', 'profit', 'orders'));
    }





    /*public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                echo 'success'; die();
            }else{
                return redirect('admin')->with('message','Account is Incorrect!');
            }
        }else{
            return view('backEnd.login');
        }
    }*/
}
