<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Style -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link href="assets/css/fontawesome.css" rel="stylesheet">
<link href="assets/css/brands.css" rel="stylesheet">
<link href="assets/css/solid.css" rel="stylesheet">

<!-- Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</head>

<body>
<!-- Pasek nawigacji "przyklejony" do góry strony-->
<nav class="navbar fixed-top navbar-expand-xl navbar-light bg-light py-3">
	<!-- Kontener zawartości paska nawigacji-->
	<div class="container">
	<!-- Logo Cardio -->
	<a class="navbar-brand" href="#"><img src="assets/img/logo.svg" width="40" height="40" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
			<!-- Zawartość która "składa się" do dropdown listy onclick przy niskiej rozdzielczości -->
		<div class="collapse navbar-collapse" id="navbarNav">
				<!-- Lista nawigacji -->
			<ul class="navbar-nav mx-5 px-5 font-weight-bold">
				<li class="nav-item px-2">
				<a class="nav-link" href="index.php">Home</a>
				</li>
				
				<li class="nav-item px-2">
				<a class="nav-link" href="halllist.php">Sport facilities</a>
				</li>
				
				<li class="nav-item px-2">
				<a class="nav-link" href="activitylist.php">Activities</a>
				</li>
				
			</ul>
				
			<!-- Strefa użytkownika -->
			<ul class="navbar-nav ml-auto">
			<!-- Jeśli użytkownik nie jest zalogowany wyświetl button logowania -->
			<?php  if(!$_SESSION['login']) {?>
				<li><a href="login.php"> <button class="btn text-white btn-block btn-primary" type="button">Sign in</button></a></li>
			<?php } else { ?>
				<!-- Jeśli użytkownik jest zalogowany wyświetl dropdown menu -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-user" aria-hidden="true"></i>
					</a>
					<div class="dropdown-menu rounded" aria-labelledby="navbarDropdownMenuLink">
						<small>
						<a class="dropdown-item" href="my-booking.php">My bookings</a>
						<a class="dropdown-item" href="my-activities.php">My activities</a>
						<a class="dropdown-item" href="hostfacility.php">Host facility</a>
						<a class="dropdown-item" href="hostactivity.php">Host activity</a>
						<a class="dropdown-item" href="profile.php">Edit profile</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
						</small>
					</div>
				</li>
			</ul>
         <?php } ?>
		</div>
	</div>
</nav>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>