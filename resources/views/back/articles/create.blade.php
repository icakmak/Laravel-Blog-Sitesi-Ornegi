@extends('back.layouts.master')
@section('title','Yeni Makale Ekleme Sayfası - Blog Sitesi Yönetim Paneli')
@section('content')

    <div class="container-fluid">
<h6 class="mb-1 text-gray-600">Yeni Makale Ekleme Sayfası</h6>
    </div>
    <!-- Page Heading -->
    
    <div class="card p-3 m-3 card-yukseklik">
        <form action="{{route('admin.makaleler.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Başlık</div>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" value="">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">İçerik</div>
            <div class="col-sm-10">
            <textarea  class="form-control" name="content" id="content" rows="20"></textarea>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Kategori</div>
            <div class="col-sm-10">
                <select class="form-control" name="category" id="category" >
                    @foreach ($category as $ct)
                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-sm-2 font-weight-bold">Durum</div>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status" >
                        <option value="0">Pasif</option>
                        <option value="1">Aktif</option>
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
                <span class="font-weight-bold">Hit : </span>0
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Eklenme Tarihi : </span> {{now()}}
            </div>
            <div class="col-sm-4">
                <span class="font-weight-bold">Güncelleme Tarihi : </span>--
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-5">
                <a href="{{route('admin.makaleler.index')}}" class="btn btn-danger btn-sm btn-block">Vazgeç</a>
            </div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-info btn-sm btn-block">Ekle</button>
            </div>
        </div>
        </form>
        
        
    </div>

<!-- /.container-fluid -->
@endsection