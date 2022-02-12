@extends('front.layouts.master')

@section('title',$page->title) 
@section('img',$page->image)
@section('content')
<div class="col-lg-9 col-xl-7">
    <img src="{{$page->image}}" alt="{{$page->title}}" width="700" height="auto" class="mb-4">
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