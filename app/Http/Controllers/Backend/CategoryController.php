<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Categories\Store;
use App\Http\Requests\Backend\Categories\Update;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    public function __construct(Category $model)
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
