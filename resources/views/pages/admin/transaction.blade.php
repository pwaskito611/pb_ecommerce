@extends('layouts.admin')

@section('content')
<br>
<div class="row">
  <div class="all-order">
    <a href="{{route('all-order')}}" class="btn btn-info mx-1 ml-5">All order</a>
  </div>
  <div class="confirmed-order">
    <a href="{{route('confirmed-order')}}" class="btn btn-info mx-1">Confirmed Order</a>
  </div>
  <div class="unconfirmed-order">
    <a href="{{route('unconfirmed-order')}}" class="btn btn-info mx-1">Unconfimerd Order</a>
  </div>
  <div class="update-transaction">
    <form action="{{route('update-transaction')}}" method="post">
    @csrf 
    @method('put')
    <button type="submit" class="btn btn-info mx-1">Update Data</button>
    </form>
  </div>
</div>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title Item</th>
      <th scope="col">quantity</th>
      <th scope="col">Payapl order id</th>
      <th scope="col">Buyer Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Adress</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 0)
    @forelse ($data as $d)
      @if($i > 0)
        <!--- if it different tansaction with before -->
        @if($data[$i]->paypal_order_id != $data[$i-1]->paypal_order_id)
    <tr> 
    <th scope="row">{{$d->transaction_id}}</th>
      <td>
        {{$d->title}}
      </td>
      <td>{{$d->quantity}}</td>
      <td>{{$d->paypal_order_id}}</td>
      <td>{{$d['user']->name}}</td>
      <td>{{$d['user']->phone}}</td> 
      <td>{{$d->address}}</td>
      <td>
            @if($d->confirmed_at == null)
            <form action="{{route('confirm-order')}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="id" value="{{$d->transaction_id}}">
            <input type="submit" value="Confirm">  
            </form>
            @endif
      </td>
    </tr>
        @else
        <!--// if it in same tansaction with before -->
    <tr style="padding-bottom : 20px;">
      <td></td>
      <td>
        {{$d->title}}
      </td>
      <td>{{$d->quantity}}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td> </td>
    </tr> 
        @endif
      @else 
        <!--- it for first data -->
      <tr>
      <th scope="row">{{$d->transaction_id}}</th>
      <td>
        {{$d->title}}
      </td> 
      <td>{{$d->quantity}}</td>
      <td>{{$d->paypal_order_id}}</td>
      <td>{{$d['user']->name}}</td>
      <td>{{$d['user']->phone}}</td>
      <td>{{$d->address}}</td>
      <td>
            @if($d->confirmed_at == null)
            <form action="{{route('confirm-order')}}" method="post">
            @csrf 
            @method('put')
            <input type="hidden" name="">
            <input type="hidden" name="id" value="{{$d->transaction_id}}">
            <input type="submit" value="Confirm">  
            </form>
            @endif
      </td>
    </tr>
      @endif
      @php($i++)
    @empty
    <tr>
      <td>No order </td>
    </tr>
    @endforelse
  </tbody>
</table>
<br>  
<center>{{$data->links('includes.pagination')}}</center>
<br>
<br>
<br>
@endsection