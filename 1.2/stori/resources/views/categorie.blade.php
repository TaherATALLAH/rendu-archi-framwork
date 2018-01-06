@extends('master')
@section('container')

@endsection

@section('banner')
<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Achetez">Achetez</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>jusqu'à <i>50%</i>réduction.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
                        <link href="{{asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen" property="">

				<script src="{{asset('js/jquery.flexslider.js') }}" type="text/javascript"></script>

				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
@endsection

@section('body')


	<div class="top-brands">
		<div class="container">
			<h3>Hot Offers</h3>
			<div class="agile_top_brands_grids">
                            @foreach($produits as $produit)
                           
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
                                                                         
										<div class="snipcart-thumb">
											<a href="{{ url('details', ['id' => $produit->id])}}"><img title=" " alt=" " src="{{asset('images/'.$produit->image) }}" /></a>		
											<p>{{$produit->designation}}</p>
											<h4>${{$produit->solde}} <span>${{$produit->prix}}</span></h4>
                                                                                        <a href="{{ url('favoris', ['id' => $produit->id])}}">
                                                                                        <img title=" " alt=" " src="{{asset('images/heart.png') }}" />
                                                                                        </a>
										</div>
										<div class="snipcart-details">
											<form action="{{ url('/ajouterPanier') }}" method="post">
                                                                                            {{ csrf_field() }}
												<fieldset>
													<input type="hidden" name="idProduit" value="{{$produit->id}}" />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
			@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


@endsection
