<!DOCTYPE html>
<html >
<head>
	<title>Nova Porudzbina</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


</head>
<body style="font-family: 'Roboto';">
	<h1>Nova Porudžbina</h1><br>
	<p>Poštovani {{ $user->value('name') }} {{ $user->value('last_name') }}, uspešno ste poručili naše proizvode.<br> Detalje porudžbine možete videti u fakturi ispod. Hvala Vam na ukazanom poverenju.</p>
	<img style="margin-left: 0px;
		width: 150px;" src="http://eterra.brainzined.com/storage/eterra-logo%20(1).png"><br>

	<table style="width: 80%;
		   		 border-collapse: collapse;
		    	 table-layout: fixed;
                 border-top: 1px solid black;">
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="
                 border-top: 1px solid black;">
				<h4>ETERRA DOO</h4>
				<p>Zmaj Jovina 26</p>
				<p>21000 Novi Sad, Srbija</p>
				<p>Telefon: 021/6610170</p>
			</td>
			<td style="
                 border-top: 1px solid black;">
				<h4>Adresa dostave:</h4>
				<p>{{ $user->value('adresa') }},</p> 
				<p>21000 {{ $user->value('grad') }}, Srbija</p>
				<p>Telefon: {{ $user->value('telefon') }}</p>
			</td>
			<td style="
                 border-top: 1px solid black;">
				<p><h4>Broj porudžbine:</h4> #{{ $broj }}</p>
			</td>
			<td style="
                 border-top: 1px solid black;"></td>
			<td style="
                 border-top: 1px solid black;">
				<p><h4>Napomena:</h4> Nema napomene.</p>
			</td>
		</tr>
		@php
			$medjuzbir = 0;

		@endphp
		@foreach ($proizvod as $order)
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">


			<td style="
                 border-top: 1px solid black;"><h4>Proizvod:</h4><p>{{ $order->naziv }}</p><br></td>
			<td style="
                 border-top: 1px solid black;"><img style="width: 150px;" src="{!! 'http://eterra.brainzined.com/storage/' . $order->slika !!}"></td>
			<td style="
                 border-top: 1px solid black;"><h4>Količina:<p>{{ $order->pivot->quantity }}</p></h4></td>
			<td style="
                 border-top: 1px solid black;"><h4>Cena:</h4><p>{{ $order->cena }} RSD</p></td>
			<td style="
                 border-top: 1px solid black;"><h4>Ukupno:</h4><p> {{ $order->pivot->quantity*$order->cena }} RSD</p></td>
			
			@php
			$medjuzbir +=$order->pivot->quantity*$order->cena ;
			@endphp
			

		</tr>
		@endforeach
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="
                 border-top: 1px solid black;"></td><td style="
                 border-top: 1px solid black;"></td><td style="
                 border-top: 1px solid black;"></td>
			<td style="
                 border-top: 1px solid black;"><h4>Međuzbir:</h4></td>
			<td style="
                 border-top: 1px solid black;"><p>{{ $medjuzbir }} RSD</p></td>
		</tr>
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="border: none !important;"></td><td style="border: none !important;"></td><td style="border: none !important;"></td>
			<td style="border: none !important;"><h4>Dostava:</h4></td>
			<td style="border: none !important;"><p>300 RSD</p></td>
		</tr>
		<tr style="height: 50px;
    text-align: left;
    vertical-align: top;">
			<td style="border: none !important;"></td><td style="border: none !important;"></td><td style="border: none !important;"></td>
			<td style="border: none !important;"><h4>Ukupno za naplatu:</h4></td>
			<td style="border-bottom: 1px solid black !important; background-color: #5AA66E"><h4 style="color:white;"><strong>{{ 300+$medjuzbir }}  RSD</strong></h4></td>
		</tr>
	</table>

	
</body>
</html>