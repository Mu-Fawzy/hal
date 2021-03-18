<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('home', compact('posts'));
    }

    public function category($id)
    {
        $category = Category::select('name')->findOrFail($id);
        $posts = Post::with('categories')->whereHas('categories', function($q) use($id){
            return $q->where('category_id',$id);
        })->orderBy('id', 'desc')->paginate(10);

        return view('frontend.category', compact('posts','category'));
    }
}
