<!DOCTYPE html>

<html>
	<head>
		<title>
		weather-web-page
		</title>

		<link rel="stylesheet" href="style.css">


		<style type='text/css'>
			body
			{
				background-image: url('weather.jpg');
				background-repeat: no-repeat;
  				background-size: cover;
			}
			#city
			{
				font-size : 20px;
				border-radius : 4px;
				

			}
			#bt1
			{
				font-size : 20px;
				padding: 15px 30px;
				text-align: center;
				background-color : green;
				border-radius : 4px;
				color: white;
			}
			#hd1
			{
				color: red;
				text-align: center;
			}
			#div1
			{
				display: flex;
				justify-content: center;
			}
			.bg1
			{
				background-image: url("snowfall.jpg");
				background-repeat: no-repeat;
  				background-size: cover;
			}
			.bg2
			{
				background-image: url("rainy.jpg");
				background-repeat: no-repeat;
  				background-size: cover;
			}
			.bg3
			{
				background-image: url("sunny.jpg");
				background-repeat: no-repeat;
  				background-size: cover;
			}
		</style>
	</head>
	<body id='page_body'>
		<br>
		<br>
		<form action="" method="post">
			<h1 id='hd1'><label for="location">Check your weather!</label></h1>

			<div id='div1'>
				<input type='text' id='city' placeholder="city" name="city">
				
				<!--change the '1' below to some variable which denotes the tye of weather at the location >
				<!the background image will get changed according to the value of 
				variable -->
				
				<button type="submit" name="sub" >View</button>
			</div>
		</form>
		<br>
		<br>
		<br>
		<div class="card" id="card">
			<div class="container">
			<?php
				error_reporting(E_ERROR | E_PARSE);
				if ($_POST["city"])
				{

					$city = $_POST['city'];

					// $country = $_POST['cc'];

					$url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&cnt=7&lang=en&appid=9d170c1ab1e342e5efb1f239653057de";


					$json=file_get_contents($url);
					if ($json)
					{
						$data=json_decode($json,true);

						echo "<h2>Current Temperature in " . $city . " is :<button class='btn btn-success'>" . $data['main']['temp'] . "&#176; Celcius</button></h2>";

						echo "<h2>Wind Speed is :<u>" . $data['wind']['speed'] . "</u> KMPH</h2>";

						echo "<h2>Humidity is :<u>" . $data['main']['humidity'] . "</u> %</h2>";

						

						echo  "<h2>Weather condition:<u>" . $data['weather'][0]['main']  . "</u>";

						

						echo "<img src='http://openweathermap.org/img/w/" .$data['weather'][0]['icon']. ".png' width='90' height='90'></h2>";
					}
					else
					{
						echo "<h2>This city is not in our database !</h3>";
					}

					
				}
				else
				{

					echo "Please Enter City Name";
				}
				
			?>
			</div>
		</div>
	</body>

</html>
