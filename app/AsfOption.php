<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsfOption extends Model
{
    protected $fillable = [
        'option_name', 'option_value',
    ];
}
