<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://tripadvisor1.p.rapidapi.com/flights/create-session?currency=GBP&ta=1&c=0&d1=MXP&o1=FCO&dd1=2020-09-29",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: tripadvisor1.p.rapidapi.com",
		"x-rapidapi-key: 611189d0e6msh7ff09e834e88ad7p19b062jsn50828695a48f"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}


$array = json_decode($response, true);

/*$sid = $array['search_params']['sid'];
$sh = $array['summary']['sh'];


$searchhash = $sh;
$sessionkey = $sid;
//echo $sessionkey;

$curlsid = curl_init();

curl_setopt_array($curlsid, array(
	CURLOPT_URL => "https://tripadvisor1.p.rapidapi.com/flights/poll?currency=GBP&n=15&ns=NON_STOP%252CONE_STOP&so=PRICE&o=0&sid=$sessionkey",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: tripadvisor1.p.rapidapi.com",
		"x-rapidapi-key: 611189d0e6msh7ff09e834e88ad7p19b062jsn50828695a48f"
	),
));

$responsefinal = curl_exec($curlsid);
$err = curl_error($curlsid);

curl_close($curlsid);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $responsefinal;
}
$data = json_decode($responsefinal, TRUE);
$iid = $data['itineraries'][0]['l'][0]['id'];	

$itineraryid = $iid;

//echo $data['itineraries'][0]['l'][0]['pr']['dp'];


echo $searchhash . "+ " . $itineraryid  ."+ " . $sid;





/*$curlurl = curl_init();

curl_setopt_array($curlurl, array(
	CURLOPT_URL => "https://tripadvisor1.p.rapidapi.com/flights/get-booking-url?searchHash=$searchhash&Dest=MXP&id=$itineraryid&Orig=FCO&searchId=$sid",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: tripadvisor1.p.rapidapi.com",
		"x-rapidapi-key: 611189d0e6msh7ff09e834e88ad7p19b062jsn50828695a48f"
	),
));

$bookingurl = curl_exec($curlurl);
$err = curl_error($curlurl);

curl_close($curlurl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $bookingurl;
}
$urljson = json_decode($bookingurl, TRUE);
$finalurl = $urljson['partner_url'];
echo $finalurl;
?>














<!-- <div class="row list-view"> 
                                    <?php 
   									foreach($data['itineraries'] as $topic) {?>

 											<div class="col-md-12">
                                        <div class="img-hover">
                                            <img src="img/hotel-img/2.jpg" alt="" class="img-responsive">
                                           
                                            <div class="overlay"
                                           
                                              
                                            <a href= class="fancybox">  
                                            
                                            
                                             <i class="fa fa-plus-circle"></i></a></div>
                                        </div>

                                        <div class="info-gallery">
                                            <h3>
                                            <?php echo $topic['l'][0]['pr']['dp'];?><br>
                                               
                                            </h3>
                                            <hr class="separator">
                                            
                                            <p>Departing on </p>
                                            <ul class="starts">
                             				<li><a href="#"><i class="fa fa-star"></i></a></li>
                             				 <li><a href="#"><i class="fa fa-star"></i></a></li>
                             				<li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                               				<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                    </ul>
<div class="content-btn"><a href=<?php /*echo $topic['PricingOptions'][0]['DeeplinkUrl'];*/?> class="btn btn-primary">View Details</a></div>
                         
			