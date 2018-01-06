
@extends('master')

@section('script')

<script src="{{asset('js/okzoom.js') }}"></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>
  
  @endsection
@section('container')

@endsection




@section('body')



			
			<div class="agileinfo_single">
				<h5>{{$produit->designation}}</h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="../images/{{$produit->image}}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<form class="starRating" action="{{url('evaluations')}}" method="post" id="addStar">
							 {{ csrf_field()}}
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
							<input type="hidden" name="produit" value="{{$produit->id}}" />
						</form>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$produit->description}}.</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>{{$produit->solde}}<span>{{$produit->produit}}</span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="pulao basmati rice" />
									<input type="hidden" name="amount" value="21.00" />
									<input type="hidden" name="discount_amount" value="1.00" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<input type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
            
            <div class="form">
                    <form action="{{url('commentaires')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}
				<input type="hidden" name="produit" value="{{$produit->id}}" />
  
                <div class="panel-body">
                   
                       <div>
                           <h4><FONT color="red">Ecrire votre commentaire ici ..</h4>
                           <textarea name="commentaire" class="form-control" ></textarea> 
                       </div>
                    <br> <div class="snipcart-details agileinfo_single_right_details">
                      <fieldset>
                       <input type="submit" value="Valider" class="button">
                   </fieldset>
               </div>
        <div class="grid_3 grid_5">
        <table class="table">
            
            <tbody>
                @foreach($commentaires as $commentaire)
                
                <tr>
                	
                    <td><div class="well"><b><FONT color="green">{{ $commentaire ->user -> name }}</FONT></b><br>
                    {{$commentaire->commentaire}} </div></td><br>
                	
                </tr>
				
                @endforeach
            </tbody>

         </table>
    </div>
                </div>
            

</form>
</div>
<script type="text/javascript">
  $('#addStar').change('.star', function(e) {
  $(this).submit();
  });
</script>
            @endsection