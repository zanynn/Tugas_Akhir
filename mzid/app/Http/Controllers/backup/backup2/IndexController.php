<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductGallery;
use App\ProductAttribute;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware(function ($request, $next) {
    //         if (Gate::allows('user-display')) return $next($request);
    //         abort(403, 'Anda tidak memiliki cukup hak akses');
    //     });
    // }
    public function index()
    {
        $products = Product::all();
        return view('frontEnd.index', compact('products'));
    }
    public function about()
    {
        return view('frontEnd.about');
    }
    public function shop()
    {
        $products = Product::all();
        $byCate = "";
        return view('frontEnd.products', compact('products', 'byCate'));
    }
    public function listByCat($id)
    {
        $list_product = Product::where('category_id', $id)->get();
        $byCate = Category::select('name')->where('id', $id)->first();
        return view('frontEnd.products', compact('list_product', 'byCate'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $result = DB::table('products')
            ->where('name', 'like', '%' . $search . '%')
            ->paginate();
        return view('frontEnd.searchPage', ['products' => $result]);
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
