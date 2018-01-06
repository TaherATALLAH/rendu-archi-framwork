@extends('master')
	
@section('body')
<div>
 <form role="form" method="POST" action="{{url('articles/'.$produit->id)}}" enctype="multipart/form-data">
 	 <input type="hidden" name="_method" value="PUT">
                                            {{ csrf_field() }}
                                            <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input type="text" id="designation"  name="designation" placeholder="designation" value="{{$produit -> designation}}" required=" " class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                             <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="description" type="textarea"  name="description" placeholder="description" value="{{$produit -> description}}" required=" " class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                            <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="prix" type="number"  name="prix" placeholder="prix" value="{{$produit -> prix}}" required=" " class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                         <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="solde" type="number"  name="solde" placeholder="solde" value="{{$produit -> solde}}" required=" " class="form-control"  aria-describedby="sizing-addon2">
			</div>    
                                                 <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="quantite" type="quantite"  name="quantite" placeholder="quantite" value="{{$produit -> prix}}" required=" " class="form-control"  aria-describedby="sizing-addon2">
			</div>  
                                            <div class="input-group">
                                            <span class="input-group-addon" id="sizing-addon2">Catégorie</span>
                                            <select class="form-control" aria-describedby="sizing-addon2" name="categorie">
                                                <option>Cuisine</option>
                                                <option>Boissons</option>
                                                <option>Relish</option>
                                            </select>
                                            </div>
                                            
                                            <input type="file"  name="image">
                                            <br>
                                                <input type="submit"  value="Modifier">
                                   
			    
                                           
					</form>
    
</div>
@endsection