<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title>Flight Reservation System</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="World Cup - Responsive HTML5 Template soccer and sports">
        <meta name="author" content="iwthemes.com">  

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme CSS -->
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- Responsive CSS -->
        <link href="css/theme-responsive.css" rel="stylesheet" media="screen">
        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- Head Libs -->
        <script src="js/modernizr.js"></script>

        <!--[if IE]>
            <link rel="stylesheet" href="css/ie/ie.css">
        <![endif]-->

        <!--[if lte IE 8]>
            <script src="js/responsive/html5shiv.js"></script>
            <script src="js/responsive/respond.js"></script>
        <![endif]-->
	</head>






    
	<?php


	// query db
 
$origin = (isset($_POST['origin'])?$_POST['origin']: 'AGP');
$destination = (isset($_POST['destination'])?$_POST['destination']:'LHR');
$outbounddate = (isset($_POST['outbounddate'])?$_POST['outbounddate']:'2019-11-28 ');
$inbounddate = (isset($_POST['inbounddate'])?$_POST['inbounddate']:'');
$adults = (isset($_POST['adults'])?$_POST['adults']:'1');
$children = (isset($_POST['children'])?$_POST['children']:'0');


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
	
}


$array = json_decode($response, true);
$sid = $array['search_params']['sid'];
$sh = $array['summary']['sh'];


$searchhash = $sh;
$sessionkey = $sid;
//echo $sessionkey;
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








$curlurl = curl_init();

