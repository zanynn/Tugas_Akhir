<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('frontEnd.index', compact('products'));
    }
    public function about()
    {
        return view('frontEnd.about');
    }
    public function WarningAlert()
    {
        Alert::warning('Login Diperlukan!', 'Sing Up Jika Belum Memiliki Akun!');
        return redirect('/login_page');
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
}
