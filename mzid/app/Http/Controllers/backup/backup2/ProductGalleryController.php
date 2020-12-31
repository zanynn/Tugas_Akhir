<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductGallery;
use App\ProductAttribute;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        $imageGalleries = ProductGallery::where('product_id', $id)->get();
        return view('admin.product_gallery', compact('product', 'imageGalleries'));
    }
    public function create(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image')->store('/images', 'public');
        }
        ProductGallery::create([
            'product_id' => $request->product_id,
            'image' => $image
        ]);

        return redirect()->back()->with('success', 'Gambar produk berhasil ditambahkan!');
    }
    public function delete($id)
    {
        $deleteImage = ProductGallery::findOrFail($id);
        $deleteImage->delete();
        return back()->with('danger', 'Gambar produk berhasil dihapus!');
    }
}
