<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Product extends Eloquent
{

    public $timestamps = TRUE;

    // use FormAccessible;
    protected $table = 'product';

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

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function propertys()
    {
        return $this->belongsToMany(Property::class);
    }
}
