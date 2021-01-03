@extends('layouts.user')


@section('content')
<table class="table">
  <thead>
    <tr>
	  <th scope="col"></th>
      <th scope="col">Item ID</th>
      <th scope="col">Transaction ID</th>
      <th scope="col">Title</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($items as $i)
    <tr>
      <td>
	  	<img src="{{$i->itemImage->image_url}}" style ="height: 100px; width : auto;">
	  </td>
	  <td>{{$i->item->id}}</td>
	  <td>{{$i->transaction_id}}</td>
	  <td>{{$i->item->title}}</td>
	  <td>{{$i->transaction->contact}}</td>
	  <td>{{$i->transaction->address}}</td>
	  <td>{{$i->quantity}}</td>
    </tr>
    @empty
    <tr>
      <td>No item </td>
    </tr>
    @endforelse
  </tbody>
</table>
  <center>{{$items->links('includes.pagination')}}</center>
@endsection