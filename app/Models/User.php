<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class);
    }

    public function primes()
    {
        return $this->belongsToMany(\App\Models\Prime::class);
    } 

    public function lastPointage()
    {
        return $this->hasOne(\App\Models\Pointage::class,'id','pointage_id');
    }

    public function poste()
    {
        return $this->hasOne(\App\Models\Poste::class,'id','poste_id');
    } 

    public function responsablePointage()
    {
        return $this->hasOne(\App\Models\User::class,'id','responsablepointage_id');
    }

    public function entite()
    {
        return $this->hasOne(\App\Models\Entite::class,'id','entite_id');
    }

    public function pointages()
    {
        return $this->hasMany(\App\Models\Pointage::class);
    }

    public function listevalisationpointage()
    {
        return $this->hasMany(\App\Models\Listevalidation::class);
    }

    public function listeresponsablesevaluation()
    {
        return $this->hasMany(\App\Models\Listeresponsablesevaluation::class);
    }
}
