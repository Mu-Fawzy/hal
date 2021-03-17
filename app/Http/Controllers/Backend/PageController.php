<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Pages\Store;
use App\Models\Post;

class PageController extends BackendController
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $folerViewName = 'pages';
        $array = $request->all()+['user_id' => auth()->id(), 'post_type' => 'page'];

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }

        $this->model::create($array);

        return redirect()->route($folerViewName.'.index');
    }

    public function update(Store $request, $id)
    {
        $row = $this->model->page()->findOrFail($id);
        $folerViewName = 'pages';
        $array = $request->all();

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }
        
        $row->update($array);
        return redirect()->route($folerViewName.'.edit', $row);
    }

    public function withRelation()
    {
        return ['user'];
    }
}
