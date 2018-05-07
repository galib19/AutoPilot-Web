<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password', 'active', 'available', 'eta', 'ert'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function cases(){
    	return $this->hasMany(CaseIncedent::class, 'user_id');
    }

    public function usermeta(){
    	return $this->hasMany(UserMeta::class, 'user_id');
    }


    public function casevictim()
    {
        return $this->hasManyThrough(CaseVictim::class, CaseIncedent::class);
    }


    public function casecomment(){
    	return $this->hasMany(CaseComment::class, 'user_id');
    }

    // public function userrole(){
    // 	return $this->hasManyThrough(Role::class, 'user_id');
    // }

}
