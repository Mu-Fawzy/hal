<?php

namespace App\Http\Controllers\Backend;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends BackendController
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    public function store(Request $request)
    {
        $postId = Post::findOrFail($request->post_id);
        $array = $request->all()+['user_id' => auth()->id()];
        $postId->comments()->create($array);

        return redirect()->route('posts.edit',[$postId]);
    }

    public function update(Request $request,$id)
    {
        $comment = Comment::findOrFail($id);
        $postId = Post::findOrFail($request->post_id);
        $comment->update([
            'comment' => $request->comment
        ]);

        return redirect()->route('posts.edit',[$postId]);
    }

    public function replyComments(Request $request,$id)
    {
        $comment = $this->model->findOrFail($id);
        $postId = Post::findOrFail($request->post_id);
        $array = $request->all()+['user_id' => auth()->id(),'parent_id' => $comment->id];
        $postId->comments()->create($array);

        return redirect()->route('posts.edit',[$postId]);
    }

    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);
        $row->delete();
        $row->replies()->delete();
        return redirect()->back();
    }
}
