@extends('front.layouts.master')
@section('title','Bizimle İletişime Geçebilirsiniz.')
@section('img',asset('front').'/assets/img/contact-bg.jpg')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
    {{session('success')}}
    </div>
@endif

<div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Bizimle İletişime Geçebilirsiniz</p>
                        <div class="my-5">
                            <form method="post" action="{{route('contactpost')}}">
                                @csrf
                                <div class="form-floating">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Adınız Soyadınız" required/>
                                    <label for="name">Adınız Soyadınız</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email Adresiniz" required />
                                    <label for="email">Mail Adresiniz</label>
                                </div>
                                <div class="form-gorup">
                                    
                                    <label for="phone">Konu</label>
                                    <select name="topic" id="topic" class="form-control form-floating">
                                        <option value="Bilgi">Bilgi</option>
                                        <option value="Destek">Destek</option>
                                        <option value="Genel">Genel</option>
                                    </select>
                                    
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Mesajınız" style="height: 12rem" required></textarea>
                                    <label for="message">Mesajınız</label>
                                </div>
                                <br />
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
                            </form>
                        </div>
                    </div>
@endsection