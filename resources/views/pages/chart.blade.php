@extends('layouts.user')


@section('content')
<div class="container">
<br>
@csrf 

<br><br><br>
<center>
<div  class="d-none d-sm-block" >
<table>
	<tr>
		<th>
		<form action="{{route('order-detail')}}" method="get">
			<button type="submit" class="btn btn-info"
				style="padding-right: 100px;
				padding-left: 100px;
				padding-top : 20px;
				padding-bottom : 20px;
				font-size : 20px"   
				 >
 				Buy now
			</button>
		</form>
		</th>
		<th>
		<form action="{{route('delete-all-chart')}}" method="post">
			@csrf
			@method('delete')
				<button type="submit" class="btn btn-danger" 
				style="margin-left : 10px;
				padding-right: 40px;
				padding-left: 40px;
				padding-top : 20px;
				padding-bottom : 20px;
				font-size : 20px">
					Remove all from cart
				</button>
		</form>
		</th>
	</tr>
</table>
</div>

	
</center>
<br>
<br>
<br><br><br><br>
@php($k=0)
					@forelse($items as $i)
					@php($k++)
					<div class="column">
					<div class="w3ls_mobiles_grid_right_grid3 ">
						<div class="col-md-3 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles">
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
									<form action="{{route('delete-chart')}}" method="post">
									@csrf
									@method('delete')
										<input type="hidden" name="chart_id" value="{{$i->chart[0]->id}}">
										<button type="submit" class="w3ls-cart"style="margin-bottom: 20px!important;">
											Remove from cart
										</button>
									</form>
								</div> 
							</div>
						</div>
						</div>
						</div>
						@empty
						<center>
							<h3>Chart empty</h3>
						</center>
					
				</div>
				@endforelse
				<center>{{$items->links()}}</center>
				<div class="clearfix"> </div>
				<br><br><br>

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
							<img src="{{$i->itemImage[0]->image_url}}" alt=" " class="img-responsive" />
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
								<form action="{{route('delete-chart')}}" method="post">
									@csrf
									@method('delete')
										<input type="hidden" name="id" value="{{$i->chart[0]->id}}">
										<button type="submit" class="w3ls-cart">
											Remove from cart
										</button>
									</form>
							</div> 	
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span></a></li>
									<li><a href="#" class="brown"><span></span></a></li>
									<li><a href="#" class="purple"><span></span></a></li>
									<li><a href="#" class="gray"><span></span></a></li>
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
</div>
@endsection