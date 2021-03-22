<?php

namespace App\Http\Controllers;

use App\Events\ShowPost;
use App\Mail\ContactUs;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Generator\StringManipulation\Pass\Pass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with(['categories','user','allComments'=>function($query){
            return $query->select('id','commentable_id');
        }]);
        $posts = $posts->when(request()->search ,function($q){
            return $q->where('name', 'LIKE', '%'.request()->get('search').'%');
        });
        $posts = $posts->orderBy('id', 'desc')->paginate(10);

        return view('home', compact('posts'));
    }

    public function category($id)
    {
        $category = Category::select('name')->findOrFail($id);
        $posts = Post::with(['categories','user','allComments'=>function($query){
            return $query->select('id','commentable_id');
        }])->whereHas('categories', function($q) use($id){
            return $q->where('category_id',$id);
        })->orderBy('id', 'desc')->paginate(10);

        //return $posts;
        return view('frontend.category', compact('posts','category'));
    }

    public function author($id)
    {
        $author = User::select('name','image')->findOrFail($id);
        $posts = Post::with(['categories','user','allComments'=>function($query){
            return $query->select('id','commentable_id');
        }])->where('user_id', $id)->orderBy('id', 'desc')->paginate(10);

        return view('frontend.author', compact('posts','author'));
    }
    
    public function post($id)
    {
        $model = Post::class;
        $getCategories = $model::with(['categories'])->findOrFail($id);

        $posts = $model::with('categories')->take(7)->get();
        $post = $model::with(['categories','tags','user','comments.replies','allComments'=>function($query){
            return $query->select('id','commentable_id');
        }])->findOrFail($id);

        $relatedPosts = $model::with('categories')->whereHas('categories', function($q) use($getCategories){
            return $q->whereIn('category_id', $getCategories->categories->pluck('id'));
        })->where('id','!=',$id)->orderBy('id', 'desc')->get();

        event(new ShowPost($post));

        return view('frontend.single', compact('post','posts','relatedPosts'));
    }

    public function page($id,$slug)
    {
        $model = Post::class;
        $page = $model::where('post_type','page')->findOrFail($id);

        return view('frontend.page', compact('page'));
    }

    public function addComments(Request $request)
    {
        $postId = Post::findOrFail($request->post_id);
        $array = $request->all()+['user_id' => auth()->id()];
        $postId->comments()->create($array);

        return redirect()->route('post.index',['id'=>$postId,'#comments']);
    }

    public function replaycomments(Request $request,$id)
    {
        $comment = Comment::findOrFail($id);
        $postId = Post::findOrFail($request->post_id);
        $array = $request->all()+['user_id' => auth()->id(),'parent_id' => $comment->id];
        $postId->comments()->create($array);

        return redirect()->route('post.index',['id'=>$postId,'#comments']);
    }

    public function contactus()
    {
        return view('frontend.contactus');
    }

    public function sendMessage(Request $request)
    {
        $senderName = $request->name;
        $senderSubject = $request->subject;
        Mail::to($request->email)->send(new ContactUs($senderName,$senderSubject));
    }

    public function homePage()
    {
        $categories = Category::with(['posts'])->get();
        return view('welcome',compact('categories'));
    }
}
