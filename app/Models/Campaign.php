<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Campaign extends Eloquent
{
    use FormAccessible;
    protected $table = 'campaigns';

    public static $rules = [
    ];

    public static $messages = [
    ];
}
