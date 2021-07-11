<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCommentController extends Controller
{
    public function getList_comments()
    {
        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('products', 'comments.prod_id', '=', 'products.id')
            ->select('comments.*', 'users.username', 'products.prod_name')
            ->get();
        // dump($comments);
        return view('admins.comments.list_comments', compact('comments'));
    }
    public function getEdit_comment(Request $request)
    {
        $getCmt = Comment::where('id', $request->id)->first();
        return view('admins.comments.edit_comment', compact('getCmt'));
    }
    public function postEdit_comment(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $update = Comment::where('id', $id)->update([
            'status' => $status,
        ]);
        if ($update) {
            return redirect()->route('admin.cmts.list');
        }
    }
    public function delete_comment(Request $request, $id)
    {
        Comment::where('id', $id)->delete();
        return redirect()->route('admin.cmts.list');
    }
}