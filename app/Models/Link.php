<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Link extends Eloquent
{
    use FormAccessible;
    protected $table = 'links';

    public static $rules = [
    ];

    public static $messages = [
    ];
}
