<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
// use Faker\Provider\File as ProviderFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductsController extends Controller
{
    public function getList_prod()
    {
        $cate = DB::table('categories')->get();
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*', 'categories.cate_name', 'brands.brand_name')->orderBy('id', 'DESC')
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
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                ->where('prod_name', 'like', "%" . $request->find . "%")
                ->get();
        }
        if ($request->has('filterCate') && $request->filterCate > 0) {
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.cate_id')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                ->where('cate_id', $request->filterCate)->get();
        }

        if ($request->has('filterPrice') && $request->filterPrice > 0) {
            if ($request->filterPrice == 1) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->orderBy('price', 'ASC')->get();
            } elseif ($request->filterPrice == 2) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->orderBy('price', 'DESC')->get();
            } elseif ($request->filterPrice == 3) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->where('sale_percent', '>', '0')->get();
            } elseif ($request->filterPrice == 4) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->where('sale_percent', '=', '0')->get();
            } elseif ($request->filterPrice == 5) {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->orderBy('sale_percent', 'ASC')->get();
            } else {
                $products = DB::table('products')
                    ->join('categories', 'categories.id', '=', 'products.cate_id')
                    ->join('brands', 'brands.id', '=', 'products.brand_id')
                    ->select('products.*', 'categories.cate_name', 'brands.brand_name')
                    ->orderBy('sale_percent', 'DESC')->get();
            }
        }
        $cate = DB::table('categories')->get();
        // dump($products);
        return view('admins.products.list_prod', compact('products', 'cate'));
    }
    // XOÁ ĐÂY NÈ
    public function delete_product(Request $request, $id)
    {
        // $prod = Product::all();
        // $image_path = app_path('uploads/' . $prod->image);
        // if (file_exists($image_path)) {
        //     File::delete($image_path);
        // }
        Product::where('id', $id)->delete();
        return redirect()->route('admin.prod.list');
    }

    public function getCreate_product()
    {
        $brands = Brands::all();
        $cate = Category::all();
        return view('admins.products.create_prod', compact('cate', 'brands'));
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
        $request->validate([
            'prod_name' => 'required|min:5',
            'price' => 'required',
            'image' => 'required|image',
            'detail' => 'required'
        ], [
            'prod_name.required' => 'bạn chưa nhập tên sản phẩm',
            'prod_name.min' => 'tên sản phẩm có ít nhất 5 ký tự',
            'price.required' => 'nhập giá sản phẩm',
            'image.required' => 'chọn ảnh cho sản phẩm',
            'image.image' => 'file của bạn phải là file ảnh có định dạng là jpg, jpeg, png, bmp, gif, svg, or webp.',
            'detail.required' => 'bạn chưa nhập mô tả',
        ]);
        $model = new Product();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('admin.prod.list'));
    }

    public function getEdit_product(Request $request, $id)
    {
        // $cate = DB::table('categories')->get();
        $prod = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*', 'categories.cate_name', 'brands.brand_name')
            ->where('products.id', $id)->get();
        $cate = Category::all();
        $brands = Brands::all();
        // dump($cate);
        return view('admins.products.edit_prod', compact('prod', 'cate', 'brands'));
    }

    public function postEdit_product(Request $request, $id)
    {
        $request->validate([
            'prod_name' => 'required|min:5',
            'price' => 'required',
            'image' => 'image',
            'detail' => 'required'
        ], [
            'prod_name.required' => 'bạn chưa nhập tên sản phẩm',
            'prod_name.min' => 'tên sản phẩm có ít nhất 5 ký tự',
            'price.required' => 'nhập giá sản phẩm',
            // 'image.required' => 'chọn ảnh cho sản phẩm',
            'image.image' => 'file của bạn phải là file ảnh có định dạng là jpg, jpeg, png, bmp, gif, svg, or webp.',
            'detail.required' => 'bạn chưa nhập mô tả',
        ]);
        $model = Product::find($id);
        if (!$model) {
            return redirect(route('admin.prod.list'));
        }
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('products', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('admin.prod.list'));
        // dump($model);

    }

    public function getDetail_product(Request $request, $id)
    {
        $prod = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')
            ->where('products.id', $id)->get();
        return view('admins.products.detail_prod', compact('prod'));
    }
}