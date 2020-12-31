<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin-display')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    public function index()
    {
        $menu_active = 0;
        $i = 0;
        $categories = Category::all();
        return view('admin.category', compact('menu_active', 'categories', 'i'));
    }
    public function add()
    {
        $menu_active = 2;
        $plucked = Category::where('parent_id', 0)->pluck('name', 'id');
        $cate_levels = ['0' => 'Main Category'] + $plucked->all();
        return view('admin.category_create', compact('menu_active', 'cate_levels'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name',
        ]);
        $data = $request->all();
        Category::create($data);
        return redirect('/admin/category')->with('message', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $menu_active = 0;
        $plucked = Category::where('parent_id', 0)->pluck('name', 'id');
        $cate_levels = ['0' => 'Main Category'] + $plucked->all();
        $categories = Category::findOrFail($id);
        return view('admin.category_edit', compact('categories', 'menu_active', 'cate_levels'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,' . $categories->id,
        ]);
        //dd($request->all());die();
        $input_data = $request->all();
        if (empty($input_data['status'])) {
            $input_data['status'] = 0;
        }
        $categories->update($input_data);
        return redirect('/admin/category')->with('message', 'Data Berhasil Diubah!');
    }
    public function delete($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back();
    }
}
