<?php

namespace App\Http\Controllers;

use App\Cart;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
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
        return view('frontEnd.cart', compact('cart_datas', 'total_price'));
    }

    public function addToCart(Request $request)
    {
        $inputToCart = $request->all();
        $user_email = $request->user_email;
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        if ($inputToCart['size'] == "") {
            Alert::warning('Oops...', 'Pilih Ukuran terlebih dahulu!');
            return back();
        } else {
            $stockAvailable = DB::table('product_attributes')->where([
                'product_id' => $inputToCart['product_id'],
                'price' => $inputToCart['price']
            ])->first();
            if ($stockAvailable->stock >= $inputToCart['quantity']) {
                $inputToCart['user_email'] = $user_email;
                $session_id = Session::get('session_id');
                if (empty($session_id)) {
                    $session_id = str_random(40);
                    Session::put('session_id', $session_id);
                }
                $inputToCart['session_id'] = $session_id;
                $sizeAtrr = explode("-", $inputToCart['size']);
                $inputToCart['size'] = $sizeAtrr[1];
                $inputToCart['product_code'] = $stockAvailable->sku;
                $count_duplicateItems = Cart::where([
                    'product_id' => $inputToCart['product_id'],
                    'product_color' => $inputToCart['product_color'],
                    'size' => $inputToCart['size']
                ])->count();
                if ($count_duplicateItems > 0) {
                    return redirect()->back()->with('success', 'Penambahan item berhasil!');
                } else {
                    Cart::create($inputToCart);
                    return redirect()->back()->with('success', 'Berhasil Ditambahkan ke keranjang!');
                }
            } else {
                Alert::error('Oops...', 'Stock Tidak tersedia!');
                return redirect()->back();
            }
        }
    }
    public function deleteItem($id = null)
    {
        $delete_item = Cart::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('success', 'Hapus Item Success!');
    }
    public function updateQuantity($id, $quantity)
    {
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size = DB::table('carts')->select('product_code', 'size', 'quantity')->where('id', $id)->first();
        $stockAvailable = DB::table('product_attributes')->select('stock')->where([
            'sku' => $sku_size->product_code,
            'size' => $sku_size->size
        ])->first();
        $updated_quantity = $sku_size->quantity + $quantity;
        if ($stockAvailable->stock >= $updated_quantity) {
            DB::table('carts')->where('id', $id)->increment('quantity', $quantity);
            return back()->with('success', 'Update Quantity already');
        } else {
            Alert::error('Oops...', 'Stock Tidak tersedia!');
            return back();
        }
    }
}
