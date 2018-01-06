<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function produit() {
    	return $this->belongsTO('App\Produit');
    }
}
