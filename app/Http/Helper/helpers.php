<?php

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