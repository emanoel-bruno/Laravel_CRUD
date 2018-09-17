@extends('templates.default') 
@section('title','Laravel_CRUD Welcome') 
@section('head')
<style>
    .logo:link,
    .logo:visited {
        background: url("{{ URL::asset("imgs/laravel-logo.png" )}}");
        background-size: cover;
        transition: background 1s;
    }

    .logo:hover,
    .logo:active {
        background: url("{{ URL::asset("imgs/laravelo.png" )}}");
        background-size: cover;
    }

    .display-2:link,
    .display-2:visited {
        color: #cccccc;

        transition: color 0.5s;
        -webkit-transition: color 0.5s;
        -moz-transition: color 0.5s;
        -ms-transition: color 0.5s;
        -o-transition: color 0.5s;
    }

    .display-2:hover,
    .display-2:active {
        color: #fb503b;
    }
</style>
@endsection
 
@section('header')
<nav class="navbar navbar-expand-sm  mb-4">
    <div class="container">
        <a class="navbar-brand logo" href="https://laravel.com/">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
</button>

        <div id="navbarNav" class="collapse navbar-collapse">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tables</a>
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
<div class="container">
    <div class="row fh-100">
        <div class="col-md-8 my-auto">
            <div class="display-2 hero-text text-capitalize">
                The Best PHP Framework Ever
            </div>
        </div>
        <div class="col-md-4 my-auto">
            <form action="">
                <div class="card mx-auto bg-light">
                    <div class="card-body">
                        <h5 class="card-title h1 text-center mb-3">Join Us</h5>
                        <p class="card-text ">Register now on our community and learn more about Laravel</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon ion-md-person"></i></span>
                            </div>
                            <input type="password" name="user" minlength="6" required class="form-control" required placeholder="Username" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon ion-md-lock"></i></span>
                            </div>
                            <input type="text" name="password" class="form-control" required placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon ion-md-mail"></i></span>
                            </div>
                            <input type="email" name="email" class=" form-control " placeholder="E-Mail " aria-label="E-Mail
                                        " required aria-describedby="basic-addon1 ">
                        </div>
                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend ">
                                <span class="input-group-text " id="basic-addon1 "><i class="icon ion-md-call "></i></span>
                            </div>
                            <input type="tel " name="tel " class="form-control " placeholder="Cellphone" required aria-label="Cellphone " aria-describedby="basic-addon1 ">
                        </div>
                        <div class="input-group mx-auto  row">
                            <input type="submit" class="btn btn-danger mr-3 d-inline-block mx-auto" value="Create Account">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection