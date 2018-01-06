@extends('master')



@section('body')




<div class="privacy about">
			<h3>Mes <span>Produits</span></h3>
			<i class="flaticon flaticon-jobi-favorite-outline icon-18 text-orange" ></i>
	      <div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Produit</th>
							
							<th>Désignation</th>
						
							<th>Prix</th>
                                                        <th>Categorie</th>
                                                        <th>Modifier</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
                                            @foreach($produits as $f)
                                            <tr class="rem1">
						<td class="invert">{{$loop->iteration}}</td>
						<td class="invert-image"><a href="single.html"><img src="../images/{{$f->image}}" alt=" " class="img-responsive"></a></td>
						
						<td class="invert">{{$f->designation}}</td>
						
						<td class="invert">{{$f->solde}}</td>
                                                <td class="invert">{{$f->categorie}}</td>
                                                <td class="invert">
                                                    <a href="{{url('articles/'.$f->id.'/edit')}}"><span class="label label-success">Modifier</span></a>
                                                </td>
						<td class="invert">
							<div class="rem">
                                                            <a href="{{ url('supprimerProduit', ['id' => $f->id])}}">	<div class="close1"> </div> </a>
							</div>

						</td>
					</tr>
					
                                @endforeach
				</tbody></table>
				<br>
				<a href="{{url('ajoutprod')}}"><span class="label label-success">ajouter un produit</span></a>
			</div>
		
		</div>
@endsection