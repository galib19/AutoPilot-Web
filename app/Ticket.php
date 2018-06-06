<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'site_id', 'ticket_number', 'ticket_status', 'ticket_type', 'vendor_name', 
        'pg_owner', 'raised_time', 'assigned_engineer_id'
    ];
    
    public function user(){

    	return $this->belongsTo(User::class);
    	
    }

    public function site(){
    	return $this->belongsTo(Site::class);
    }

}
