@extends('front.layouts.master')

@section('title',$baslik) 

@section('content')
<div class="col-lg-9 col-xl-7">
    
</div>

<div class="col-lg-3">
@include('front.widgets.categoryWidget')
<hr>
@include('front.widgets.populerWidget')
</div>
@endsection