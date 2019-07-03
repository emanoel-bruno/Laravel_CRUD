@extends('templates.default')
@section('title','Laravel_CRUD Welcome')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('header')
<nav class="navbar navbar-expand-sm  mb-4 " id="home">
	<div class="container">
		<a class="navbar-brand logo" href="#home"></a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon">
				<i class="icon icon-md ion-md-menu"></i>
			</span>
		</button>
		<div id="navbarNav" class="collapse navbar-collapse">
			<ul class="navbar-nav  ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#all">Search</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#all">List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#deleted">Deleted</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contact">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
@endsection

@section('body')
<section class="create-section">
	<div class="container">
		<div class="row ">
			<div class="col-md-8 my-auto">
				<div class="display-2 mx-auto hero-text text-capitalize">
					The Best PHP Framework Ever
				</div>
			</div>
			<div class="col-md-4 my-auto">
				<div class="card mx-auto  bg-light">
					<div class="card-body">
						<h5 class="card-title h1 text-center mb-3">Join Us</h5>
						<p class="card-text ">Register now on our community and learn more about Laravel</p>
						<form action="{{env('APP_URL')}}/users" method="POST">
							{{ csrf_field() }}
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="icon ion-md-person"></i>
									</span>
								</div>
								<input type="text" name="name" required class="form-control" placeholder="Name" 
									aria-label="Username" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text " id="basic-addon2">
										<i class="icon ion-md-lock"></i>
									</span>
								</div>
								<input type="password" name="password" minlength="6" class="form-control" required
									placeholder="Password" aria-label="Username" aria-describedby="basic-addon2">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">
										<i class="icon ion-md-mail"></i>
									</span>
								</div>
								<input type="email" name="email" class=" form-control " placeholder="E-Mail"
									aria-label="E-Mail" required aria-describedby="basic-addon3 ">
							</div>
							<div class="input-group mb-3 ">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon4 ">
										<i class="icon ion-md-call"></i>
									</span>
								</div>
								<input type="text" name="tel" class="form-control " placeholder="Cellphone" required
									aria-label="Cellphone" aria-describedby="basic-addon4 ">
							</div>
							<div class="input-group mx-auto  row">
								<input type="submit" class="btn btn-danger mr-3 d-inline-block mx-auto"value="Create Account">
							</div>
						</form>

						@php
						if(isset($message) and $mode==0) {
							$class = $result ? 'alert alert-success mt-3 mb-0 text-dark' : 'alert alert-danger mt-3 mb-0 text-dark';
						}
						else {
							if(!isset($message)) {
								$message = "";
							}
							$class ='d-none';
						}
						@endphp

						<div class="{{ $class }}" role="alert">
							{{ $message }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="list-section" id="all" tabindex="0">
	<div class="container text-center">
		<div class="h1">Users</div>

		<form action="{{env('APP_URL')}}/search" method="POST">
			{{ csrf_field() }}
			<div class="input-group custom-search-form w-75 mx-auto">
				<input type="text" class=" form-control mb-5" name="search" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-default-sm btn-danger" type="submit">
						<i class="icon ion-md-search"></i>
					</button>
				</span>
			</div>
		</form>
		
		@php
			$i = 0;
			$first = true;
			$base = env('APP_URL');
			$field = csrf_field();
			$delete_method = method_field('delete');
		@endphp

		@foreach ($users as $i=>$user)
			@if ($i % 3== 0)
				@if ($first == false)
					</div>
				@endif
				<div class="row">        
			@endif
		
		
			<div class="col">
				<div class="card mx-auto mb-5 d-inline-block" style="width: 16rem;">
					<img class="mx-auto d-block rouded-image" src="http://lc.test/imgs/user.png" alt="User image cap">
					<ul class="list-group list-group-flush clearfix">
				@if (($mode == 0 or $mode==3) or ($id != $user->id and ($mode==1 or $mode==2)))
						<li class='list-group-item' id='name'>
							<i class='icon ion-md-person float-left'></i>{{ $user->name }}
						</li>
						<li class='list-group-item' id='email'>
							<i class='icon ion-md-mail float-left'></i>{{ $user->email }}
						</li>
						<li class='list-group-item' id='tel'>
							<i class='icon ion-md-call float-left'></i>{{ $user->tel }}
						</li>
					</ul>
					<div class="card-body">
						<div class="buttons">
							<form action="{{ $base . '/' . $user->id . '/update' }}" method='POST'>
								{{ $field }}
								<input type="hidden" name="_method" value="PUT">
								<input type="submit" class="btn btn-danger " value="Edit">
							</form>
							<form action="{{ $base . '/users/' . $user->id }}" method='POST'>
								{{ $delete_method }}
								{{ $field }}
								<div class="ml-4">
									<input type="submit" class="btn btn-outline-danger" value="Delete">
								</div>
							</form>
						</div>
					</div>
				@else
					@if ($mode==1 and $id == $user->id)
						<form action="{{ $base . '/users/' . $user->id }}" method='POST'>
							{{ $field }}
							<div class="input-group mb-3 linput">
								<div class="input-group-prepend">
									<span class="input-group-text " id="basic-addon1">
										<i class="icon ion-md-person"></i>
									</span>
								</div>
								<input type='text' name='name' required class='form-control ' placeholder='Name'
									aria-label='Username' aria-describedby='basic-addon1' value="{{ $user->name }}">
							</div>
							<div class="input-group mb-3 linput">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon2">
										<i class="icon ion-md-mail"></i>
									</span>
								</div>
								<input type='email' name='email' class=' form-control ' placeholder='Email'
									aria-label='E-Mail' required aria-describedby='basic-addon2' value="{{ $user->email }}">
							</div>
							<div class="input-group mb-3 linput">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">
										<i class="icon ion-md-call"></i>
									</span>
								</div>
								<input type='text' name='tel' class='form-control ' placeholder='Cellphone' required
									aria-label='Cellphone' aria-describedby='basic-addon3' value="{{ $user->tel }}">
								</div>
							</ul>
							<div class="card-body">
								<input type="hidden" name="_method" value="PUT">
								<div class="input-group mx-auto row">
									<input type="submit" class="btn btn-danger mr-3 mx-auto" value="Confirm">
								</div>
							</div>
						</form>
					
					@else
						@if ($mode==2 and $id == $user->id)
								<li class='list-group-item' id='name'>
									<i class='icon ion-md-person float-left'></i>{{ $user->name }}
								</li>
								<li class='list-group-item' id='email'>
									<i class='icon ion-md-mail float-left'></i>{{ $user->email }}
								</li>
								<li class='list-group-item' id='tel'>
									<i class='icon ion-md-call float-left'></i>{{ $user->tel }}
								</li>
							</ul>
							<div class="card-body">
								<div class="buttons">
									<form action="{{ $base/$user->id/update }}" method='POST'>
										{{ $field }}
										<input type="hidden" name="_method" value="PUT">
										<input type="submit" class="btn btn-danger " value="Edit">
									</form>
									<form action="{{ $base/users/$user->id }}" method='POST'>
										{{ $delete_method }}
										{{ $field }}
										<div class="ml-4">
											<input type="submit" class="btn btn-outline-danger" value="Delete">
										</div>
									</form>
								</div>
							</div>
							
							@if (isset($message) and $mode==2)
								{{ $class2 = $result ? 'alert alert-success mb-0 text-dark' : 'alert alert-danger mb-0 text-dark' }}     
							@else
								@if (!isset($message))
									{{ $message = "" }}
								@endif
								{{ $class2 ='d-none' }}
							@endif
							
							<div class="{{ $class2 }}" role='alert'>
								{{ $message }}	
								
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&amp;times</span>
								</button>
							</div>
						@endif
					@endif
				@endif
				</div>
			</div>
			{{ $first = false }}
			@php 
				$i = $i + 1 
			@endphp
		@endforeach
		
		@while ($i % 3 != 0)
			<div class="col">
			</div>
			@php 
				$i = $i + 1 
			@endphp
		@endwhile

		@if ( $mode==1 or $mode==2 or $mode==3 or isset($deleted))
			<script type="text/javascript">
				window.onload = function() {
					console.log(document.getElementById("all"));
					document.getElementById("all").focus();
				}
			</script>
		@endif
	</div>
</section>
@endsection