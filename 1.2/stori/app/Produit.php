<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $table = 'produits';
    protected $fillable = [
        'designation','description', 'prix',
        'solde','quantite','image'
    ];

        public $timestamps = true;
    
    
        public function vendeur() {
        return $this->belongsTo('App\Vendeur', 'vendeur_id');
    }
    
   public function users() {
   return $this->belongsToMany('App\User','paniers','produit_id', 'user_id')->withTimestamps();
    }
    public function usersfavoris() {
   return $this->belongsToMany('App\User','favoris','produit_id', 'user_id')->withTimestamps();
    }
}
