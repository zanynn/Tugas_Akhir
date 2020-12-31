<?php

namespace App\Http\Controllers;

use App\ProductGallery;
use App\ProductAttribute;
use App\Product;
use App\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function detialpro($id)
    {
        $detail_product = Product::findOrFail($id);
        $imagesGalleries = ProductGallery::where('product_id', $id)->get();
        $totalStock = ProductAttribute::where('product_id', $id)->sum('stock');
        $user = User::all();
        $relateProducts = Product::where([['id', '!=', $id], ['category_id', $detail_product->category_id]])->get();
        return view('frontEnd.product_details', compact('detail_product', 'imagesGalleries', 'totalStock', 'relateProducts', 'user'));
    }
    public function getAttrs(Request $request)
    {
        $all_attrs = $request->all();
        //print_r($all_attrs);die();
        $attr = explode('-', $all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select = ProductAttribute::where(['product_id' => $attr[0], 'size' => $attr[1]])->first();
        echo $result_select->price . "#" . $result_select->stock;
    }
}
