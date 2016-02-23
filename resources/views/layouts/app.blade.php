<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta id="token" name="token" value="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Invoice Station</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
	 

	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.plugin.js"></script> 
    <script type="text/javascript" src="js/jquery.datepick.js"></script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style>
		body {
			font-family: 'Raleway';
			margin-top: 25px;
		}

		.fa-btn {
			margin-right: 6px;
		}

		.table-text div {
			padding-top: 6px;
		}
	</style>

	<script>
		(function () {
			$('#task-name').focus();
		}());
	</script>
	  <script>
  		

     </script>
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="/">Invoice Station</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="/auth/register"><i class="fa fa-btn fa-heart"></i>Register</a></li>
							<li><a href="/auth/login"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
						@else
							<li class="navbar-text"><i class="fa fa-btn fa-user"></i>{{ Auth::user()->name }}</li>
							<li><a href="/auth/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</div>

	@yield('content')
</body>
</html>
