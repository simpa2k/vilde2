<!DOCTYPE html>
<html>
	<head>
		<title>Vilde</title>

		<link rel="stylesheet" href="static/css/alternatemainpage.css">

		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	</head>
	<body>
	
	<div id="background"></div>
		
	<div class="container-fluid">
		<nav>
			<div id="header" class="row">
				<h3 class="heading">NYHETER</h3>
				<h3 class="heading">OM VILDE</h3>
				<h3 class="heading">KONSERTER</h3>
				<h3 class="heading">KONTAKT</h3>
			</div>
		</nav>
	</div>

	<div id="main" class="container-fluid">

		<div class="row">
			<div id="news" class="section">
				
				<div class="row">
					<div class="col-md-12"><h1 class="section-heading">Nyheter</h1></div>
				</div>

				<div class="row">
					<div id="news-item-container">
					
						<div class="news-item">
							<p>Nu jävlar händer det! <span class="orange-brown">Vilde</span> spelar både här och där och det tycker vi att ni ska få veta! Mer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMer textMe</p>
						</div>
					
						<div class="news-item">
							<p>Fler <span class="orange-brown">saker</span>!</p>
						</div>
					
					</div>
				</div>

			</div>
		</div>

		<div class="row">
			<div id="shows" class="section">
				<div class="row">
					<div class="col-md-12"><h1 class="text-center section-heading">Konserter</h1></div>
				</div>
				<div class="gig-parent">
					<?php $this->displayGigs(); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div id="about" class="section">
				<div class="row">
					<div class="col-md-12"><h1 class="section-heading">Om Vilde</h1></div>
				</div>

				<div class="col-md-6"><?php $this->printDescription(); ?></div>

				<div class="col-md-6"><?php $this->printReviews(); ?></div>


				<div class="row">
					<div class="col-md-12"><h2 class="text-center red">Vilde är:</h2></div>
				</div>
				<?php $this->listMembers(); ?>
			</div>
		</div>

		<!--<div class="row">
			<div id="music-and-media" class="section">
				<div class="row">
					<div class="col-md-12"><h1 class="section-heading">Musik och media</h1></div>
				</div>
			</div>
		</div>-->

		<div class="row">
			<div id="contact" class="section">
				<div class="row">
					<div class="col-md-12"><h1 class="section-heading">Kontakt</h1></div>
				</div>
				<?php $this->printContactInformation(); ?>
				
			</div>
		</div>

		<div id="border-black" class="row">
			<div class="col-md-12">
				<p>Mer musik åt folket! Mer folk åt musiken!</p>
			</div>
		</div>

	</div>

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>