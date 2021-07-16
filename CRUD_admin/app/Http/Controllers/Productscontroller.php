<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Productscontroller extends Controller
{
    public function list_prod()
    {
        $products = DB::table('products')->paginate(5);
        return view('admins.products.list', compact('products'));
    }

    public function getCreate_prod()
    {
        $cate = Category::all();
        return view('admins.products.create_prod', compact('cate'));
    }

    public function postCreate_prod(Request $request)
    {
        $name = $request->name;
        $image = $request->image;
        $price = $request->price;
        $detail = $request->detail;
        $cate_id = $request->cate_id;
        $create = Product::create([
            'name' => $name,
            'image' => $image,
            'price' => $price,
            'detail' => $detail,
            'cate_id' => $cate_id

        ]);
        if ($create) {
            return redirect()->route('prod.list');
        }
    }
}