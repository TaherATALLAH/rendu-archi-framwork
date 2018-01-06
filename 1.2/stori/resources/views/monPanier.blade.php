@extends('master')
@section('container')

@endsection




@section('body')




<div class="privacy about">
			<h3>Mon <span>Panier</span></h3>
			<i class="flaticon flaticon-jobi-favorite-outline icon-18 text-orange" ></i>
	      <div class="checkout-right">
					<h4>Votre panier contient: <span>{{$countpanier}} Produits</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Produit</th>
							<th>Quantité</th>
							<th>Désignation</th>
						
							<th>Prix</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
                                            @foreach($panier as $p)
                                            <tr class="rem1">
						<td class="invert">{{$loop->iteration}}</td>
						<td class="invert-image"><a href="single.html"><img src="../images/{{$p->image}}" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
                                                                    <a href="{{ url('sousQuant', ['id' => $p->produit_id])}}"> <div class="entry value-minus"> &nbsp;</div></a>
									<div class="entry value"><span>{{$p->quantites}}</span></div>
									<a href="{{ url('ajouterQuant', ['id' => $p->produit_id])}}"><div class="entry value-plus active">&nbsp;</div></a>
								</div>
							</div>
						</td>
						<td class="invert">{{$p->designation}}</td>
						
						<td class="invert">{{$p->solde}}</td>
						<td class="invert">
							<div class="rem">
                                                            <a href="{{ url('supprimerPanier', ['id' => $p->produit_id])}}">	<div class="close1"> </div> </a>
							</div>

						</td>
					</tr>
					
                                @endforeach
				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>
						<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$84.00</span></li>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
														    <input class="form-control" type="text" placeholder="Mobile number">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" placeholder="Landmark">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City">
												</div>
													<div class="controls">
															<label class="control-label">Address type: </label>
												     <select class="form-control option-w3ls">
																							<option>Office</option>
																							<option>Home</option>
																							<option>Commercial</option>
							
																					</select>
													</div>
											</div>
											<button class="submit check_out">Delivery to this Address</button>
										</div>
									</section>
								</form>
									<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
@endsection