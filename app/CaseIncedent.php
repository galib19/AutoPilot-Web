<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseIncedent extends Model
{
    protected $fillable = [
        'case_title', 'case_details', 'case_status', 'case_type', 'action_taken', 'incident_date',
    ];


    public function user(){

    	return $this->belongsTo(User::class);
    	
    }

    public function casemeta(){
    	return $this->hasMany(CaseMeta::class, 'case_id');
    }


    public function casevictim(){
    	return $this->hasMany(CaseVictim::class, 'case_id');
    }


    public function casecomment(){
    	return $this->hasMany(CaseComment::class, 'case_id');
    }

}
