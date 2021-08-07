<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBrandsController extends Controller
{
    public function getList_brands()
    {
        $list_brand = DB::table('brands')->paginate(10);
        return view('admins.brands.listBrands', compact('list_brand'));
    }

    public function getCreate_brand()
    {
        return view('admins.brands.createBrand');
    }

    public function postCreate_brand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|min:5'
        ], [
            'brand_name.required' => 'bạn chưa nhập tên hãng',
            'brand_name.min' => 'độ dài tên thương hiệu ít nhất 5 ký tự'
        ]);
        $brand_name = $request->brand_name;
        $create = Brands::create([
            'brand_name' => $brand_name
        ]);
        if ($create) {
            return redirect()->route('admin.brand.list');
        }
    }

    public function delete_brand(Request $request, $id)
    {
        Product::where('brand_id', $id)->delete();
        Brands::where('id', $id)->delete();
        return redirect()->route('admin.brand.list');
    }

    public function getEdit_brand(Request $request)
    {
        $brands = Brands::where('id', $request->id)->first();
        return view('admins.brands.editBrand', compact('brands'));
    }
    public function postEdit_brand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|min:5'
        ], [
            'brand_name.required' => 'bạn chưa nhập tên hãng',
            'brand_name.min' => 'độ dài tên thương hiệu ít nhất 5 ký tự'
        ]);
        $id = $request->id;
        $brand_name = $request->brand_name;
        $update = Brands::where('id', $id)->update([
            'brand_name' => $brand_name,
        ]);
        if ($update) {
            return redirect()->route('admin.brand.list');
        }
    }
}