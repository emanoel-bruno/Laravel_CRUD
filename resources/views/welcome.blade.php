@extends('templates.default')
@section('title','Laravel_CRUD Welcome')
@section('head')
<style>
	.logo:link,
	.logo:visited {
		background: url("{{ URL::asset("imgs/laravel-logo.png" )}}");
		background-size: cover;
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
<nav class="navbar navbar-expand-sm  mb-4 " id="home">
	<div class="container">
		<a class="navbar-brand logo" href="#home"></a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"><i class="icon icon-md ion-md-menu"></i></span>
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
				<div class="display-2 mx-auto  hero-text text-capitalize">
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
									<span class="input-group-text" id="basic-addon1"><i
											class="icon ion-md-person"></i></span>
								</div>
								<input type="text" name="name" required class="form-control" placeholder="Name"
									aria-label="Username" aria-describedby="basic-addon1">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text " id="basic-addon2"><i
											class="icon ion-md-lock"></i></span>
								</div>
								<input type="password" name="password" minlength="6" class="form-control" required
									placeholder="Password" aria-label="Username" aria-describedby="basic-addon2">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3"><i
											class="icon ion-md-mail"></i></span>
								</div>
								<input type="email" name="email" class=" form-control " placeholder="E-Mail "
									aria-label="E-Mail
                                            " required aria-describedby="basic-addon3 ">
							</div>
							<div class="input-group mb-3 ">
								<div class="input-group-prepend ">
									<span class="input-group-text " id="basic-addon4 "><i
											class="icon ion-md-call "></i></span>
								</div>
								<input type="text" name="tel" class="form-control " placeholder="Cellphone" required
									aria-label="Cellphone" aria-describedby="basic-addon4 ">
							</div>
							<div class="input-group mx-auto  row">
								<input type="submit" class="btn btn-danger mr-3 d-inline-block mx-auto"
									value="Create Account">
							</div>
						</form>
						@php
						if(isset($message) and $mode==0)
						{
						$class = $result ? 'alert alert-success mt-3 mb-0 text-dark' : 'alert alert-danger mt-3 mb-0
						text-dark';
						}
						else
						{
						if(!isset($message)){
						$message ="";
						}
						$class ='d-none';
						}
						@endphp
						<div class="{{ $class }}" role="alert">
							{!! $message !!}
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
		$aspas = '"';
		$first = true;
		$base = env('APP_URL');
		$field = csrf_field();
		$delete_method = method_field('delete');

		foreach ($users as $user)
		{
		if($i % 3== 0){
		if($first == false){
		echo '
	</div>';
	}
	echo '<div class="row">';
		}
		echo '<div class="col">';
			echo ' <div class="card mx-auto mb-5 d-inline-block" style="width: 16rem;">';
				echo ' <img class="mx-auto d-block rouded-image" src="http://lc.test/imgs/user.png"
					alt="User image cap">';
				echo ' <ul class="list-group list-group-flush clearfix">';
					if(($mode == 0 or $mode==3) or ($id != $user->id and ($mode==1 or $mode==2))) {
					echo " <li class='list-group-item' id='name'><i
							class='icon ion-md-person float-left'></i>$user->name</li>";
					echo " <li class='list-group-item' id='email'><i
							class='icon ion-md-mail float-left'></i>$user->email</li>";
					echo " <li class='list-group-item' id='tel'><i class='icon ion-md-call float-left'></i>$user->tel
					</li>";
					echo ' </ul>';
				echo ' <div class="card-body">';
					echo ' <div class="buttons">';
						echo " <form action=$aspas$base/$user->id/update$aspas method='POST'>";
							echo " $field";
							echo ' <input type="hidden" name="_method" value="PUT">';
							echo ' <input type="submit" class="btn btn-danger " value="Edit">';
							echo ' </form>';
						echo " <form action=$aspas$base/users/$user->id$aspas method='POST'>";
							echo " $delete_method";
							echo " $field";
							echo ' <div class="ml-4">';
								echo ' <input type="submit" class="btn btn-outline-danger" value="Delete">';
								echo ' </div>';
							echo ' </form>';
						echo ' </div>';
					echo ' </div>';
				}
				elseif($mode==1 and $id == $user->id ){
				echo "<form action=$aspas$base/users/$user->id$aspas method='POST'>";
					echo " $field";
					echo '<div class="input-group mb-3 linput">';
						echo ' <div class="input-group-prepend">';
							echo ' <span class="input-group-text " id="basic-addon1"><i
									class="icon ion-md-person"></i></span>';
							echo ' </div>';
						echo " <input type='text' name='name' required class='form-control ' placeholder='Name'
							aria-label='Username' aria-describedby='basic-addon1' value=$aspas$user->name$aspas>";
						echo ' </div>';
					echo '<div class="input-group mb-3 linput">';
						echo ' <div class="input-group-prepend">';
							echo ' <span class="input-group-text " id="basic-addon2"><i
									class="icon ion-md-mail"></i></span>';
							echo ' </div>';
						echo " <input type='email' name='email' class=' form-control ' placeholder='Email'
							aria-label='E-Mail' required aria-describedby='basic-addon2'
							value=$aspas$user->email$aspas>";
						echo ' </div>';
					echo '<div class="input-group mb-3 linput">';
						echo ' <div class="input-group-prepend ">';
							echo ' <span class="input-group-text" id="basic-addon3"><i
									class="icon ion-md-call "></i></span>';
							echo ' </div>';
						echo " <input type='text' name='tel' class='form-control ' placeholder='Cellphone' required
							aria-label='Cellphone' aria-describedby='basic-addon3' value=$aspas$user->tel$aspas>";
						echo ' </div>';
					echo ' </ul>';
					echo ' <div class="card-body">';
						echo ' <input type="hidden" name="_method" value="PUT">';
						echo ' <div class="input-group mx-auto  row">';
							echo ' <input type="submit" class="btn btn-danger mr-3  mx-auto" value="Confirm">';
							echo ' </div>';
						echo ' </div>';
					echo ' </form>';
				}
				elseif($mode==2 and $id == $user->id){
				echo " <li class='list-group-item' id='name'><i class='icon ion-md-person float-left'></i>$user->name
				</li>";
				echo " <li class='list-group-item' id='email'><i class='icon ion-md-mail float-left'></i>$user->email
				</li>";
				echo " <li class='list-group-item' id='tel'><i class='icon ion-md-call float-left'></i>$user->tel</li>";
				echo ' </ul>';
				echo ' <div class="card-body">';
					echo ' <div class="buttons">';
						echo " <form action=$aspas$base/$user->id/update$aspas method='POST'>";
							echo " $field";
							echo ' <input type="hidden" name="_method" value="PUT">';
							echo ' <input type="submit" class="btn btn-danger " value="Edit">';
							echo ' </form>';
						echo " <form action=$aspas$base/users/$user->id$aspas method='POST'>";
							echo " $delete_method";
							echo " $field";
							echo ' <div class="ml-4">';
								echo ' <input type="submit" class="btn btn-outline-danger" value="Delete">';
								echo ' </div>';
							echo ' </form>';
						echo ' </div>';
					echo ' </div>';
				if(isset($message) and $mode==2)
				{
				$class2 = $result ? 'alert alert-success mb-0 text-dark' : 'alert alert-danger mb-0 text-dark';
				}
				else
				{
				if(!isset($message)){
				$message ="";
				}
				$class2 ='d-none';
				}
				echo "<div class=$aspas$class2$aspas role='alert'>";
					echo" $message ";
					echo' <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
						echo' <span aria-hidden="true">&times;</span>';
						echo' </button>';
					echo'</div>';
				}

				echo ' </div>';
			echo '</div>';
		$first = false;


		$i = $i + 1;
		}

		while($i % 3 != 0){
		echo '<div class="col">';
			echo ' </div>';
		$i = $i + 1;
		}

		if( $mode==1 or $mode==2 or $mode==3 or isset($deleted)){
		echo '<script type="text/javascript">
			';
              echo 'window.onload = function() {';
              echo 'console.log(document.getElementById("all"));';
              echo 'document.getElementById("all").focus(); ';
              echo '};';
              echo'
		</script>';
		}
		@endphp
	</div>
</section>
@endsection