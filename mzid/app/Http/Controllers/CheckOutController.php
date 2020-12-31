<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $province = DB::table('provinces')->get();
        $user_login = User::where('id', Auth::id())->first();
        return view('checkout.index', compact('province', 'user_login'));
    }
    public function submitcheckout(Request $request)
    {
        $this->validate($request, [
            'billing_name' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_pincode' => 'required',
            'billing_mobile' => 'required',
            'shipping_name' => 'required',
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            'shipping_pincode' => 'required',
            'shipping_mobile' => 'required',
        ]);
        $input_data = $request->all();
        $count_shippingaddress = DB::table('delivery_address')->where('user_id', Auth::id())->count();
        if ($count_shippingaddress == 1) {
            DB::table('delivery_address')->where('user_id', Auth::id())->update([
                'name' => $input_data['shipping_name'],
                'address' => $input_data['shipping_address'],
                'city' => $input_data['shipping_city'],
                'province' => $input_data['shipping_province'],
                'pincode' => $input_data['shipping_pincode'],
                'mobile' => $input_data['shipping_mobile']
            ]);
        } else {
            DB::table('delivery_address')->insert([
                'user_id' => Auth::id(),
                'user_email' => Session::get('frontSession'),
                'name' => $input_data['shipping_name'],
                'address' => $input_data['shipping_address'],
                'city' => $input_data['shipping_city'],
                'province' => $input_data['shipping_province'],
                'pincode' => $input_data['shipping_pincode'],
                'mobile' => $input_data['shipping_mobile'],
            ]);
        }
        DB::table('users')->where('id', Auth::id())->update([
            'name' => $input_data['billing_name'],
            'address' => $input_data['billing_address'],
            'city' => $input_data['billing_city'],
            'province' => $input_data['billing_province'],
            'pincode' => $input_data['billing_pincode'],
            'mobile' => $input_data['billing_mobile']
        ]);
        return redirect('/order-review');
    }
}
