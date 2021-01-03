@extends('layouts.order')

@section('content')
<h2 class="text-center"
style="margin-top : 18vw;">Thanks, You can make payments on the paypal page that we have directed.</h2>
<br><br>
<center>
<a href="{{$link}}" class="btn btn-primary" target="_blank">
    go to payment page
</a>
<br><br>
<a href="{{url('/')}}" class="btn btn-secondary">
    Back to Home page
</a>
</center>
@endsection