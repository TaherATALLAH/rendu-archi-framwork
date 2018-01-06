<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
use Auth;


class VendeurController extends Controller
{
public function ajouterProd(Request $request)
    {   
	$produit = new Produit();
        $produit->designation = $request->get('designation');
        $produit->description = $request->get('description');
        $produit->prix = $request->get('prix');
        $produit->solde = $request->get('solde');
        $produit->quantite = $request->get('quantite');
        $produit->categorie = $request->get('categorie');
        $produit->image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(
            base_path() . '/public/images/',$produit->image
        );
        $vendeur = Auth::guard('vendeur')->user();
        $produit->vendeur()->associate($vendeur);
        $produit->save();
        $produits= Produit::all();
      // return view ('index' , compact('produits'));
       return view ('mesproduits' , compact('produits'));


    }
    
    
    public function getProductVendeur(){
            $vendeur = Auth::guard('vendeur')->user();
            $produits = Produit::where('vendeur_id', $vendeur->id)->get();
            
            return view ('mesproduits' , ['produits' => $produits]);
    }
    
     public function supprimerProduit($id) {
            $produit = Produit::find($id)->delete();
            
            return redirect()->action('VendeurController@getProductVendeur');
        }
    
 //récuperer un article puis de le mettre dans le form
    public function edit($id){
        $produit = Produit::find($id);
        return view('modifierProduit', ['produit' => $produit]);
    }
    
     //permet de modifier un article
    public function update(Request $request, $id){
    $produit = Produit::find($id);
    $produit->designation = $request->get('designation');
        $produit->description = $request->get('description');
        $produit->prix = $request->get('prix');
        $produit->solde = $request->get('solde');
        $produit->quantite = $request->get('quantite');
        $produit->categorie = $request->get('categorie');
        $produit->image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(
            base_path() . '/public/images/',$produit->image
        );

        $produit -> save();

        return redirect('mesproduits');
    }

    
    
}