curl_setopt_array($curlurl, array(
	CURLOPT_URL => "https://tripadvisor1.p.rapidapi.com/flights/get-booking-url?searchHash=$searchhash&Dest=MXP&id=$itineraryid&Orig=FCO&searchId=$sessionkey",
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

?>

   
   
   
   
   
    <body>
    
       <!--Preloader-->
        <div class="preloader">
            <div class="status">&nbsp;</div>
        </div>
        <!--End Preloader-->
    
              

        <!-- layout-->
        <div id="layout">
            <!-- Header-->
            <header id="header" class="header-v1">
                <!-- Main Nav -->
                <nav class="flat-mega-menu">            
                    <!-- flat-mega-menu class -->
                    <label for="mobile-button"> <i class="fa fa-bars"></i></label><!-- mobile click button to show menu -->
                    <input id="mobile-button" type="checkbox">                          

                    <ul class="collapse"><!-- collapse class for collapse the drop down -->
                        <!-- website title - Logo class -->
                        <li class="title">
                            <a href="{{url('/')}}"><span>F</span>light Reservation<span>.</span></a> 
                            <i class="fa fa-rocket"></i>
                        </li>
                        <!-- End website title - Logo class -->

                        <li><a href="{{url('/')}}">HOME</a>
                            <div class="drop-down two-column hover-fade"><!-- drop down with two columns -->
                                <ul><!-- column one -->
                                    <li><a href="{{url('/')}}">Home Version 1</a></li>
                                    <li><a href="{{url('/')}}">Home Version 2</a></li>
                                    <li><a href="{{url('/')}}">Home Version 3</a></li>
                                    <li><a href="{{url('/')}}">Home Version 4</a></li>
                                </ul>
                                
                                <ul><!-- column two -->
                                    <li><a href="{{url('/')}}">Home Hotels</a> </li>
                                    <li> <a href="{{url('/')}}">Home Flights</a> </li>
                                </ul>
                            </div>
                        </li>
                        

                        <li>
                            <a href="contact.html">CONTACT</a>
                        </li>

                        <li class="social-bar"> <a href="#">FOLLOW US</a> 
                            <ul class="drop-down hover-zoom">
                                <li> <a href="#" target="_blank"><i class="fa fa-flickr"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-instagram"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-youtube"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-facebook"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a> </li>
                            </ul>
                        </li>
                        
                        <li class="login-form"> <i class="fa fa-user"></i><!-- login form -->
                            <ul class="drop-down hover-expand">
                                <li>
                                    <form method="post" action="#">
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="email" required="required" name="email" placeholder="Your email address"> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> 
                                                    <input type="password" required="required" name="password" placeholder="Password"> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <input type="submit" value="Login"> </td>
                                                <td> <label> <input type="checkbox" name="check_box"> Keep me signed in </label> </td>
                                            </tr>
                                        </table>
                                    </form>
                                </li>
                            </ul>
                        </li>  

                        <li class="search-bar"> <i class="fa fa-search"></i><!-- search bar -->
                            <ul class="drop-down hover-expand">
                                <li>
                                    <form method="post" action="#">
                                        <table>
                                            <tr>
                                                <td> <input type="search" required="required" name="serach_bar" placeholder="Type Keyword Here"> </td>
                                                <td> <input type="submit" value="Search"> </td>
                                            </tr>
                                        </table>
                                    </form>
                                </li>
                            </ul>
                        </li>           
                    </ul>
                </nav>
                <!-- Main Nav -->
            </header>
            <!-- End Header-->

            <!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_04_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02">
                     <div class="container">
                        <h1>Flight View</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li>/</li>
                                <li>Flights</li>  
                                <li>/</li>
                                <li>Flight List View</li>  
                            </ul>    
                        </div>
                    </div>  
                </div>  
                <!-- End Content Parallax--> 
            </div>   
            <!-- End Section Title-->

            <!--Content Central -->
            <div class="content-central">
                <!-- Shadow Semiboxed -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed -->

                <!-- End content info - page Fill with -->
                <div class="content_info">
                    <div class="container">
                        <div class="row">
                            <!-- Left Sidebar-->
                            <div class="col-md-3">
                                <div class="container-by-widget-filter bg-dark color-white">
                                    <!-- Widget Filter -->
                                    <aside class="widget padding-top-mini">
                                        <h3 class="title-widget">Search</h3>

                                        <!-- FILTER widget-->
                                        <div class="filter-widget">
                                                 <form action="{{url('flightsearch')}}"  method="POST">
                                                 <input type="text" name="origin" id="search" required="required" placeholder="Origin" class="input-large" />
                                                <ul class="list-group" id="result"></ul>
                                                <input type="text" name="destination" id="searchdestination" required="required" placeholder="Destination" class="input-large" />
                                                <ul class="list-group" id="result"></ul>
                                                 <input type="date" name= "outbounddate" required="required" placeholder="Departing On" class="date-input">
                                                <input type="text" name= "inbounddate"  placeholder="Returning On" class="date-input">
                                                 <input type="text" name="adults" id="adultsearch" required="required" placeholder="Adults" class="input-small" />
                                                 <input type="text" name="children" id="childrensearch" required="required" placeholder="Children" class="input-small" />
                            
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                               
                                                
                                                <input type="submit" value="Search">
                                            </form>
                                        </div>
                                         <!--END FILTER widget-->
                                    </aside>
                                    <!-- End Widget Filter -->

                                    <!-- Widget Filter Price Range-->
                                    <aside class="widget">
                                        
                                    </aside>
                                    <!-- End Widget Filter Price Range-->

                                    <!-- Widget Filter Stars-->
                                    <aside class="widget">
                                        <h4>Star Rating:</h4>
                                        <ul class="starts">
                                            <li><input type="checkbox" checked></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><span>5 Stars</span></li>
                                        </ul>

                                        <ul class="starts">
                                            <li><input type="checkbox" checked></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><span>4 Stars</span></li>
                                        </ul>

                                        <ul class="starts">
                                            <li><input type="checkbox"></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><span>3 Stars</span></li>
                                        </ul>

                                        <ul class="starts">
                                            <li><input type="checkbox" checked></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><span>2 Stars</span></li>
                                        </ul>

                                        <ul class="starts">
                                            <li><input type="checkbox"></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            <li><span>1 Stars</span></li>
                                        </ul>
                                    </aside>
                                    <!-- End Widget Filter Stars-->

                                    <!-- Widget Filter Radio -->
                                    <aside class="widget">
                                        <h4>Acomodation type </h4>
                                        
                                    </aside>
                                    <!-- End Widget Filter Radio -->

                                    <!-- Widget Filter checkbox -->
                                    <aside class="widget">
                                        <h4>Hotel Preferences</h4>
                                        <div class="checkbox">
                                            <label>
                                              <input type="checkbox">High-speed Internet (41)
                                            </label>
                                        
                                    </aside>
                                    <!-- End Widget Filter checkbox -->
                                </div>
                            </div>
                            <!-- End Left Sidebar-->

                            <div class="col-md-9">
                                <!-- Title Results-->
                                <div class="title-results">
                                    <h3>Quotes found <a href="#">view all</a></h3>
                                </div>
                                <!-- End Title Results-->
                                
                                <!-- sort-by-container-->
                                <div class="sort-by-container tooltip-hover">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <strong>Sort by:</strong>
                                            <ul>                            
                                                <li>
                                                    <div class="selector">
                                                        <select>
                                                            <option value="5">5 Starts</option>
                                                            <option value="4">4 Starts</option>
                                                            <option value="3">3 Starts</option>
                                                            <option value="2">2 Starts</option>
                                                            <option value="1">1 Starts</option>
                                                        </select>
                                                        <span class="custom-select">Users Rating</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="selector">
                                                        <select>
                                                            <option value="1">A To Z</option>
                                                            <option value="2">Z To A</option>
                                                        </select>
                                                        <span class="custom-select">Name</span>
                                                    </div>
                                                </li>  

                                                <li>
                                                    <div class="selector">
                                                        <select>
                                                            <option value="1">Sort Ascending</option>
                                                            <option value="2">Sort Descending</option>
                                                        </select>
                                                        <span class="custom-select">Price</span>
                                                    </div>
                                                </li>                            
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="style-view">
                                                <li data-toggle="tooltip" title="" data-original-title="BOX VIEW">
                                                    <a href="hotel-grid-view.html">
                                                        <i class="fa fa-th-large"></i>
                                                    </a>
                                                </li>
                                                <li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
                                                    <a href="hotel-list-view.html">
                                                        <i class="fa fa-list"></i>
                                                    </a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- sort-by-container-->
                                <div class="row list-view">
                                    
                                <?php 
                                        foreach($data['itineraries'] as $topic) {
                                           ?>
                                
                                <?php foreach($data['providers'] as $logo) { 
                                         ?>
                                            


 									<div class="col-md-12">
                                     
                                                
                                        <div class="img-hover">
                                         <img src="<?php echo $logo['l'];?>" alt="" class="img-responsive">
                                         
                                 <div class="overlay"> <a href= class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                                        </div>

                                        <div class="info-gallery">
                                            <h3>
                                            <?php echo $topic['l'][0]['pr']['dp'];?><br>
                                               
                                            </h3>
                                            <hr class="separator">
                                            
                                            <p>Departing on <?php echo $topic['f'][0]['l'][0]['dd'];?></p>
                                            <ul class="starts">
                             				<li><a href="#"><i class="fa fa-star"></i></a></li>
                             				 <li><a href="#"><i class="fa fa-star"></i></a></li>
                             				<li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                               				<li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="content-btn"><a href=<?php echo $finalurl;?> class="btn btn-primary">View Details</a></div>
                                            <div class="price"><span>£</span><b>From </b></div>
    
                                        
                    </div>
             </div>
            <?php  }; ?>
            <?php };  ?>
                                            
                                
                                    <!-- End Item Gallery List View-->

                                    <!-- pagination-->
                                    <div class="col-md-12">
                                        <ul class="pagination">
                                            <li><a href="#">«</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul> 
                                    </div> 
                                    <!-- End pagination-->               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- End content info - page Fill with  --> 
            </div>
            <!-- End Content Central -->
      
            <!-- footer-->
            <footer id="footer" class="footer-v1">
                <div class="container">
                    <div class="row">
                        <!-- Title Footer-->
                        <div class="col-md-5">
                            <div class="title-footer">
                                <h2>Save on your plans!
                                <br> <span>Select Us And Receive</span>
                                <br> our discounts by e-mail.</h2>
                            </div>

                            <p>You can choose your favorite destination and start planning your long-awaited vacation. We offer thousands of destinations and have a wide variety of hotels so that you can host and enjoy your stay without problems. Book now your trip flight2.test</p>
                        </div>
                        <!-- End Title Footer-->

                        <div class="col-md-7">
                            <div class="row">                             
                                <!-- Social Us-->
                                <div class="col-md-3">
                                    <h3>FOLLOW US</h3>
                                    <ul class="social">
                                        <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#">Facebook</a></li>
                                        <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#">Twitter</a></li>
                                        <li class="github"><span><i class="fa fa-github"></i></span><a href="#">Github</a></li>
                                    </ul>
                                </div>
                                <!-- End Social Us-->
                                
                                <!-- Recent links-->
                                <div class="col-md-5">
                                    <h3>TRAVEL SPECIALISTS </h3>
                                    <ul>
                                        <li><i class="fa fa-check"></i> <a href="#">Golf Vacations</a></li>
                                        <li><i class="fa fa-check"></i> <a href="#">Disney Parks Vacations</a></li>
                                        <li><i class="fa fa-check"></i> <a href="#">Vacations As Advertised</a></li>                                    
                                    </ul>
                                </div>
                                <!-- End Recent links-->

                                <!-- Contact Us-->
                                <div class="col-md-4">
                                   <h3>CONTACT US</h3>
                                   <ul class="contact_footer">
                                        <li>
                                            <i class="fa fa-envelope"></i> <a href="#">badr.bakkali1998@gmail.com</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-headphones"></i> <a href="#">55-5698-4589</a>
                                         </li>
                                        <li class="location">
                                            <i class="fa fa-home"></i> <a href="#"> 17 Stornoway, Hemel Hempstead</a>
                                        </li>                                   
                                    </ul>
                                </div>
                                <!-- Contact Us-->
                            </div>  

                            <div class="divisor"></div>
                            
                            <div class="row">
                                <!-- Newsletter-->
                                <div class="col-md-12">
                                    <h3>NEWSLETTER SIGN UP</h3>  
                                    <form id="newsletterForm" action="php/mailchip/newsletter-subscribe.php">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input class="form-control" placeholder="Your Name" name="name" type="text" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input class="form-control" placeholder="Your  Email" name="email" type="email" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="submit" name="subscribe">SIGN UP</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>   
                                    <div id="result-newsletter"></div>
                                </div>
                                <!-- end Newsletter-->
                            </div>                      
                        </div>
                    </div>
                </div>

                <!-- footer Down-->
                <div class="footer-down">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <p>&copy; 2020 . All Rights Reserved.  2020</p>
                            </div>
                            <div class="col-md-7">
                                <!-- Nav Footer-->
                                <ul class="nav-footer">
                                    <li><a href="{{url('/')}}">HOME</a> </li>
                                   
                                </ul>
                                <!-- End Nav Footer-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer Down-->
            </footer>      
            <!-- End footer-->
        </div>
        <!-- End layout-->

        <!-- ======================= JQuery libs =========================== -->
        <!-- jQuery local--> 
        <script src="js/jquery.js"></script>  
        <script src="js/jquery-ui.1.10.4.min.js"></script>                
        <!--Nav-->
        <script src="js/nav/jquery.sticky.js" type="text/javascript"></script>    
        <!--Totop-->
        <script type="text/javascript" src="js/totop/jquery.ui.totop.js" ></script>  
         <!--Accorodion-->
        <script type="text/javascript" src="js/accordion/accordion.js" ></script>  
        <!--Slide Revolution-->
        <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
        <!-- Maps -->
        <script src="js/maps/gmap3.js"></script>            
        <!--Ligbox--> 
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script> 
        <!-- carousel.js-->
        <script src="js/carousel/carousel.js"></script>
        <!-- Filter -->
        <script src="js/filters/jquery.isotope.js" type="text/javascript"></script>
        <!-- Twitter Feed-->
        <script src="js/twitter/jquery.tweet.js"></script> 
        <!-- flickr Feed-->
        <script src="js/flickr/jflickrfeed.min.js"></script>    
        <!--Theme Options-->
        <script type="text/javascript" src="js/theme-options/theme-options.js"></script>
        <script type="text/javascript" src="js/theme-options/jquery.cookies.js"></script> 
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script> 
        <script type="text/javascript" src="js/bootstrap/bootstrap-slider.js"></script> 
        <!--MAIN FUNCTIONS-->
        <script type="text/javascript" src="js/main.js"></script>
        <!-- ======================= End JQuery libs =========================== -->
    </body>
</html>






