<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class PropertyItem extends Eloquent
{
    // use FormAccessible;
    protected $table = 'property_item';

    public static $rules = [
    //    'name' => 'required|numeric',
    ];

    public static $messages = [
        // 'name.required' => 'Tên không được để trống',
        // 'name.numeric' => 'Tên phải là số',
    ];

    public function product()
    {
        // $this->hasMany(\App\Models\Catalog::class, 'id', 'catalog_id');
    }
}
