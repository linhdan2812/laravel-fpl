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
}