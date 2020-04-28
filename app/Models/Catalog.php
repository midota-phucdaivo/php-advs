<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Catalog extends Eloquent
{
    // use FormAccessible;
    protected $table = 'catalog';

    public static $rules = [
    //    'name' => 'required|numeric',
    ];

    public static $messages = [
        // 'name.required' => 'Tên không được để trống',
        // 'name.numeric' => 'Tên phải là số',
    ];

    public function catalog()
    {
        // $this->hasMany(\App\Models\Catalog::class, 'id', 'catalog_id');
    }

    public function products()
    {
        return $this->hasMany(Product::Class);
    }
}
