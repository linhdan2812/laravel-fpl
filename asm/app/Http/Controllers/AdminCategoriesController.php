<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoriesController extends Controller
{
    public function getList_cate()
    {
        $list_cate = DB::table('categories')->paginate(10);
        return view('admins.categories.cate_list', compact('list_cate'));
    }

    public function getCreate_cate()
    {
        return view('admins.categories.create_cate');
    }

    public function postCreate_cate(Request $request)
    {
        $cate_name = $request->cate_name;
        $create = Category::create([
            'cate_name' => $cate_name
        ]);
        if ($create) {
            return redirect()->route('admin.cate.list');
        }
    }

    public function delete_cate(Request $request, $id)
    {
        Product::where('cate_id', $id)->delete();
        Category::where('id', $id)->delete();
        return redirect()->route('admin.cate.list');
    }

    public function getEdit_cate(Request $request, $id)
    {
        $cate = Category::where('id', $request->id)->first();
        return view('admins.categories.edit_cate', compact('cate'));
    }

    public function postEdit_cate(Request $request)
    {
        $id = $request->id;
        $cate_name = $request->cate_name;
        $update = Category::where('id', $id)->update([
            'cate_name' => $cate_name,
        ]);
        if ($update) {
            return redirect()->route('admin.cate.list');
        }
    }

    public function find_cate(Request $request)
    {
        $find = $request->find;
        if ($find) {
            $list_cate = Category::where('cate_name', 'like', "%" . $find . "%")->paginate(10);
            return view('admins.categories.cate_list', compact('list_cate'));
        }
    }
    // public function detail_cate(Request $request, $id)
    // {

    // }
}