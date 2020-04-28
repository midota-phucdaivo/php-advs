<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Lead extends Eloquent
{
    use FormAccessible;
    protected $table = 'leads';

    public static $rules = [
    ];

    public static $messages = [
    ];
}
