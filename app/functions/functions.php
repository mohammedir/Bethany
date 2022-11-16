<?php

use App\Models\CoreLookups;

function get_core_lookups($id)
{
    return CoreLookups::query()->where("parent_id_fk", $id)->get();
}

function get_core($id)
{
    $data =  CoreLookups::query()->find($id);
    return app()->getLocale() == 'ar' ? $data->name_ar : $data->name_en;
}

function lang($data)
{
    return app()->getLocale() == 'ar' ? $data->name_ar : $data->name_en;
}
