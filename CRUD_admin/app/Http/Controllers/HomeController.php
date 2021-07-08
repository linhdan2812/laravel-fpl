<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function count_record()
    {
        $count_user = User::all()->count();
        $count_cate = Category::all()->count();
        $count_prod = Product::all()->count();
        return view('admins.dashboard.dashboard', compact('count_user', 'count_cate', 'count_prod'));
    }
}