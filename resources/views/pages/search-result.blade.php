@extends('layouts.user')

@section('content')

<!--style for dropdown orderby -->
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

.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>


	<!-- banner -->
	<div class="banner banner2">
		<div class="container">
			<h2>Top Selling <span>Gadgets</span> Flat <i>25% Discount</i></h2> 
		</div>
	</div> 
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Result for "{{empty($search) ? $category : $search}}"</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- mobiles -->
	<div class="mobiles">
		<div class="container"> 
			<div class="w3ls_mobiles_grids">
				<div class="col-md-4 w3ls_mobiles_grid_left">
					<div class="w3ls_mobiles_grid_left_grid">
						<h3>Categories</h3>
						<div class="w3ls_mobiles_grid_left_grid_sub">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
								  <h4 class="panel-title asd">
									<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>New Arrivals
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								  <div class="panel-body panel_text">
									<ul>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=mobile'}}">Mobiles</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=laptop'}}">Laptop</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=tv'}}">Tv</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=wearable'}}">Wearables</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=refrigator'}}">Refrigerator</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Accessories
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								   <div class="panel-body panel_text">
									<ul>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=grinder'}}">Grinder</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=heater'}}">Heater</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=kids+toys'}}">Kid's Toys</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=filters'}}">Filters</a></li>
										<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&category=ac'}}">AC</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
							<ul class="panel_bottom">
								<li><a href="#">Summer Store</a></li>
								<li><a href="#">Featured Brands</a></li>
								<li><a href="#">Today's Deals</a></li>
								<li><a href="#">Latest Watches</a></li>
							</ul>
						</div>
					</div>
		
					<div class="w3ls_mobiles_grid_left_grid">
						<h3>Price</h3>
						<div class="w3ls_mobiles_grid_left_grid_sub">
							<div class="ecommerce_color ecommerce_size">
								<ul>
									<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&price=0-100' . '&orderBy='. $orderBy . '&category='.$category}}">Below $ 100</a></li>
									<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&price=100-500' . '&orderBy='. $orderBy. '&category='.$category}}">$100-500</a></li> 
									<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&price=1000-10000' . '&orderBy='. $orderBy. '&category='.$category}}">$1k-10k</a></li>
									<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&price=10000-20000' . '&orderBy='. $orderBy. '&category='.$category}}">$10k-20k</a></li>
									<li><a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&price=20000-9999999' . '&orderBy='. $orderBy. '&category='.$category}}">Above 20k</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 w3ls_mobiles_grid_right">
					<div class="col-md-6 w3ls_mobiles_grid_right_left">
						<div class="w3ls_mobiles_grid_right_grid1">
							<img src="frontend/images/48.jpg" alt=" " class="img-responsive" />
							<div class="w3ls_mobiles_grid_right_grid1_pos1">
								<h3>Attractive<span> New</span> Wrist Watches</h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 w3ls_mobiles_grid_right_left">
						<div class="w3ls_mobiles_grid_right_grid1">
							<img src="frontend/images/49.jpg" alt=" " class="img-responsive" />
							<div class="w3ls_mobiles_grid_right_grid1_pos"> 
								<h3>Best Prices On<span> Laptop</span>Upto 50% Off</h3>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>

					<div class="w3ls_mobiles_grid_right_grid2">
						<div class="w3ls_mobiles_grid_right_grid2_left">
							<h3>Showing Results: {{$items->count()}}-{{$items->total()}}</h3>
						</div>
						<div class="w3ls_mobiles_grid_right_grid2_right">
							<div class="dropup">
 								<button onclick="myFunction()" class="dropbtn">Sorting</button>
								  <div id="myDropdown" class="dropdown-content" style="
								   z-index: 99999999;
								   position: absolute;;
								  ">
								    <a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=Default'}}">Default sort</a>
									<a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=LowToHigh'}}">Low to high price sort</a>
									<a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=HighToLow'}}">High to low sort</a>
									<a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=Newness'}}">Newness sort</a>
									<a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=Popular'}}">Popular sort</a>
									<a href="{{url()->current() . '?_token='.  csrf_token() . '&search='. $search .'&category='.$category. '&price='. $price .'&orderBy=Rating'}}">Rating sort</a>
								  </div>
								</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					@php($k=0)
					@forelse($items as $i)
					@php($k++)
					<div class="w3ls_mobiles_grid_right_grid3 ">
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
							<div class="agile_ecommerce_tab_left mobiles_grid">
								<div class="hs-wrapper hs-wrapper2">
									@foreach($i->itemImage as $image)
											<img src="{{$image->image_url}}" alt="item image" class="img-responsive" />
									@endforeach
									<div class="w3_hs_bottom w3_hs_bottom_sub1">
										<ul>
											<li>
												<a href="#" data-toggle="modal" data-target="#myModal{{$i->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>  
								<h5><a href="{{url('detail?id='. $i->id)}}">{{$i->title}}</a></h5> 
								<div class="simpleCart_shelfItem">
									@if($i->discount != 0)
									<p><span>${{$i->price}}</span> <i class="item_price">${{$i->price - (($i->price * $i->discount ) / $i->price)}}</i></p>
									@else
									<p><i class="item_price">${{$i->price}}</i></p>
									@endif
									
									@php($limit = sizeof($i->chart))
									@php($j = 0)

									@if(Auth::check() && $limit > 0)
										@foreach($i->chart as $chart)
											@php($j++)

											@if($chart->user_id == Auth::user()->id)
										<form action="{{route('delete-chart')}}" method="post">
										@csrf 
										@method('delete')
										<input type="hidden" name="chart_id" value="{{$chart->id}}">
										<button type="submit" class="w3ls-cart">
											Remove from cart
										</button>
									</form>
											@break
											@endif

											@if($j == $limit && $chart->user_id != Auth::user()->id)
											<form action="{{route('create-chart')}}" method="post">
											@csrf
										<input type="hidden" name="item_id" value="{{$i->id}}">
										<button type="submit" class="w3ls-cart">
											Add to cart
										</button>
									</form>
											@endif

										@endforeach
									@else
									<form action="{{route('create-chart')}}" method="post">
									@csrf
										<input type="hidden" name="item_id" value="{{$i->id}}">
										<button type="submit" class="w3ls-cart">
											Add to cart
										</button>
									</form>
									@endif 
								</div> 
							</div>
							@if($k % 3 == 0)
							<div class="clearfix"><br> </div>
							@endif
						</div>
						</div>
						@empty
						<center>
							<h3>Sorry, the results you are looking for do not exist</h3>
						</center>
					
				</div>
				@endforelse
				<center>{{$items->links()}}</center>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> 
	@foreach($items as $i)
	<div class="modal video-modal fade" id="myModal{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal9">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="{{$i->itemImage[0]->image_url}}" alt=" " class="img-responsive" 
							style="z-index : 10;"/>
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>{{$i->title}}</h4>
							<p>{{$i->description}}</p>
							<div class="rating">
								@php($rating = 0)
								@php($total = 0)
								@foreach($i->review as $review)
									@php($rating = $rating + $review->rate)
									@php($total++)
								@endforeach
								@if($total != 0)
								<p>rating : {{$rating/$total}}/5 ({{$total}})</p>
								@else
								<p>rating : 0/5 (0)</p>
								@endif
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								@if($i->discount == 0)
								<p><i class="item_price">${{$i->price}}</i></p>
								@else 
								<p><span>${{$i->price}}</span> <i class="item_price">${{$i->price - (($i->price * $i->discount ) / $i->price)}}</i></p>
								@endif
								@php($limit = sizeof($i->chart))
									@php($j = 0)

									@if(Auth::check() && $limit > 0)
										@foreach($i->chart as $chart)
											@php($j++)

											@if($chart->user_id == Auth::user()->id)
										<form action="{{route('delete-chart')}}" method="post">
										@csrf 
										@method('delete')
										<input type="hidden" name="chart_id" value="{{$chart->id}}">
										<button type="submit" class="w3ls-cart">
											Remove from cart
										</button>
									</form>
											@break
											@endif

											@if($j == $limit && $chart->user_id != Auth::user()->id)
											<form action="{{route('create-chart')}}" method="post">
											@csrf
										<input type="hidden" name="item_id" value="{{$i->id}}">
										<button type="submit" class="w3ls-cart">
											Add to cart
										</button>
									</form>
											@endif

										@endforeach
									@else
									<form action="{{route('create-chart')}}" method="post">
									@csrf
										<input type="hidden" name="item_id" value="{{$i->id}}">
										<button type="submit" class="w3ls-cart">
											Add to cart
										</button>
									</form>
									@endif 
							</div> 	
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
							@foreach($i->itemColor as $c) 
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
								}
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
	@endforeach
<br>
<br>	
<!--js for dropdown orderby-->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

@endsection