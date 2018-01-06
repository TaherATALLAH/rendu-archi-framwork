<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','prenom', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
    
    public function produits() {
   return $this->belongsToMany('App\Produit','paniers', 'produit_id','user_id')->withPivot('quantite')->withTimestamps();
    }
    
     public function produitsfavori() {
   return $this->belongsToMany('App\Produit','favoris ', 'produit_id','user_id')->withTimestamps();
    }

    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }

     public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }
}
