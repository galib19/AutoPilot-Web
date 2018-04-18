<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseVictim extends Model
{
    
    protected $fillable = [
        'case_id', 'name', 'parents', 'location', 'age', 'sex',
    ];

    public function cases(){

    	return $this->belongsTo(CaseIncedent::class);
    	
    }
}
