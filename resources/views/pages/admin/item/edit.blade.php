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
<form action="{{route('update-item')}}" method="post" style="margin-left : 30px;">
@csrf 
@method('put')
  <input type="hidden" name="id" value="{{$item->id}}">
  <div class="form-group">
    <label for="title">Title</label><br>
    <input type="text" name="title" id="title" size="70" value="{{$item->title}}">
  </div>
  <div class="form-group">
    <label for="price">Price</label><br>
    <input type="number" name="price" id="price" min="1" size="70" value="{{$item->price}}">
  </div>
  <div class="form-group">
    <label for="category">Category</label><br>
    <input type="text" name="category" id="category"  size="70" value="{{$item->category}}">
  </div>
  <div class="form-group">
    <label for="discount">Discount</label><br>
    <input type="number" name="discount" id="price" min="0" max="99" size="70" value="{{$item->discount}}">
  </div>
  <div class="form-group">
    <label for="status">Status</label><br>
    <select name="on_sell" id="status" >
     @if($item->on_sell == 1)
     <option value="1" selected>On sell</option>
     <option value="0">Not being sold</option>
     @else
     <option value="1">On sell</option>
     <option value="0" selected>Not being sold</option>
     @endif
    </select>
  </div>
  <div class="form-group">
    <p>Color</p>
    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "red")
        <input type="checkbox" id="color-1" name="color-1" value="red" checked>
        <label for="color-1"> Red</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-1" name="color-1" value="red">
        <label for="color-1"> Red</label><br>
       @endif 
       @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "orange")
        <input type="checkbox" id="color-2" name="color-2" value="orange" checked>
        <label for="color-2"> Orange</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-2" name="color-2" value="orange">
        <label for="color-2"> Orange</label><br>
        @endif 
        @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "yellow")
        <input type="checkbox" id="color-3" name="color-3" value="yellow" checked>
        <label for="color-3"> Yellow</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-3" name="color-3" value="yellow">
        <label for="color-3"> Yellow</label><br>
       @endif
       @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "green")
        <input type="checkbox" id="color-4" name="color-4" value="green" checked>
        <label for="color-4"> Green</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-4" name="color-4" value="green">
        <label for="color-4"> Green</label><br>
       @endif
       @endif 
       @php($counter++)
    @endforeach

     @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "blue")
        <input type="checkbox" id="color-5" name="color-5" value="blue" checked>
        <label for="color-5"> Blue</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-5" name="color-5" value="blue" >
        <label for="color-5"> Blue</label><br>
       @endif 
       @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "purple")
        <input type="checkbox" id="color-6" name="color-6" value="purple" checked>
        <label for="color-6"> Purple</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-6" name="color-6" value="purple">
        <label for="color-6"> Purple</label><br>
       @endif 
       @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "pink")
        <input type="checkbox" id="color-7" name="color-7" value="pink" checked>
        <label for="color-7"> Pink</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-7" name="color-7" value="pink">
        <label for="color-7"> Pink</label><br>
       @endif 
       @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "black")
        <input type="checkbox" id="color-8" name="color-8" value="black" checked>
        <label for="color-8"> Black</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-8" name="color-8" value="black" >
        <label for="color-8"> Black</label><br>
       @endif 
      @endif 
       @php($counter++)
    @endforeach

    @php($counter = 0)
    @foreach($colors as $color)
      @if($color->color == "white")
        <input type="checkbox" id="color-9" name="color-9" value="white" checked>
        <label for="color-9"> White</label><br>
        @break
      @else
        @if($counter == sizeof($colors)-1)
        <input type="checkbox" id="color-9" name="color-9" value="white">
        <label for="color-9"> White</label><br>
       @endif 
       @endif 
       @php($counter++)
    @endforeach

  </div>
  <div class="form-group">
    <label for="description">Description</label><br>
    <textarea name="description" id="description" cols="70" rows="10">{{$item->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="information">Information</label><br>
    <textarea name="information" id="information"cols="70" rows="10">{{$item->information}}</textarea>
  </div>

  <div class="row">
    <button type="submit" class="btn btn-info">Submit</button>
    <a href="{{route('show-item')}}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection