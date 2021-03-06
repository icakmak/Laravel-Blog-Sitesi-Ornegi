@extends('back.layouts.master')
@section('title',$article->title.' - Blog Sitesi Yönetim Paneli')
@section('content')

    <div class="container-fluid">
<h6 class="mb-1 text-gray-600">{{$article->title}} Düzenleme Sayfası</h6>
    </div>
    <!-- Page Heading -->
    
    <div class="card p-3 m-3 card-yukseklik">
        <form action="{{route('admin.makaleler.update',$article->id)}}">
            @csrf
            <input type="hidden" name="id" value="{{$article->id}}">
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Başlık</div>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="{{$article->title}}"  required>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">İçerik</div>
            <div class="col-sm-10">
            <textarea  class="form-control" name="content" id="content" rows="20" required>{{$article->content}}</textarea>
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
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Durum</div>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status" >
                        <option value="0" @if ($article->status==0) selected @endif>Pasif</option>
                        <option value="1" @if ($article->status==1) selected @endif>Aktif</option>
                </select>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Fotoğraf</div>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
        </div>
        <div class="row mb-2 text-center">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <span class="font-weight-bold">Hit : </span>{{$article->hit}}
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Eklenme Tarihi : </span>{{$article->created_at}}
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Güncelleme Tarihi : </span>{{$article->updated_at}}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
                <a href="{{route('admin.makaleler.index')}}" class="btn btn-danger btn-sm btn-block">Vazgeç</a>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-warning btn-sm btn-block">Güncelle</button>
            </div>
        </div>
        </form>
        
        
    </div>

<!-- /.container-fluid -->
@endsection