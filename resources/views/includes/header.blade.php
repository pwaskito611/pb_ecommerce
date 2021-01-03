<!-- header -->
<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
				@guest 
				<a href="{{url('/login')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
				@endguest
				@auth
				<a href="{{url('/user/profile')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
				@endauth
			</div>
			<div class="w3l_logo">
				<h1><a href="{{url('/')}}">Electronic Store<span>Your stores. Your place.</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="{{route('result')}}" method="get">
					@csrf
						<input type="hidden" name="orderBy" placeholder="hohoho" value="{{empty($request->orderBy) ? 'Default' : $request->orderBy}}" >
						<input type="text" name="search" placeholder="Search...">
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
			<div class="cart cart box_1"> 
				<form action="{{route('show-chart')}}" method="get" class="last"> 
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>   
			</div>  
		</div>
</div>
	<!-- //header -->