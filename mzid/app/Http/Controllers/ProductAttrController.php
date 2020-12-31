<?php

namespace App\Http\Controllers;

use App\ProductAttribute;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductAttrController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function show($id)
    {
        $products = Product::find($id);
        $attributes = ProductAttribute::where('product_id', $id)->get();
        return view('admin.product_attribute', ['products' => $products, 'attributes' => $attributes]);
    }

    public function create(Request $request)
    {
        // $this->validate($request, [
        //     'sku' => 'required',
        //     'size' => 'required',
        //     'price' => 'required|numeric|between:0,99.99',
        //     'stock' => 'required|numeric'
        // ]);
        ProductAttribute::create($request->all());
        return back()->with('success', 'Atribut berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        $request_data = $request->all();
        foreach ($request_data['id'] as $key => $attr) {
            $update_attr = ProductAttribute::where([['product_id', $id], ['id', $request_data['id'][$key]]])
                ->update([
                    'sku' => $request_data['sku'][$key], 'size' => $request_data['size'][$key], 'price' => $request_data['price'][$key],
                    'stock' => $request_data['stock'][$key]
                ]);
        }
        return back()->with('success', 'Atribut berhasil diubah!');
    }
    public function delete($id)
    {
        $deleteAttr = ProductAttribute::findOrFail($id);
        $deleteAttr->delete();
        return back()->with('danger', 'Atribut berhasil dihapus!');
    }
}
