<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Customer extends Eloquent
{
    use FormAccessible;
    protected $table = 'customers';

    public static $rules = [
        'name' => 'required|numeric',
    ];

    public static $messages = [
        'name.required' => 'Tên không được để trống',
    ];
}
