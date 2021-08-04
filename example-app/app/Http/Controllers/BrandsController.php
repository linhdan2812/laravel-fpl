<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    public function listBrands()
    {
        $user = Auth::check();
        $brands = Brands::all();
        // dump($user);
        // if ($user == true) {
        //     $userlogin = Auth::user();
        dump($user);
        // }
        return view('brands.list', compact('brands'));
    }
    // public function checklogin()
    // {
    //     $user = Auth::user();
    //     // dump($user);
    //     return view('client.auth.checkUser', compact('user'));
    // }

    public function getCreate_brand()
    {
        // $user = Auth::user();
        return view('brands.create');
    }

    public function postCreate_brand(Request $request)
    {
        $model = new Brands();
        // gán gtri cho các thuộc tính của object sử dụng massassign ($fillable trong model)
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('brands', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('listBrand'));
    }

    public function deleteBrand(Request $request, $id)
    {
        $plane = Planes::where('brand_id', $id)->delete();
        Brands::where('id', $id)->delete();
        return redirect()->route('listBrand');
        // dump($plane);
    }
    public function getEditBrand(Request $request, $id)
    {
        $user = Auth::user();
        $brands = DB::table('brands')->where('id', $id)->get();
        // $brands = Brands::where('id', $request->id)->first();
        // dump($brands);
        return view('brands.edit', compact('brands', 'user'));
    }

    public function postEditBrand(Request $request, $id)
    {
        $model = Brands::find($id);
        if (!$model) {
            return redirect(route('listBrand'));
        }
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('brands', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('listBrand'));
    }
}