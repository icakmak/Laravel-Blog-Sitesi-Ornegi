@extends('back.layouts.master')

@section('content')

    <div class="container-fluid">
<h6 class="mb-1 text-gray-600">Makaleler Sayfamız</h6>
    </div>
    <!-- Page Heading -->
    
    <div class="card p-3 m-3 card-yukseklik">
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Başlık</div>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{$article->title}}">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">İçerik</div>
            <div class="col-sm-10">
            <textarea  class="form-control" name="content" id="content" rows="20">{{$article->content}}</textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Kategori</div>
            <div class="col-sm-10">
                <select class="form-control" name="category" id="category" >
                    @foreach ($category as $ct)
                        <option value="{{$ct->id}}" @if ($article->category_id==$ct->id) selected @endif>{{$ct->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
                <a href="{{route('admin.makaleler.index')}}" class="btn btn-danger btn-sm btn-block">Vazgeç</a>
            </div>
            <div class="col-sm-5">
                <button class="btn btn-warning btn-sm btn-block">Güncelle</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <span class="font-weight-bold">Hit : </span>{{$article->hit}}
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Eklenme Tarihi : </span>{{$article->created_at}}
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Güncelleme Tarihi : </span>{{$article->updated_at}}
            </div>
        </div>
        
        
    </div>

<!-- /.container-fluid -->
@endsection