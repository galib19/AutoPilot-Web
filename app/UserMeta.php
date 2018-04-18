<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $fillable = [
        'user_id', 'meta_key', 'meta_value',
    ];


    public function users(){

    	return $this->belongsTo(User::class);
    	
    }
}
