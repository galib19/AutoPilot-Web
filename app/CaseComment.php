<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseComment extends Model
{
    protected $fillable = [
        'case_id', 'user_id', 'comment_content',
    ];


    public function cases(){

    	return $this->belongsTo(CaseIncedent::class);
    	
    }


    public function user(){

    	return $this->belongsTo(User::class);
    	
    }

    public function usermeta(){

    	return $this->hasMany(UserMeta::class, 'user_id');
    	
    }

}
