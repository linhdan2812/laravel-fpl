<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function analytic()
    {
        $count_user = User::all()->count();
        $count_cate = Category::all()->count();
        $count_prod = Product::all()->count();
        $count_cmt = Comment::all()->count();
        return view('admins.dashboard.analytic', compact('count_user', 'count_cate', 'count_prod', 'count_cmt'));
    }
}