<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'email',
        'prenom' ,
        'compteur',
        'abonnement',
        'client',
        'type',
        'cin',
        'telephone',
        'ville',
        'rue',
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

    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function consommation()
    {
        return $this->hasMany(Consommation::class);
    }
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function aide()
    {
        return $this->hasMany(Aide::class);
    }


}
