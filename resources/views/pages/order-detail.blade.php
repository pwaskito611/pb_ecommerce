@extends('layouts.order')

@section('content')
<center>
<br>
<form action="{{route('redirect-page')}}" method="post">
@csrf 
@method('put')
@php($i = 0)
    @foreach($items as $item)  
    <div class="form-group">
        <label for="{{$item->id}}">{{$item->title}} (quantity)</label><br>
        <input type="number" id="{{$item->id}}" name="quantity-{{$i}}" value="1" min="1">
    </div>  
    <div class="form-group">
        <label for="color-{{$i}}">Choose color({{$item->title}})</label>
        <select name="color-{{$i}}" id="color-{{$i}}">
                <option selected>Select Color</option>
                @foreach($item->itemColor as $color)
                <option value="{{$color->color}}">{{$color->color}}</option>
                @endforeach
        </select>
            
    </div>
    @php($i++)
    @endforeach
    <label for="contact">Your Contact</label><br>
    <input type="text" name="contact" id="contact" max="20"><br>
    <label for="address">Your Address</label><br>
    <textarea name="address" id="addresss" cols="30" rows="10"></textarea><br><br>
    <div>
        <button type="submit" class="btn btn-info">Buy now</button>
        <a href="{{route('show-chart')}}" class="btn btn-secondary">Cancel</a>
    </div>
</p>
</form>
</center>
@endsection