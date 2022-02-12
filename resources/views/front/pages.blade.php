@extends('front.layouts.master')

@section('title',$page->title) 
@section('img',$page->image)
@section('content')
<div class="col-lg-9 col-xl-7">
    <div  class="mb-4 text-center"> <img src="{{$page->image}}" alt="{{$page->title}}" width="700" height="auto"></div>
   
    <h3>{{$page->title}}</h3>
    <hr>
    {{$page->content}}
</div>

<div class="col-lg-3">
@include('front.widgets.categoryWidget')
<hr>
@include('front.widgets.populerWidget')
</div>
@endsection