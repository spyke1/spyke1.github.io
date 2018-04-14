<?php

	$apikey = 'API_KEY_HERE';
	
	require_once 'vendor/autoload.php';

	$opts = array(
		'http'=>array(
		'method'=>"GET",
		'header'=>"Accept: application/json\r\n" .
				  "Authorization: apikey ".$apikey."\r\n"
	)
	);
	
	$context = stream_context_create($opts);
	
	$data = file_get_contents("https://api.transport.nsw.gov.au/v1/live/hazards/incident/open", false, $context);
	$array_data = json_decode($data);
	
	$suburbs = array();
	
	
	//You can change the fields returned inside the for loop below.
	foreach ($array_data->{"features"} as $incident) {
		
		array_push($suburbs, array());
		$x = sizeof($suburbs) -1;
		$suburbs[$x]["suburb"] = $incident->{"properties"}->{"roads"}[0]->{"suburb"};
		$suburbs[$x]["description"] = $incident->{"properties"}->{"displayName"};
	};
	
	header('Content-Type: application/json');
	
	echo json_encode($suburbs);
?>