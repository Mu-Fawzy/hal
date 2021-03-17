<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Posts\Store;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BackendController
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $folerViewName = $this->getModelLower();
        $array = $request->all()+['user_id' => auth()->id(), 'post_type' => 'post'];

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }

        $row = $this->model::create($array);

        if ($request->has('categories') && !empty($request->categories)) {
            $row->categories()->sync($request->categories);
        }
        if ($request->has('tags') && !empty($request->tags)) {
            $row->tags()->sync($request->tags);
        }
        
        return redirect()->route($folerViewName.'.index');
    }

    public function update(Store $request, $id)
    {
        $row = $this->model->post()->findOrFail($id);
        $folerViewName = $this->getModelLower();
        $array = $request->all();

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }

        $row->update($array);
        if ($request->has('categories') && !empty($request->categories)) {
            $row->categories()->sync($request->categories);
        }
        if ($request->has('tags') && !empty($request->tags)) {
            $row->tags()->sync($request->tags);
        }

        return redirect()->route($folerViewName.'.edit', $row);
    }

    public function withRelation()
    {
        return ['user'];
    }

    public function appendTo()
    {
        return [
            'categories' => Category::pluck('name','id')->toArray(),
            'tags' => Tag::pluck('name','id')->toArray(),
        ];
    }
}
