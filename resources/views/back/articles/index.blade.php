@extends('back.layouts.master')

@section('content')

    <div class="container-fluid">
<h6 class="mb-1 text-gray-600">Makaleler Sayfamız</h6>
    </div>
    <!-- Page Heading -->
    
    <div class="card p-3 m-3 card-yukseklik">
    <table class="table table-sm table-striped" id="dataTable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Hit</th>
                <th>Created</th>
                <th>$</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $art)
            <tr>
                <td>{{$art->id}}</td>
                <td>{{$art->title}}</td>
                <td>{{$art->hit}}</td>
                <td>{{$art->created_at}}</td>
                <td><a href="{{route('admin.makaleler.show',$art->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

<!-- /.container-fluid -->
@endsection