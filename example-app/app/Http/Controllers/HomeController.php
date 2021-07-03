<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function inforform(){
         return view('user.inforform');
     }
     public function saveInfor(Request $request){
        $hvt =  $request->hvt;
        $age =  $request->age;
        
        if($request->gt==1){
            $gt = "nam";
        } elseif ($request->gt==2){
            $gt = "nữ";
        } else{
            $gt = "khác";
        };
        if($request->kh==""){
            $kh = "ế";
        } else{
            $kh = "đã kết hôn";
        }
        // dd($hvt, $age, $gt, $kh);
        return view('user.thongtin', compact('hvt','age','gt','kh'));  
         
     }
}