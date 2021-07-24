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
        $cate = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')->orderBy('id', 'DESC')
            ->paginate(10);

        // dump($products);

        return view('admins.products.list_prod', compact('products', 'cate'));
    }

    public function postList_prod(Request $request)
    {

        // $filterCate = $request->filterCate;
        // $filterPrice = $request->filterPrice;
        if ($request->has('find') && $request->find != '') {
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.cate_id')
                ->select('products.*', 'categories.cate_name')
                ->where('prod_name', 'like', "%" . $request->find . "%")
                ->get();
        }
        if ($request->has('filterCate') && $request->filterCate > 0) {
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.cate_id')
                ->select('products.*', 'categories.cate_name')->where('cate_id', $request->filterCate)->get();
        }

        if ($request->has('filterPrice') && $request->filterPrice > 0) {
            if ($request->filterPrice == 1) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('price', 'ASC')->get();
            } elseif ($request->filterPrice == 2) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('price', 'DESC')->get();
            } elseif ($request->filterPrice == 3) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->where('sale_percent', '>', '0')->get();
            } elseif ($request->filterPrice == 4) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->where('sale_percent', '=', '0')->get();
            } elseif ($request->filterPrice == 5) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('sale_percent', 'ASC')->get();
            } else {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->select('products.*', 'categories.cate_name')->orderBy('sale_percent', 'DESC')->get();
            }
        }
        $cate = DB::table('categories')->get();
        // dump($products);
        return view('admins.products.list_prod', compact('products', 'cate'));
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
        // $prod_name = $request->prod_name;
        // $price = $request->price;
        // $sale_percent = $request->sale_percent;
        // $cate_id = $request->cate_id;
        // $detail = $request->detail;

        // $image = $request->file('image')->getClientOriginalName();
        // $path_image = 'public/products';
        // $path = $request->file('image')->storeAs($path_image, $image);

        // $create = Product::create([
        //     'prod_name' => $prod_name,
        //     'price' => $price,
        //     'sale_percent' => $sale_percent,
        //     'cate_id' => $cate_id,
        //     'image' => $image,
        //     'detail' => $detail
        // ]);
        // if ($create) {
        //     return redirect()->route('admin.prod.list');
        // }

        $model = new Product();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('admin.prod.postlist'));
    }

    public function getEdit_product(Request $request, $id)
    {
        $cate = DB::table('categories')->get();
        $prod = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')
            ->where('products.id', $id)->get();
        $cate = Category::all();
        // dump($cate);
        return view('admins.products.edit_prod', compact('prod', 'cate'));
    }

    public function postEdit_product(Request $request, $id)
    {
        // $id = $request->id;
        // $prod_name = $request->prod_name;
        // $price = $request->price;
        // $sale_percent = $request->sale_percent;
        // $cate_id = $request->cate_id;
        // $detail = $request->detail;
        // // $image = $request->image;
        // $image = $request->image;
        // $image_name = $image->getClientOriginalName();
        // $path_image = 'public/products';
        // $path =  $image->move($path_image, $image);
        // $update = Product::where('id', $id)->update([
        //     'prod_name' => $prod_name,
        //     'price' => $price,
        //     'sale_percent' => $sale_percent,
        //     'cate_id' => $cate_id,
        //     'image' => "$image_name",
        //     'detail' => $detail
        // ]);
        // if ($update) {
        //     return redirect()->route('admin.prod.list');
        //     // dump($update);
        // };

        $model = Product::find($id);
        if (!$model) {
            return redirect(route('admin.prod.list'));
        }
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('admin.prod.list'));
        // dump($model);

    }

    public function getDetail_product(Request $request, $id)
    {
        dump($id);
    }
}