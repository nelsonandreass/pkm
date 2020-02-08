<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/4640eb3b9c.js" crossorigin="anonymous"></script>
    <title>Dosen</title>
  </head>
  <body>

  <div class="container">
		<nav class="row navbar navbar-expand-lg navbar-light bg-white">
			<a href="{{url('/dosen')}}" class="navar-brand">
				<img src="/binus.png" alt="logo" width="100px" height="90px">
			</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target = "#navb">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav ml-auto mr-3">
					<li class="nav-item mx-md-2">
						<a href="{{url('/dosen')}}" class="nav-link">{{Auth::user()->name}}</a>
					</li>
					<li>
						<a href="{{url('/dosen/profile')}}" class="nav-link"><img src="/profile.png" width="30px" hegiht="30px" class="mr-1">Profile</a>
					</li>
				</ul>

				@auth
				<!-- Desktop -->
				<form  class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{url	('logout')}}" method="POST" >
					<button class="btn btn-primary btn-navbar-right my-2 my-sm-0 px-4" type="submit">
					@csrf
						Log Out<img src="/logout.png" width="20px" height="20px" class="ml-2" style="margin-top: -3px;">
					</button>
				</form>
				@endauth
			</div>
		</nav>
	</div>

  <div class="container ml-auto mr-auto ">
      @yield('content')
  </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>