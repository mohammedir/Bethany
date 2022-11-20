<?php



function lang($data)
{
    return app()->getLocale() == 'ar' ? $data->name_ar : $data->name_en;
}

function admin_name($id){
    return \App\Models\Admin::query()->where('id',$id)->get()->first();
}
