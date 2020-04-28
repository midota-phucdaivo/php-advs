<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Source extends Eloquent
{
    use FormAccessible;
    protected $table = 'sources';

    public static $rules = [
    ];

    public static $messages = [
    ];
}
