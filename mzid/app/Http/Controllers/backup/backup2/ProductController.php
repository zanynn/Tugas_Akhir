<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductAttribute;
use App\ProductGallery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index()
    {

        $i = 0;
        $products = Product::orderBy('created_at', 'desc')->get();
        $categories = Product::where('id', 'category_id')->get();
        return view('admin.product', ['products' => $products, 'i' => $i, 'categories' => $categories]);
        // return view('admin.tabel');
    }
    public function show($id)
    {
        // $menu_active = 3;
        $show_product = Product::find($id);
        $categories = Category::where('parent_id', 0)->pluck('name', 'id')->all();
        $show_category = Category::findOrFail($show_product->category_id);
        $show_attribute = ProductAttribute::where('product_id', $id)->get();
        $show_image = ProductGallery::where('product_id', $id)->get();
        return view('admin.product_show', [
            'show_product' => $show_product,
            // 'menu_active' => $menu_active,
            'categories' => $categories,
            'show_category' => $show_category,
            'show_image' => $show_image,
            'show_attribute' => $show_attribute
        ]);
    }
    public function add()
    {
        $menu_active = 3;
        $categories = Category::where('parent_id', 0)->pluck('name', 'id')->all();
        return view('admin.product_create', compact('menu_active', 'categories'));
    }
    public function create(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image')->store('/images', 'public');
        }
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'color' => $request->color,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image
        ]);
        return redirect('/admin/product')->with('success', 'Data berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $menu_active = 3;
        $categories = Category::where('parent_id', 0)->pluck('name', 'id')->all();
        $edit_product = Product::findOrFail($id);
        $edit_category = Category::findOrFail($edit_product->category_id);
        return view('admin.product_edit', compact('edit_product', 'menu_active', 'categories', 'edit_category'));
    }
    public function update(Request $request, $id)
    {
        $update_product = Product::find($id);
        $update_product->category_id = $request->category_id;
        $update_product->name = $request->name;
        $update_product->code = $request->code;
        $update_product->color = $request->color;
        $update_product->description = $request->description;
        $update_product->price = $request->price;

        if ($update_product->image && file_exists(storage_path('app/public/' . $update_product->image))) {
            \Storage::delete('public' . $update_product->image);
        }
        $image = $request->file('image')->store('/images', 'public');
        $update_product->image = $image;
        $update_product->save();
        return redirect('/admin/product')->with('success', 'Data berhasil diubah!');
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/admin/product')->with('danger', 'Data berhasil dihapus!');
    }
    public function cetak_pdf()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $category = Product::where('id', 'category_id')->get();
        $pdf = PDF::loadview('admin.product_pdf', ['products' => $products, 'category' => $category]);
        return $pdf->stream();
    }
}
