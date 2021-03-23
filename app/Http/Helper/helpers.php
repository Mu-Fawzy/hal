<?php
use Spatie\Valuestore\Valuestore;

function getStatusText($value)
{
    if ($value == 1) {
        $value = 'Active';
    }else {
        $value = 'Inactive';
    }
    return $value;
}

function imagePath($defaultImg ,$value) 
{
    if ($value != 'assets/img/'.$defaultImg) {
        $value = 'assets/uploads/'.$value;
    }
    return $value;
}

function checkPostType()
{
    return request()->segment(2);
}

function getSettingOf($key)
{
    $settings = Valuestore::make(config_path('settings.json'));
    return $settings->get($key); // Returns 'value'
}