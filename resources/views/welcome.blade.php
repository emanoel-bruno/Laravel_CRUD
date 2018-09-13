@extends('templates.default') 
@section('title','Laravel_CRUD Welcome') 
@section('header')
<nav class="navbar navbar-expand-sm  mb-4">
    <div class="container">
        <a class="navbar-brand" href="https://laravel.com/"> <img class="logo" src="{{URL::asset('imgs/laravel-logo.png')}}" alt="Laravel"> </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarNav" class="collapse navbar-collapse ">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=" # ">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endsection
 
@section('body')
@endsection