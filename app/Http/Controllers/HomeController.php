<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::published()->simple()->latest()->paginate(10);
        $premiumPost = Post::published()->premium()->latest()->get();
        return view('home')->with([
            'posts'=>$posts,
            'premiumPost'=>$premiumPost
        ]); 
    }
    public function postsByCategorie(Category $category){
        
        
        return view('home')->with([
            'posts'=>$category->posts()->paginate(10),
            'category'=>$category
        ]); 

    
    }
    public function changeLang($lang){
        session()->forget('lang');
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function searchByTerm(Request $request){
        $posts = Post::orderBy('created_at', 'desc')
        ->where('title_en','like', '%'.$request->term.'%')
        ->orWher('title_fr','like', '%'.$request->term.'%')
        ->published()
        ->get() ;
    }
}
