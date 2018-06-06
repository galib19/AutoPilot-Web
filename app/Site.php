<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    public $incrementing = false;

    protected $guarded = [];

    
    public function ticket(){
    	return $this->hasMany(Ticket::class, 'site_id');
    }

}


 