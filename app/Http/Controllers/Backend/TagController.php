<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Tags\Store;
use App\Http\Requests\Backend\Tags\Update;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends BackendController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $folerViewName = $this->getModelLower();
        $array = $request->all()+['user_id' => auth()->id()];

        $this->model::create($array);
        return redirect()->route($folerViewName.'.index');
    }

    public function update(Update $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $folerViewName = $this->getModelLower();
        $array = $request->all();

        $row->update($array);
        return redirect()->route($folerViewName.'.edit', $row);
    }

    public function withRelation()
    {
        return ['user'];
    }

}
