<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
use App\Commentaire;
use App\Evaluation;
use Auth;

class ProduitController extends Controller
{
    //
    
     
    
       public function produits(){
	
        $produits= Produit::all();
       return view ('index' , compact('produits'));
	 
	
	}
    
        public function ChercherProduit(Request $request){
        $search=$request->get('produit');
	$produits=Produit::where('designation', 'LIKE', "%$search%")->get();
        
       return view ('index' , compact('produits'));
	 
	
	}
        
        
          public function details($id) {
            $produit = Produit::find($id);
            $listcomment = Commentaire::all()->where('produit_id',$id);
            $listevaluation = Evaluation::all()->where('produit_id',$id);
        return view('details', ['commentaires' => $listcomment, 'evaluations' =>$listevaluation, 'produit'=>$produit]);
        }
        
        
         public function ProduitByCategorie($categorie){
        
	$produits=Produit::where('categorie', $categorie)->get();
        
       return view ('categorie' , compact('produits'));
	 
	
	}
}
