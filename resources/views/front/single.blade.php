@extends('front.layouts.master') {{-- master.blade de parçaladığımız dokumanı çekiyoruz --}}

@section('title','Anasayfa') {{-- header.blade de title alanında yield tanımlıyoruz ve o yield bizim başlık alanımız oluyor --}}

{{-- master.blade içinde header ve footer arasında tanımladığınız content alanı --}}
{{-- Blogumuzda ki değişen yazılarımız bu alanda olacak --}}
@section('content')

<div class="ccol-lg-9 col-xl-7">
    <img src="{{$article->image}}" alt="{{$article->title}}" width="700" height="auto">
    <div class="text-center mt-2">
        <h4>{{$article->title}}</h4>
    </div>
    <hr>
    <p>{{$article->content}}</p>
    <hr>
    <div class="row figure-caption">
        <div class="col-sm-6">
            <p>Kategori : {{$article->getCategory->name}}</p>
        </div>
        <div class="col-sm-6">
            <p>Eklenme Tarihi : {{$article->created_at->diffForHumans()}}</p>
        </div>
    </div>
</div>


@include('front.widgets.categoryWidget')
@endsection