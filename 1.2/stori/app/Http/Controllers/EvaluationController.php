<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Auth;

class EvaluationController extends Controller
{
    public function index(){
 		$listeval = Evaluation::all();
        return view('index', ['evaluations' => $listeval]);
    }

    public function store(Request $request){
 		$evaluation = new Evaluation();

 		$evaluation -> evaluation = $request->input('rating');
 		$user = Auth::guard('user')->user();
 		$produit_id = $request->input('produit');
 		$evaluation-> produit_id =$produit_id;
 		$evaluation -> user_id = $user->id; 
 		$evaluation-> save();
 	
 		return redirect()->back();
 	}
}
