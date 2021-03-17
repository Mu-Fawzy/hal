<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Users\Store;
use App\Http\Requests\Backend\Users\Update;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends BackendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $folerViewName = $this->getModelLower();
        $array = $request->all();

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }

        if($this->hasPassword($request))
        {
            $array['password'] = Hash::make($request->password);
        }else {
            unset($array['password']);
            unset($array['password_confirmation']);
        }

        $this->model::create($array);
        return redirect()->route($folerViewName.'.index');
    }

    public function update(Update $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $folerViewName = $this->getModelLower();
        $array = $request->all();

        if($this->hasImage($request))
        {
            $array['image'] = $request->file('image')->store($folerViewName, 'uploads');
        }else {
            unset($array['image']);
        }

        if($this->hasPassword($request))
        {
            $array['password'] = Hash::make($request->password);
        }else {
            unset($array['password']);
            unset($array['password_confirmation']);
        }

        $row->update($array);
        return redirect()->route($folerViewName.'.edit', $row);
    }
}
