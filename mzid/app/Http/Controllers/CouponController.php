<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
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
}
