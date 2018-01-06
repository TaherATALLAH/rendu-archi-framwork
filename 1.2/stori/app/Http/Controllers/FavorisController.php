<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favori;
use App\Produit;
use Auth;
class FavorisController extends Controller
{
    //
    
    public function AjouterFavoris($id) {
        
     $produit = Produit::find($id);
    //$user = Auth::user();
    $user = Auth::guard('user')->user();
    $favoris = Favori::where('user_id', $user->id)->where('produit_id', $id)->first();
    if ($favoris=== null) {
        $produit->usersfavoris()->attach($user);
        }
        return redirect()->action('ProduitController@produits');
}


public function MesFavoris() {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $favoris = Favori::where('user_id', $user->id)->leftjoin('produits', 'favoris.produit_id', '=', 'produits.id')
            ->get();
            $countfavoris = Favori::where('user_id', $user->id)->leftjoin('produits', 'favoris.produit_id', '=', 'produits.id')
            ->count();
            //$panier = Panier::where('user_id', $user->id)->get();
            //dd($panier);
            return view ('mesfavoris' , ['favoris' => $favoris,'countfavoris'=>$countfavoris]);
        }
     
        
            public function SupprimerFavoris($id) {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $favoris = Favori::where('user_id', $user->id)->where('produit_id', $id)->delete();
            
            return redirect()->action('FavorisController@MesFavoris');
        }

}
