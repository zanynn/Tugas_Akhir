<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart::where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }
        $shipping_address = DB::table('delivery_address')->where('user_id', Auth::id())->first();
        return view('checkout.review_order', compact('shipping_address', 'cart_datas', 'total_price'));
    }
    public function order(Request $request)
    {
        $input_data = $request->all();
        $payment_method = $input_data['payment_method'];
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }
        $input_data['session_id'] = $session_id;
        Order::create($input_data);
        if ($payment_method == "COD") {
            return redirect('/cod');
        } else {
            return redirect('/bank');
        }
    }
    public function cod()
    {
        $user_order = Order::where('user_id', Auth::id())->first();
        return view('payment.cod', compact('user_order'));
    }
    public function bank(Request $request)
    {
        $who_buying = Order::where('user_id', Auth::id())->first();
        return view('payment.bank', compact('who_buying'));
    }
    public function prosesBank(Request $request)
    {
        $payment = new Order();
        $payment->order_status = $request->order_status;
        $payment->user_id = $request->user_id;
        $payment->session_id = $request->session_id;
        $payment->user_email = $request->user_email;
        $payment->name = $request->name;
        $payment->address = $request->address;
        $payment->city = $request->city;
        $payment->pincode = $request->pincode;
        $payment->province = $request->province;
        $payment->mobile = $request->mobile;
        $payment->coupon_code = $request->coupon_code;
        $payment->coupon_amount = $request->coupon_amount;
        $payment->payment_method = $request->payment_method;
        $payment->grand_total = $request->grand_total;

        if ($payment->image_poof && file_exists(storage_path('app/public/' . $payment->image_poof))) {
            \Storage::delete('public' . $payment->image_poof);
        }
        $payment_image = $request->file('image_poof')->store('images', 'public');
        $payment->image_poof = $payment_image;
        if (isset($payment->image_poof)) {
            $payment->order_status = "paid";
        } else {
            $payment->order_status = "failed";
        }
        // $payment['status'] = "Sukses";
        $payment->save();
        Alert::success('Terimakasih', 'Telah berbelanja di MZ.ID');
        return redirect('/');
    }
    public function prosesCod(Request $request)
    {
        $payment = new Order();
        $payment->order_status = $request->order_status;
        $payment->user_id = $request->user_id;
        $payment->session_id = $request->session_id;
        $payment->user_email = $request->user_email;
        $payment->name = $request->name;
        $payment->address = $request->address;
        $payment->city = $request->city;
        $payment->pincode = $request->pincode;
        $payment->province = $request->province;
        $payment->mobile = $request->mobile;
        $payment->coupon_code = $request->coupon_code;
        $payment->coupon_amount = $request->coupon_amount;
        $payment->payment_method = $request->payment_method;
        $payment->grand_total = $request->grand_total;
        if (isset($payment->user_id)) {
            $payment->order_status = "success";
        } else {
            $payment->order_status = "failed";
        }
        $payment->save();
        Alert::success('Terimakasih', 'Telah berbelanja di MZ.ID');
        return redirect('/');
    }
    public function applycoupon(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required'
        ]);
        $input_data = $request->all();
        $coupon_code = $input_data['coupon_code'];
        $total_amount_price = $input_data['Total_amountPrice'];
        $check_coupon = Coupon::where('coupon_code', $coupon_code)->count();
        if ($check_coupon == 0) {
            return back()->with('message_coupon', 'Your Coupon Code Not Exist!');
        } else if ($check_coupon == 1) {
            $check_status = Coupon::where('coupon_code', $coupon_code)->first();
            if ($check_status->status == 0) {
                return back()->with('message_coupon', 'Your Coupon was Disabled!');
            } else {
                $expiried_date = $check_status->expiry_date;
                $date_now = date('Y-m-d');
                if ($expiried_date < $date_now) {
                    return back()->with('message_coupon', 'Your Coupon was Expired!');
                } else {
                    $discount_amount_price = ($total_amount_price * $check_status->amount) / 100;
                    Session::put('discount_amount_price', $discount_amount_price);
                    Session::put('coupon_code', $check_status->coupon_code);
                    return back()->with('message_apply_sucess', 'Your Coupon Code was Apply');
                }
            }
        }
    }
}
