<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\Store;
use App\Http\Requests\Backend\Users\Update;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class BackendController extends Controller
{
    public $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        if(checkPostType() === 'pages')
        {
            $rows = $this->model->page();
        }elseif(checkPostType() === 'posts') {
            $rows = $this->model->post();
        }else {
            $rows = $this->model;
        }

        if (!empty($this->withRelation())) {
            $rows = $rows->with($this->withRelation());
        }
        
        $rows = $this->search($rows);
        $rows = $rows->paginate(5);

        if(checkPostType() === 'pages')
        {
            $folerViewName = 'pages';
            $pModelName = 'Pages';
            $sModelName = 'Page';
        }else {
            $folerViewName = $this->getModelLower();
            $pModelName = $this->getModelplural();
            $sModelName = $this->getClassBaseName();
        }
        $title = 'All '.$pModelName;
        $list = $pModelName.' List';
        $table = $pModelName.' Table';
        $add = 'Add New '.$sModelName;
        $description = 'Here You can Add, Edit, Delete '.$pModelName;
        $noYet  = 'No '.$pModelName.' Yet';


        
        return view('backend.'.$folerViewName.'.index', compact('rows','sModelName','pModelName','folerViewName','title','list','table','add','description','noYet'));
    }

    public function create()
    {
        if(checkPostType() === 'pages')
        {
            $folerViewName = 'pages';
            $pModelName = 'Pages';
            $sModelName = 'Page';
        }else {
            $folerViewName = $this->getModelLower();
            $pModelName = $this->getModelplural();
            $sModelName = $this->getClassBaseName();
        }

        $title = 'Create '.$sModelName;
        $all = 'All '.$pModelName;
        $description = 'Here You Can '.$title;
        $btn = 'Create';
        $appendTo = $this->appendTo();

        return view('backend.'.$folerViewName.'.create', compact('sModelName','pModelName','folerViewName','title','all','description','btn'))->with($appendTo);
    }

    public function edit($id)
    {
        if(checkPostType() === 'pages')
        {
            $row = $this->model->page()->findOrFail($id);
        }elseif(checkPostType() === 'posts') {
            $row = $this->model->post()->findOrFail($id);
        }else {
            $row = $this->model->findOrFail($id);
        }

        if(checkPostType() === 'pages')
        {
            $folerViewName = 'pages';
            $pModelName = 'Pages';
            $sModelName = 'Page';
        }else {
            $folerViewName = $this->getModelLower();
            $pModelName = $this->getModelplural();
            $sModelName = $this->getClassBaseName();
        }
        
        $title = 'Edit '.$sModelName;
        $all = 'All '.$pModelName;
        $description = 'Here You Can '.$title;
        $btn = 'Update';
        $appendTo = $this->appendTo();

        return view('backend.'.$folerViewName.'.edit', compact('row','sModelName','pModelName','folerViewName','title','all','description','btn'))->with($appendTo);
    }

    public function destroy($id)
    {
        if(checkPostType() === 'pages')
        {
            $row = $this->model->page()->findOrFail($id);
        }elseif(checkPostType() === 'posts') {
            $row = $this->model->post()->findOrFail($id);
        }else {
            $row = $this->model->findOrFail($id);
        }

        if(checkPostType() === 'pages')
        {
            $folerViewName = 'pages';
        }else {
            $folerViewName = $this->getModelLower();
        }

        $row->delete();
        return redirect()->route($folerViewName.'.index');
    }

    // get model name --Singular-- (return first-letter --Capital--)
    public function getClassBaseName()
    {
        return class_basename($this->model);
    }

    // get model name --Plural-- (return first-letter --Capital--)
    public function getModelplural()
    {
        return \Str::plural($this->getClassBaseName());
    }
    
    // get model name --Singular-- (return first-letter --small--)
    public function getModelLower()
    {
        return \Str::lower($this->getModelplural());
    }

    public function search($rows)
    {
        return $rows;
    }

    public function hasImage($request)
    {
        if ($request->hasFile('image') && !empty($request->file('image'))) {
            return true;
        }
    }

    public function hasPassword($request)
    {
        if ($request->has('password') && !empty($request->get('password'))) {
            return true;
        }
    }

    public function appendTo()
    {
        return [];
    }

    public function withRelation()
    {
        return [];
    }
}
