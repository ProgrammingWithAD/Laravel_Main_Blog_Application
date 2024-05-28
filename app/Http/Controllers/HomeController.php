<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index($id){
    //     $data=User::with('blog')->find($id);
    //     return $data;
    // }

    public function index(){
        $blog=Blog::orderBy("id","desc")->paginate(12);
        return view("index",compact("blog"));
    }
    public function solo_post($url){
        $post=Blog::where("url",$url)->first();
        return view("post",compact("post"));
    }

    public function solo_category($id){
        $search=Category::where("id",$id)->first();
        return view("search",compact("search"));
    }
}
