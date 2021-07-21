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

    public function postList_prod(Request $request)
    {
        $filterPrice = $request->filterPrice;
        if ($filterPrice) {
            if ($filterPrice == 1) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('price', 'ASC')->get();
            } elseif ($filterPrice == 2) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('price', 'DESC')->get();
            } elseif ($filterPrice == 3) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->where('sale_percent', '>', '0')->get();
            } elseif ($filterPrice == 4) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->where('sale_percent', '=', '0')->get();
            } elseif ($filterPrice == 5) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('sale_percent', 'ASC')->get();
            } else {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('sale_percent', 'DESC')->get();
            }
        }
        // dump($filterPrice);
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
        $detail = $request->detail;

        $image = $request->file('image')->getClientOriginalName();
        $path_image = 'public/products';
        $path = $request->file('image')->storeAs($path_image, $image);

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