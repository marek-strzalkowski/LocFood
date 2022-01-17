<?php
if(!empty($_GET['search'])){
    
	include('scripts/config.php');
	
    $geocode = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($_GET['search']).'&key='.$google_key.'';
    $coordinates = file_get_contents($geocode);

    file_put_contents("data.json", $coordinates);

 
    if(!empty($coordinates)){
        $array = json_decode($coordinates, true);         
        if($array['status']=="OK"){
            $lat =  $array['results'][0]['geometry']['location']['lat'];
            $lng = $array['results'][0]['geometry']['location']['lng'];
            
            $nearby_api = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$lat.'%2C'.$lng.'&radius='.$radius.'&type=restaurant&key='.$google_key.'';
            $places_list = file_get_contents($nearby_api);
            $places = json_decode($places_list,true);
        }
    }
	
}

include('render/home.php');
?>
