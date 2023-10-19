<?php
use App\Models\Permission;


function userCheckPermission($route){
    // dd("hello");
    $permission=Permission::where('slug',$route)->first();
    // dd($permission);





}
