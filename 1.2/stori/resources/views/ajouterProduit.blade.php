@extends('master')
	
@section('body')
<div>
 <form role="form" method="POST" action="{{ url('/ajouter') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input type="text" id="designation"  name="designation" placeholder="designation" class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                             <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="description" type="textarea"  name="description" placeholder="description" class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                            <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="prix" type="number"  name="prix" placeholder="prix" class="form-control"  aria-describedby="sizing-addon2">
			</div>
                                         <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="solde" type="number"  name="solde" placeholder="solde" class="form-control"  aria-describedby="sizing-addon2">
			</div>    
                                                 <div class="input-group">
				<span class="input-group-addon" id="sizing-addon2"></span>
				<input id="quantite" type="quantite"  name="quantite" placeholder="quantite" class="form-control"  aria-describedby="sizing-addon2">
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
                                                <input type="submit"  value="Ajouter">
                                   
			    
                                           
					</form>
    
</div>
@endsection