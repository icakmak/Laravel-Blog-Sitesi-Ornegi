@extends('front.layouts.master') {{-- master.blade de parçaladığımız dokumanı çekiyoruz --}}

@section('title',$article->title) {{-- header.blade de title alanında yield tanımlıyoruz ve o yield bizim başlık alanımız oluyor --}}
@section('img',$article->image)
{{-- master.blade içinde header ve footer arasında tanımladığınız content alanı --}}
{{-- Blogumuzda ki değişen yazılarımız bu alanda olacak --}}
@section('content')

<div class="col-lg-9 col-xl-7">
    <img src="{{$article->image}}" alt="{{$article->title}}" width="700" height="auto">
    <div class="text-center mt-2">
        <h4>{{$article->title}}</h4>
    </div>
    <hr>
    <p>{{$article->content}}</p>
    <hr>
    <div class="row mb-4" style="font-size: 0.8rem">
        <div class="col-md-5">
            Kategori : {{$article->getCategory->name}}
        </div>
        <div class="col-md-2 text-center">
            Hit : {{$article->hit}}
        </div>
        <div class="col-md-5 text-end">
            Eklenme : {{$article->created_at->diffForHumans()}}
        </div>
    </div>
</div>

<div class="col-lg-3">
@include('front.widgets.categoryWidget')
<hr>
@include('front.widgets.populerWidget')
</div>

@endsection