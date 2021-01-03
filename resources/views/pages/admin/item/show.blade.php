@extends('layouts.admin')

@section('content')
<br>
<div class="row">
  <div class="create-new-item"
  style="margin-left : 30px;">
      <a href="{{route('create-item')}}" class="btn btn-info" style="color : #fff;">Insert new item</a>
  </div>
  <div class="form-search" style="margin-left: auto;
      margin-right: 30px;">
    <form action="{{route('show-item')}}" method="get">
      @csrf 
      <input type="text" name="search" placeholder="Title name">
      <input type="submit" value="search">
    </form>
  </div>
</div>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Discount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($items as $i)
    <tr>
      <th scope="row">{{$i->id}}</th>
      <td>{{$i->title}}</td>
      <td>{{$i->price}}</td>
      @if($i->on_sell == 1)
      <td>on sell</td>
      @else
      <td>not being sold</td>
      @endif
      @if($i->discount == 0)
      <td>no discount</td>
      @else
      <td>{{$i->discount}}%</td>
      @endif
      <td>
            <div class="row">
            <form action="{{route('edit-item')}}" method="get">
            @csrf 
                <input type="hidden" name="id" value="{{$i->id}}">
                <button type="submit" class="btn btn-success"
                style="padding-left:21px;
                padding-right: 21px;">Edit</button>
              </form>
              <form action="{{route('edit-item-image')}}" method="get">
            @csrf 
                <input type="hidden" name="id" value="{{$i->id}}">
                <button type="submit" class="btn btn-secondary"
                style="padding-left:21px;
                padding-right: 21px;">Edit image</button>
              </form>
              <form action="{{route('delete-item')}}" method="post">
              @csrf 
              @method('delete')
                <input type="hidden" name="id" value="{{$i->id}}">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
      </td>
    </tr>
    @empty
    <tr>
      <td>No item </td>
    </tr>
    @endforelse
  </tbody>
  <center>{{$items->links()}}</center>
</table>

@endsection