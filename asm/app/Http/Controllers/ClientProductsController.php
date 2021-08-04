<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientProductsController extends Controller
{
    public function newproduct()
    {
        // $newprods = Product::all();
        $newprods = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')->orderBy('id', 'DESC')->limit(8)->get();
        // dump($products);
        $oldprods = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')->orderBy('id', 'ASC')->limit(8)->get();
        $saleprods = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->select('products.*', 'categories.cate_name')->where('sale_percent', '>', '0')->get();
        // dump($oldprods);
        return view('client.products.newprod', compact('newprods', 'oldprods', 'saleprods'));
    }
    public function checklogin()
    {
        $user = Auth::user();
        // dump($user);
        return view('client.auth.checkUser', compact('user'));
    }
}