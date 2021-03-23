<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Valuestore\Valuestore;

class SettingController extends BackendController
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    
    public function index()
    {
        $folerViewName = $this->getModelLower();
        $pModelName = $this->getModelplural();
        $title = 'All '.$pModelName;
        
        $section_name = isset(request()->section) && request()->section != null ? request()->section : 'general';
        $setting_sections = $this->model::select('section')->distinct()->pluck('section');
        $get_setting_section = $this->model::whereSection($section_name)->get();

        return view('backend.'.$folerViewName.'.index', compact('section_name','setting_sections','get_setting_section','pModelName','title'));
    }

    public function update(Request $request, $id)
    {
        for ($i=0; $i < count($request->id); $i++) { 
            $input['value'] = isset($request->value[$i]) ? $request->value[$i] : null;
            Setting::whereId($request->id[$i])->first()->update($input);

        }

        $this->cacheData();
        return redirect()->route('settings.index');

    }


    public function cacheData()
    {
        $settings = Valuestore::make(config_path('settings.json'));
        Setting::all()->each(function($item) use($settings){
            $settings->put($item->key, $item->value);
        });
    }

}
