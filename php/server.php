<?php
	error_reporting(0);
	if (isset($_POST['city'])) {
		# code...
		$query = $_POST['city'];

		//resource address
		$apikey = '302e3b8915e94c87f49b2d452bb1c896';
		$url = 'http://api.openweathermap.org/data/2.5/weather?q='.$query.'&appid='.$apikey;
		//send request to resource
		$client = curl_init($url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		//get response from resource
		$response = curl_exec($client);
		//decode json
		$response = json_decode($response);
		
		//get values;
		$country = $response->sys->country;
		$weatherDesc = $response->weather[0]->description;
		$cTempKel = $response->main->temp;
		$maxTempKel = $response->main->temp_max;
		$minTempKel = $response->main->temp_min;
		$humidity = $response->main->humidity;

		//convert Temp to Celsius
		$tempCel = $cTempKel - 273.15;
		$maxCel = $maxTempKel - 273.15;
		$minCel = $minTempKel - 273.15;

		echo '<p>Weather in '.$query.', '.$country.' - '.$weatherDesc.'<br><br>
				<span>Temperature '.$tempCel.'&#8451;</span>, Min Temp '.$minCel.'&#8451; - Max Temp '.$maxCel.'&#8451;<br><br>
				 Humidity '.$humidity.'%
			</p>';


	}// end code...
?>


