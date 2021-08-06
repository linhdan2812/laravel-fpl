<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanesController extends Controller
{
    public function listPlanes()
    {
        // $user = Auth::check();
        $planes = Planes::all();
        // dump($user);
        return view('planes.list', compact('planes'));
    }
    public function deletePlane(Request $request, $id)
    {
        Planes::where('id', $id)->delete();
        return redirect()->route('listPlane');
    }
    public function getCreate_plane()
    {
        // $user = Auth::user();
        $brands = Brands::all();
        return view('planes.create', compact('brands'));
    }
    public function postCreate_plane(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',

        ], [
            'name.required' => 'bạn phải điền tên thương hiệu',
            'name.min' => 'tên thương hiệu phải có ít nhất ba ký tự',
        ]);
        $model = new Planes();
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('plane', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('listPlane'));
    }


    public function getEditPlane(Request $request, $id)
    {
        // $user = Auth::user();
        $brands = Brands::all();
        $planes = DB::table('planes')->where('id', $id)->get();
        return view('planes.edit', compact('planes', 'brands'));
    }

    public function postEditPlane(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',

        ], [
            'name.required' => 'bạn phải điền tên thương hiệu',
            'name.min' => 'tên thương hiệu phải có ít nhất ba ký tự',
        ]);
        $model = Planes::find($id);
        if (!$model) {
            return redirect(route('listPlane'));
        }
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('plane', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect(route('listPlane'));
    }
}