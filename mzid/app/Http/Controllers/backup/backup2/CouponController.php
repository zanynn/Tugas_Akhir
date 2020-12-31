<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menu_active=4;
        $coupons = Coupon::all();
        return view('admin.coupon', compact('coupons'));
    }
    public function add()
    {
        return view('admin.coupon_create');
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required|min:5|max:15|unique:coupons,coupon_code',
            'amount' => 'required|numeric|between:1,99',
            'expiry_date' => 'required|date'
        ]);
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $input_data['status'] = 0;
        }
        Coupon::create($input_data);
        return redirect('/admin/coupon')->with('success', 'Data kupon berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon_edit', compact('coupons'));
    }
    public function update(Request $request, $id)
    {
        $update_coupon = Coupon::findOrFail($id);
        $this->validate($request, [
            'coupon_code' => 'required|min:5|max:15|unique:coupons,coupon_code,' . $update_coupon->id,
            'amount' => 'required|numeric|between:1,99',
            'expiry_date' => 'required|date'
        ]);
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $input_data['status'] = 0;
        }
        $update_coupon->update($input_data);
        return redirect('/admin/coupon')->with('success', 'Data kupon berhasil diubah!');
    }
    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect('/admin/coupon')->with('danger', 'Data berhasil dihapus!');
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
            $check_status = Coupon::where('status', 1)->first();
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
