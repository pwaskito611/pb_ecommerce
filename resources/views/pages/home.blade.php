@extends('layouts.user')

@section('content')
<style>
.red {
  height: 25px;
  width: 25px;
  background-color: #ff0000;
  border-radius: 50%;
  display: inline-block;
}

.orange {
  height: 25px;
  width: 25px;
  background-color: #ff6600;
  border-radius: 50%;
  display: inline-block;
}

.yellow {
  height: 25px;
  width: 25px;
  background-color:  #ffff00;
  border-radius: 50%;
  display: inline-block;
}

.green {
  height: 25px;
  width: 25px;
  background-color:  #009933;
  border-radius: 50%;
  display: inline-block;
}

.blue {
  height: 25px;
  width: 25px;
  background-color: #3333cc;
  border-radius: 50%;
  display: inline-block;
}

.purple {
  height: 25px;
  width: 25px;
  background-color: #6600cc;
  border-radius: 50%;
  display: inline-block;
}

.pink {
  height: 25px;
  width: 25px;
  background-color:   #ff1a75;
  border-radius: 50%;
  display: inline-block;
}

.white {
  height: 25px;
  width: 25px;
  background-color:  #fff;
  border-radius: 50%;
  display: inline-block;
}

.black {
  height: 25px;
  width: 25px;
  background-color:  #000;
  border-radius: 50%;
  display: inline-block;
}
</style>

