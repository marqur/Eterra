<!DOCTYPE html>
<html>
<head>
	<title>Poruka sa sajta eterra.co.rs</title>

	<style type="text/css">
		
@media screen and (min-width: 480px) {
	.full {
			width: 60% !important;
		    margin-left: 20% !important;
		}
}

		

	</style>

</head>
<body style="font-family: 'Arial'; background-color: #E8E8E8;">

<div class="full" style="margin-top: 50px; background-color: white; -webkit-box-shadow: 0px -2px 54px -7px rgba(0,0,0,0.75);
-moz-box-shadow: 0px -2px 54px -7px rgba(0,0,0,0.75);
box-shadow: 0px -2px 54px -7px rgba(0,0,0,0.75);">

<img style="display: block;margin-left: auto;margin-right: auto;
		width: 150px;padding-top: 100px; margin-bottom: 40px;" src="http://eterra.brainzined.com/storage/eterra-logo%20(1).png">

<h1 style="text-align: center; margin-top: 60px;">Nova poruka sa sajta eterra.co.rs</h1>

<h4 style="text-align: center; margin-top: 60px;">Ime korisnika:</h4>
<p style="text-align: center;">{{ $name }}</p>
<br>
<h4 style="text-align: center; margin-top: 50px;">Email korisnika:</h4>
<p style="text-align: center;">{{ $email }}</p>
<br>
<h4 style="text-align: center; margin-top: 50px;">Poruka korisnika:</h4>
<p style="text-align: center; font-style: italic;">"{!! $poruka !!}"</p>


</div>
</body>
</html>