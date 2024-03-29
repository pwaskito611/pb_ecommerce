@extends('layouts.admin')

@section('content')

@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        	</ul>
    	</div>
@endif
	<br>
	<a href="{{route('show-item')}}" class="btn btn-secondary">Back</a><br><br>

	<form action="{{route('store-item-image')}}" method="post"  enctype="multipart/form-data">
		@csrf 
		<div class="form-group choose-file d-inline-flex">
			<label for="image">Insert New Image</label>
			<input type="number" name="id" class="d-none" value="{{$id}}"> 
			<input type="file" name="image" class="form-control-file mt-2 pt-1" id="image">
			<input type="submit" value="submit" class="btn btn-info">
		</div>
	</form> 

	<table class="table table-responsive product-dashboard-table">
		<thead>
			<tr>
				<th>Image</th>
					<th class="text-center">Action</th>
				</tr>
		</thead>
                        
		@forelse($image as $i)
        <tr>
            <td>
                <img src="{{$i->image_url}}" alt="" style="max-width : 300px; height: auto;">
            </td>
            <td>
                @if(sizeof($image) > 1)
				<form action="{{route('delete-item-image')}}" method="post">
					@csrf 
					@method('delete')
					<input type="hidden" value="{{$i->id}}"  name="id">
					<input type="hidden" value="{{$id}}"  name="item_id">
					<button class="btn btn-danger"
					style="padding-top : 12px;
						padding-left : 16px;
						padding-bottom : 12px;
						padding-right : 16px;">
                    	<i class="fa fa-trash"></i>
                    </button>
                </form>
				@endif
            </td> 
        <tr>
		@empty
		<tr>no image</tr> 
		@endforelse
		</table>
@endsection