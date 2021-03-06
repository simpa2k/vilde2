<!DOCTYPE html>
<html>
	<head>
		<title>Vilde</title>

		<link rel="stylesheet" href="static/css/mainpage.css">

		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	</head>
	<body>
	
	<div id="background"></div>
		
	<div id="main" class="container-fluid">

		<nav>
			<div id="header" class="row">
				<h3 class="heading">KONSERTER</h3>
				<h3 class="heading">OM VILDE</h3>
				<h3 class="heading">MUSIK OCH MEDIA</h3>
				<h3 class="heading">KONTAKT</h3>
			</div>
		</nav>

		<div id="shows" class="section">
			<div class="row">
				<div class="col-md-12"><h1 class="section-heading">Konserter</h1></div>
			</div>
			<?php $this->displayGigs(); ?>
		</div>

		<div id="border-black" class="row">
			<div class="col-md-12">
				<blockquote class="border-blockquote">
					<p>”Det här är folkmusik av idag, som dessutom svänger fint runt alla hörnen samtidigt.”</p>
					<footer>www.blaskan.nu nr:101</footer>
				</blockquote>
			</div>
		</div>

		<div id="about" class="section">
			<div class="row">
				<div class="col-md-12"><h1 class="section-heading">Om Vilde</h1></div>
			</div>
			<?php $this->printDescription(); ?>

			<?php $this->printReviews(); ?>


			<div class="row">
				<div class="col-md-12"><h2 class="text-left">Vilde är:</h2></div>
			</div>
			<?php $this->listMembers(); ?>
		</div>

		<div id="music-and-media" class="section">
			<div class="row">
				<div class="col-md-12"><h1 class="section-heading">Musik och media</h1></div>
			</div>
		</div>

		<div id="contact" class="section">
			<div class="row">
				<div class="col-md-12"><h1 class="section-heading">Kontakt</h1></div>
			</div>
			<?php $this->printContactInformation(); ?>
		</div>

		<div id="border-black" class="row">
			<div class="col-md-12">
				<p>Mer musik åt folket! Mer folk åt musiken!</p>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>