<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commentaire;
use Auth;

class CommentaireController extends Controller
{
     public function index(){
 		$listcomment = Commentaire::all();
        return view('index', ['commentaires' => $listcomment]);
 	
 	}

 	public function store(Request $request){
 		$commentaire = new Commentaire();

 		$commentaire -> commentaire = $request->input('commentaire');
 		$user = Auth::guard('user')->user();
 		$produit_id = $request->input('produit');
 		$commentaire-> produit_id=$produit_id;
 		$commentaire -> user_id = $user->id; 
 		$commentaire-> save();

 		return redirect('index');
 	}
}
