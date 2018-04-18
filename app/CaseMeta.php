<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseMeta extends Model
{
	protected $fillable = [
	    'case_id', 'user_id', 'meta_key', 'meta_value',
	];

   	public function cases(){

   		return $this->belongsTo(CaseIncedent::class);
   		
   	}
}
