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

<!-- breadcrumbs -->
<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>{{$item->title}}</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						@foreach($item->itemImage as $image)
						<li data-thumb="{{$image->image_url}}">
							<div class="thumb-image"> 
								<img src="{{$image->image_url}}" data-imagezoom="true" class="img-responsive" alt=""> 
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="frontend/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="frontend/css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="frontend/js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3>{{$item->title}}</h3>
				<div class="rating1">
					<span class="rating">
					@php($rating = 0)
					@php($total = 0)
					@foreach($item->review as $review)
						@php($rating = $rating + $review->rate)
						@php($total++)
					@endforeach
					@if($total != 0)
					<p>rating : {{$rating/$total}}/5 ({{$total}})</p>
					@else
					<p>rating : 0/5 (0)</p>
					@endif
					</span>
				</div>
				<div class="description">
					<h5><i>Description</i></h5>
					<p>{{$item->description}}</p>
				</div>
				<div class="color-quality">
					<div class="color-quality-left">
						<h5>Color : </h5>
						<ul>
							@foreach($color as $c) 
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
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
				@if($item->discount == 0)
				<p><i class="item_price">${{$item->price}}</i></p>
				@else 
				<p><span>${{$item->price}}</span> <i class="item_price">${{$item->price - (($item->price * $item->discount ) / $item->price)}}</i></p>
				@endif
					@if($chart !== null)
						<form action="{{route('delete-chart')}}" method="post">
						@csrf 
						@method('delete')
							<input type="hidden" name="item_id" value="{{$chart->item_id}}">
							<button type="submit" class="w3ls-cart">
								Remove from cart
							</button>
						</form>
					@else
						<form action="{{route('create-chart')}}" method="post">
						@csrf
							<input type="hidden" name="item_id" value="{{$item->id}}">
							<button type="submit" class="w3ls-cart">
								Add to cart
							</button>
						</form>
					@endif
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3>{{$item->title}}</h3>
						<p>{{$item->information}}</p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<h4>({{$reviews->total()}}) Reviews</h4>
						@foreach($reviews as $review)
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="{{'/storage/'. $review['user']->profile_photo_path}}" alt=" " 
								class="img-responsive" style=" border-radius: 50%;" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">{{$review['user']->name}}</a>
									<h5>{{$review->created_at}}</h5>
									<p>{{$review->comments}}</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
									<p>{{$review->rate}}/5</p>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						@endforeach
						<center>{{$reviews->links()}}</center>
						@if($isPurchased !== null)
						<div class="review_grids">
							<h5>Add A Review</h5> 
							
							<form action="{{route('post-review')}}" method="post">
							@csrf
							<input type="hidden" name="item_id" value="{{$item->id}}">
								<h4>Rate : </h4>
								<div class="row">
								<label for="1">1</label>
								<input type="radio" name="rate" id="1" value="1">
								<label for="2">2</label>
								<input type="radio" name="rate" id="2" value="2">
								<label for="3">3</label>
								<input type="radio" name="rate" id="3" value="3">
								<label for="4">4</label>
								<input type="radio" name="rate" id="4" value="4">
								<label for="5">5</label>
								<input type="radio" name="rate" id="5" value="5">
								</div>
								<br>
								<textarea name="comments" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input type="submit" value="Submit" >
							</form>
						</div>
						@endif
					</div> 			        					            	      
				</div>	
			</div>
			<script src="/frontend/js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>  
	<!-- //single -->




@endsection