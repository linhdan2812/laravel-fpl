<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductsController extends Controller
{
    public function getList_prod()
    {
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')->orderBy('id', 'DESC')
            ->paginate(10);

        // dump($products);

        return view('admins.products.list_prod', compact('products'));
    }
    // XOÁ ĐÂY NÈ 
    public function delete_product(Request $request, $id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('admin.prod.list');
    }

    public function getCreate_product()
    {
        $cate = Category::all();
        return view('admins.products.create_prod', compact('cate'));
    }

    public function postCreate_product(Request $request)
    {
        $prod_name = $request->prod_name;
        $price = $request->price;
        $sale_percent = $request->sale_percent;
        $cate_id = $request->cate_id;
        $image = $request->image;
        $detail = $request->detail;
        $create = Product::create([
            'prod_name' => $prod_name,
            'price' => $price,
            'sale_percent' => $sale_percent,
            'cate_id' => $cate_id,
            'image' => $image,
            'detail' => $detail
        ]);
        if ($create) {
            return redirect()->route('admin.prod.list');
        }
    }

    public function getEdit_product(Request $request, $id)
    {
        $prod = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')
            ->where('products.id', $id)->get();
        $cate = Category::all();
        // dump($cate);
        return view('admins.products.edit_prod', compact('prod', 'cate'));
    }

    public function postEdit_product(Request $request)
    {
        $id = $request->id;
        $prod_name = $request->prod_name;
        $price = $request->price;
        $sale_percent = $request->sale_percent;
        $cate_id = $request->cate_id;
        $image = $request->image;
        $detail = $request->detail;
        $update = Product::where('id', $id)->update([
            'prod_name' => $prod_name,
            'price' => $price,
            'sale_percent' => $sale_percent,
            'cate_id' => $cate_id,
            'image' => $image,
            'detail' => $detail
        ]);
        if ($update) {
            return redirect()->route('admin.prod.list');
        };
    }

    public function getDetail_product(Request $request, $id)
    {
        dump($id);
    }
}