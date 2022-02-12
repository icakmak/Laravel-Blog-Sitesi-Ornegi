@extends('front.layouts.master') {{-- master.blade de parçaladığımız dokumanı çekiyoruz --}}

@section('title','Anasayfa') {{-- header.blade de title alanında yield tanımlıyoruz ve o yield bizim başlık alanımız oluyor --}}

{{-- master.blade içinde header ve footer arasında tanımladığınız content alanı --}}
{{-- Blogumuzda ki değişen yazılarımız bu alanda olacak --}}
@section('content')
<div class="col-lg-9 col-xl-7">
    <!-- Post preview-->
    @foreach ($articles as $art)
    <div class="post-preview">
        <a href="{{route('single',[$art->getCategory->slug, $art->slug])}}">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{$art->image}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <div class="col-sm-9">
                    <div class="post-titles">{{$art->title}}</div>
                    <div class="post-subs">{{Str::limit($art->content,150)}}</div>
                </div>
            </div>
        </a>
        <div class="figure-caption row">
            <div class="col-sm-8"> Kategori : <a href="category/{{$art->getCategory->slug}}" class="a-link">{{$art->getCategory->name}}</a></div>
            <div class="col-sm-4 text-sm-end">{{$art->created_at->diffForHumans()}}</div>
        </div>
    </div>
    <hr>
    @endforeach
    <!-- Divider-->
    <div class="d-flex justify-content-center mb-4l">{{$articles->links('pagination::bootstrap-4')}}</div>
</div>

<div class="col-lg-3">
@include('front.widgets.categoryWidget')
<hr>
@include('front.widgets.populerWidget')
</div>
@endsection