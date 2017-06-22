<!DOCTYPE html>
<html >
<head>
	<title>Nova Porudzbina</title>

	<link href="https://fonts.googleapis.com/css?family=Ek+Mukta" rel="stylesheet">

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
	<h2 style="text-align: center;">Nova Porudžbina</h2><br>
	<p style="text-align: center; width: 80%; margin-left: 10%;">Zdravo {{ $name }} - hvala Vam na porudžbini. Detalje možete videti u fakturi ispod.</p>
	<br><br>

	<table style="width: 90%;
		   		 border-collapse: collapse;
		    	 table-layout: auto;
		    	 margin-left: 5%;">
		<tr style="width: 100%;
    text-align: center;
    vertical-align: top;">
			<td style="padding-top: 20px;padding-bottom: 20px; border-bottom: 1px solid black; border-top:1px solid black;width: 33% !important;">
				<h3>Adresa dostave:</h3>
				<p>{{ $adresa }},</p> 
				<p>21000 {{ $grad }}, Republika Srbija</p>
				<p>Telefon: {{ $telefon }}</p>
			</td>
			<td style="padding-top: 20px;padding-bottom: 20px; border-bottom: 1px solid black; border-top:1px solid black;width: 33% !important;">
				<p><h3>Napomena:</h3>{{ $napomena }}</p>
			</td>
			<td style="padding-top: 20px;padding-bottom: 20px; border-bottom: 1px solid black; border-top:1px solid black;width: 33% !important;">
				<p><h3>Broj porudžbine: #{{ $broj }}</h3></p>
			</td>
		</tr>
		</table>
		@php
			$medjuzbir = 0;

		@endphp
		<table style="width: 90%;
		   		 border-collapse: collapse;
		    	 table-layout: auto;
		    	 margin-left: 5%;">
		<tr style="height: 70px;
    text-align: center !important;
    vertical-align: top;width: 100%; text-align: left;">
			<td style="text-align: center !important;
                 width: 25%;padding-top: 50px; border-bottom: 1px solid #D6D6D6; padding-bottom: 20px;"><strong>Proizvod</strong></td>
                 <td style="text-align: center !important;
                 width: 25%;padding-top: 50px; border-bottom: 1px solid #D6D6D6; padding-bottom: 20px;"></td>
			<td style="text-align: center !important;
                 width: 25%;padding-top: 50px; border-bottom: 1px solid #D6D6D6; padding-bottom: 20px;"><strong>Cena</strong></td>
			<td style="text-align: center !important;
                 width: 25%;padding-top: 50px; border-bottom: 1px solid #D6D6D6; padding-bottom: 20px;"><strong>Ukupno</strong></td>
            
		</tr>
		@foreach ($proizvod as $order)
		<tr style="height: 70px;
    text-align: center !important;
    vertical-align: top;">


			<td style="width: 25%; padding-top: 10px;text-align: center !important;
                ">{{ $order->naziv }}<br><i>Količina</i>: {{ $order->pivot->quantity }}</td>
			<td style="width: 25%;  padding-top: 10px;text-align: center !important;
                "><img style="width: 100px;" src="{!! 'http://eterra.brainzined.com/storage/' . $order->slika !!}"></td>
			<td style="width: 25%; padding-top: 10px;text-align: center !important;
                ">{{ $order->cena }} RSD</td>
			<td style="width: 25%; padding-top: 10px;text-align: center !important;
                "> {{ $order->pivot->quantity*$order->cena }} RSD</td>
					</tr>
			@php
			$medjuzbir +=$order->pivot->quantity*$order->cena ;
			@endphp
			


		@endforeach
		
	</table >
	<table style="width: 90%;
		   		 border-collapse: collapse;
		    	 table-layout: auto;
		    	 margin-left: 5%;
                 ">
	<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="
                 border-top: 1px solid #D6D6D6; width: 50%;"></td>
			<td style="text-align: center; width: 25%;
                 border-top: 1px solid #D6D6D6;"><p>Međuzbir:</p></td>
			<td style="text-align: center; width: 25%;
                 border-top: 1px solid #D6D6D6;"><p>{{ $medjuzbir }} RSD</p></td>
		</tr>
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="border: none !important; width: 50%;"></td>
			<td style="text-align: center; width: 25%;border: none !important;"><p>Dostava:</p></td>
			<td style="text-align: center; width: 25%;border: none !important;"><p>300 RSD</p></td>
		</tr>
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;padding-bottom: 50px;">
			<td style="border-bottom: 1px solid #D6D6D6 !important; width: 50%;"></td>
			<td style="text-align: center; width: 25%;border-bottom: 1px solid #D6D6D6 !important;"><h4>Ukupno:</h4></td>
			<td style="text-align: center; width: 25%;border-bottom: 1px solid #D6D6D6 !important;"><h4><strong>{{ $medjuzbir }}  RSD</strong></h4></td>
		</tr>
		</table>

		<p style="margin-left: 5%; line-height: 100%;text-align: left;padding-top: 50px;">Eterra DOO</p>
		<p style="margin-left: 5%; line-height: 100%;text-align: left;">Zmaj Jovina 26</p>
		<p style="margin-left: 5%; line-height: 100%;text-align: left;">TC Lupus</p>
		<p style="margin-left: 5%; line-height: 100%;text-align: left;">21000 Novi Sad</p>
		<p style="margin-left: 5%; line-height: 100%;text-align: left;">Telefon: 021/6610170</p>
		<p style="margin-left: 5%; line-height: 100%;text-align: left;padding-bottom: 100px;">E-mail: terraco@orion.rs</p>
		</div>
	
</body>
</html>