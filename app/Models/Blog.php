<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Collective\Html\Eloquent\FormAccessible;

class Blog extends Eloquent
{
    use FormAccessible;
    protected $table = 'blog';

    public static $rules = [
    ];

    public static $messages = [
    ];

    public function catalog()
    {
        $this->belongsTo(\App\Models\Catalog::class);
    }
}