<!-- banner -->
<div class="banner">
		<div class="container">
			<h3>Electronic Store, <span>Special Offers</span></h3>
		</div>
	</div>
	<!-- //banner --> 
	<!-- modal-video -->
	@php($i = 1)
	@foreach($items as $item)
	<div class="modal video-modal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModal{{$i}}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="{{$item->itemImage[0]->image_url}}" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>{{$item->title}}</h4>
							<p>{{$item->description}}</p>
							<div class="rating">
							@php($rating = 0)
							@php($total = 0)

							@foreach($item->review as $review)
								<?php
								$rating = $rating + $review->rate;
								$total++;
								?>
							@endforeach
								@if($total != 0)
								<p>{{$rating/$total}}({{$total}})</p>
								@else 
								<p>{{0/5}}(0)</p>
								@endif
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
							@if($item->discount)
							<p><span>${{$item->price}}</span> <i class="item_price">${{$item->price - ($item->price * $item->discount / 100)}}</i></p>
							@else
							<p><i class="item_price">${{$item->price}}</i></p>
							@endif
							

							@if(Auth::check() && sizeof($item->chart) > 0)

								@php($limit = sizeof($item->chart))
								@php($j = 0)

								@foreach($item->chart as $chart)
									@php($j++)

									@if($chart->user_id == Auth::user()->id)
									<form action="{{route('delete-chart')}}" method="post">
										@csrf
										@method('delete')
										<input type="hidden" name="item_id" value="{{$chart->id}}">  
										<button type="submit" class="w3ls-cart">Delete from cart</button>
									</form>
										@break
									@endif 

									@if($j == $limit  && $chart->user_id != Auth::user() )
									<form action="{{route('create-chart')}}" method="post">
										@csrf
										<input type="hidden" name="item_id" value="{{$item->id}}">  
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
									@endif 

								@endforeach

								@else 
								<form action="{{route('create-chart')}}" method="post">
								@csrf
								<input type="hidden" name="item_id" value="{{$item->id}}">  
								<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
								@endif								

							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
								@foreach($item->itemColor as $c) 
								@if($c->color == 'red') 
									<li><span class="red"></span></li>
								@endif

								@if($c->color == 'orange') 
									<li><span class="orange"></span></li>
								@endif

								@if($c->color == 'yellow') 
									<li><span class="yellow"></span></li>
								@endif

								@if($c->color== 'green') 
									<li><span class="green"></span></li>
								@endif
								
								@if($c->color == 'blue') 
									<li><span class="blue"></span></li>
								@endif

								@if($c->color == 'purple') 
									<li><span class="purple"></span></li>
								@endif

								@if($c->color == 'white') 
									<li><span class="white"></span></li>
								@endif

								@if($c->color == 'black')
									<li><span class="black"></span></li>
								@endif

								@if($c->color == 'pink')
									<li><span class="pink"></span></li>
								@endif

							@endforeach
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	@php($i++)
	@endforeach
	<!-- //modal-video -->
	<!-- banner-bottom1 -->
	<div class="banner-bottom1">
		<div class="agileinfo_banner_bottom1_grids">
			<div class="col-md-7 agileinfo_banner_bottom1_grid_left">
				<h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
				<a href="#">Shop Now</a>
			</div>
			<div class="col-md-5 agileinfo_banner_bottom1_grid_right">
				<h4>hot deal</h4>
				<div class="timer_wrap">
					<div id="counter"> </div>
				</div>
				<script src="frontend/js/jquery.countdown.js"></script>
				<script src="frontend/js/script.js"></script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner-bottom1 --> 
	<!-- special-deals -->
	<div class="special-deals">
		<div class="container">
			<h2>Special Deals</h2>
			<div class="w3agile_special_deals_grids">
				<div class="col-md-7 w3agile_special_deals_grid_left">
					<div class="w3agile_special_deals_grid_left_grid">
						<img src="frontend/images/21.jpg" alt=" " class="img-responsive" />
						<div class="w3agile_special_deals_grid_left_grid_pos1">
							<h5>30%<span>Off/-</span></h5>
						</div>  
						<div class="w3agile_special_deals_grid_left_grid_pos">
							<h4>We Offer <span>Best Products</span></h4>
						</div>
					</div>
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="frontend/images/t1.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Laura</h4>
									</div>
								</div> 
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="frontend/images/t2.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Michael</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="frontend/images/t3.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Rosy</h4>
									</div>
								</div>
							</article>
						</div>
					</div>
						<script src="frontend/js/jquery.wmuSlider.js"></script> 
						<script>
							$('.example1').wmuSlider();         
						</script> 
				</div>
				<div class="col-md-5 w3agile_special_deals_grid_right">
					<img src="frontend/images/20.jpg" alt=" " class="img-responsive" />
					<div class="w3agile_special_deals_grid_right_pos">
						<h4>Women's <span>Special</span></h4>
						<h5>save up <span>to</span> 30%</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //special-deals -->
	<!-- new-products -->
	<div class="new-products">
		<div class="container">
			<h3>New Products</h3>
			<div class="agileinfo_new_products_grids">
			@php($i = 1)
				@foreach($items as $item)
				<div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							@foreach($item->itemImage as $image)
							<img src="{{$image->image_url}}" alt=" " class="img-responsive" />
							@endforeach
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal{{$i}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="{{url('detail?id='. $item->id)}}">{{$item->title}}</a></h5>
						<div class="simpleCart_shelfItem">
							@if($item->discount)
							<p><span>${{$item->price}}</span> <i class="item_price">${{$item->price - ($item->price * $item->discount / 100)}}</i></p>
							@else
							<p><i class="item_price">${{$item->price}}</i></p>
							@endif


							@if(Auth::check() && sizeof($item->chart) > 0)

								@php($limit = sizeof($item->chart))
								@php($j = 0)

								@foreach($item->chart as $chart)
									@php($j++)

									@if($chart->user_id == Auth::user()->id)
									<form action="{{route('delete-chart')}}" method="post">
										@csrf
										@method('delete')
										<input type="hidden" name="item_id" value="{{$chart->id}}">  
										<button type="submit" class="w3ls-cart">Delete from cart</button>
									</form>
										@break
									@endif 

									@if($j == $limit  && $chart->user_id != Auth::user() )
									<form action="{{route('create-chart')}}" method="post">
										@csrf
										<input type="hidden" name="item_id" value="{{$item->id}}">  
										<button type="submit" class="w3ls-cart">Add to cart</button>
									</form>
									@endif 

								@endforeach
								
							@else 
							<form action="{{route('create-chart')}}" method="post">
							@csrf
							<input type="hidden" name="item_id" value="{{$item->id}}">  
							<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
							@endif



						</div>
					</div>
				</div> 
				@php($i++)
				@endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //new-products -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			
					<li>
						<img src="frontend/images/tb1.jpg" alt="ss" class="img-responsive" />
					</li>
					<li>
						<img src="frontend/images/tb2.jpg" alt="ss" class="img-responsive" />
					</li>
					<li>
						<img src="frontend/images/tb3.jpg" alt="ss" class="img-responsive" />
					</li>
					<li>
						<img src="frontend/images/tb4.jpg" alt="ss" class="img-responsive" />
					</li>
					<li>
						<img src="frontend/images/tb5.jpg" alt="ss" class="img-responsive" />
					</li>
				</ul>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="frontend/js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 
@endsection