@extends('front.layouts.master')
@section('title','Bizimle İletişime Geçebilirsiniz.')
@section('img',asset('front').'/assets/img/contact-bg.jpg')

@section('content')

@if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif

@if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
        </div>
@endif
<div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Bizimle İletişime Geçebilirsiniz</p>
                        <div class="my-5">
                            <form method="post" action="{{route('contactpost')}}">
                                @csrf
                                <div class="form-floating">
                                    <input class="form-control" id="contactname" name="contactname" type="text" placeholder="Adınız Soyadınız" value="{{old('contactname')}}" required/>
                                    <label for="name">Adınız Soyadınız</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email Adresiniz" value="{{old('email')}}" required />
                                    <label for="email">Mail Adresiniz</label>
                                </div>
                                <div class="form-gorup">
                                    <label for="phone">Konu</label>
                                    <select name="topic" id="topic" class="form-control form-floating">
                                        <option value="Bilgi" @if (old('topic')=='Bilgi') selected @endif>Bilgi</option>
                                        <option value="Destek" @if (old('topic')=='Destek')selected @endif>Destek</option>
                                        <option value="Genel" @if (old('topic')=='Genel') selected @endif>Genel</option>
                                    </select>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="contactmessage" name="contactmessage" placeholder="Mesajınız" style="height: 12rem" required>{{old('contactmessage')}}</textarea>
                                    <label for="message">Mesajınız</label>
                                </div>
                                <br />
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
                            </form>
                        </div>
                    </div>
@endsection