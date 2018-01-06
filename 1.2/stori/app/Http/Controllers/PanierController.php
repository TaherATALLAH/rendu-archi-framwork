<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Panier;
use Auth;
class PanierController extends Controller
{
    //
    
        public function __construct()
        {
        $this->middleware('user');
        }
   
    public function AjouterPanier(Request $request) {
        
     $produit = Produit::find($request->get('idProduit'));
    $quantite = 1;
    //$user = Auth::user();
    $user = Auth::guard('user')->user();
    $panier = Panier::where('user_id', $user->id)->where('produit_id', $request->get('idProduit'))->first();
    if ($panier=== null) {
        $produit->users()->attach($user, ["quantites" => $quantite]);
        }else{
           $panier->quantites=($panier->quantites)+1;
           $panier->save();
        }
      
    
    return redirect()->action('ProduitController@produits');
}


    public function AjouterPaniers($id) {
        
     $produit = Produit::find($id);
     $quantite = 1;
    //$user = Auth::user();
    $user = Auth::guard('user')->user();
    $panier = Panier::where('user_id', $user->id)->where('produit_id', $id)->first();
    if ($panier=== null) {
        $produit->users()->attach($user, ["quantites" => $quantite]);
        }else{
           $panier->quantites=($panier->quantites)+1;
           $panier->save();
        }
      
    
    return redirect()->action('ProduitController@produits');
}
    
        public function MonPanier() {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $panier = Panier::where('user_id', $user->id)->leftjoin('produits', 'paniers.produit_id', '=', 'produits.id')
            ->get();
            $countpanier = Panier::where('user_id', $user->id)->leftjoin('produits', 'paniers.produit_id', '=', 'produits.id')
            ->count();
            //$panier = Panier::where('user_id', $user->id)->get();
            //dd($panier);
            return view ('monPanier' , ['panier' => $panier,'countpanier'=>$countpanier]);
        }
        
         public function AjouterQuant($id) {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $paniers = Panier::where('user_id', $user->id)->where('produit_id', $id)->first();
            $paniers->quantites=($paniers->quantites)+1;
            $paniers->save();
            $panier = Panier::where('user_id', $user->id)->leftjoin('produits', 'paniers.produit_id', '=', 'produits.id')
            ->get();
            return redirect()->action('PanierController@MonPanier');
        }
        
           public function SousQuant($id) {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $paniers = Panier::where('user_id', $user->id)->where('produit_id', $id)->first();
            if (($paniers->quantites)>1){
            $paniers->quantites=($paniers->quantites)-1;
            $paniers->save();
            }
            return redirect()->action('PanierController@MonPanier');
        }
        
        
            public function SupprimerPanier($id) {
            $user = Auth::user();
            $user = Auth::guard('user')->user();
            $paniers = Panier::where('user_id', $user->id)->where('produit_id', $id)->delete();
            
            return redirect()->action('PanierController@MonPanier');
        }
}
