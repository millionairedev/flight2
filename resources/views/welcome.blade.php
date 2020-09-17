

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title>Flight reservation system</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="World Cup - Responsive HTML5 Template soccer and sports">
        <meta name="author" content="iwthemes.com">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  
   



        <!--Preloader-->
        <div class="preloader">
            <div class="status">&nbsp;</div>
        </div>
        <!--End Preloader-->
    
        
        <!-- End Theme-options -->     

        <!-- layout-->
        <div id="layout">
            <!-- Header-->
            <header id="header" class="header-v2">
                <!-- Main Nav -->
                <nav class="flat-mega-menu">            
                    <!-- flat-mega-menu class -->
                    <label for="mobile-button"> <i class="fa fa-bars"></i></label><!-- mobile click button to show menu -->
                    <input id="mobile-button" type="checkbox">                          

                    <ul class="collapse"><!-- collapse class for collapse the drop down -->
                        <!-- website title - Logo class -->
                        <li class="title">
                            <a href="{{url('/')}}"><span>F</span>light website<span></span></a> 
                            <i class="fa fa-rocket"></i>
                        </li>
                        <!-- End website title - Logo class -->

                        <li><a href="{{url('/')}}">HOME</a>
                            <div class="drop-down two-column hover-fade"><!-- drop down with two columns -->
                                
                            </div>
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

                           
                    </ul>
                </nav>
                <!-- Main Nav -->
            </header>
            <!-- End Header-->

            <!-- Slide And Filter Section-->    
            <div class="tp-banner-container">
                <!-- SLIDE  -->
                <div class="tp-banner" >
                    <!-- SLIDES CONTENT-->
                    <ul> 
                        <!-- SLIDE  -->
                        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/slide/5.jpg"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                            <!-- LAYERS -->
                        </li>

                        <!-- SLIDE  -->
                        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/slide/6.jpg"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                            <!-- LAYERS -->
                        </li>

                        <!-- SLIDE  -->
                        <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                            <!-- MAIN IMAGE -->
                            <img src="img/slide/7.jpg"  alt="fullslide1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                            <!-- LAYERS -->
                        </li>
                    </ul> 
                    <!-- END SLIDES  --> 
                    <div class="tp-bannertimer"></div>  
                </div>
                 <!-- SLIDE CONTENT-->
                
                
                <div class="filter-title top-40">
                    <!-- FILTER HEADER-->
                    <div class="filter-header flights-filter">
                    
                   

                    <form action="{{url('flightsearch')}}"  method="POST">
                    
                            <ul class="list-group" id="result"></ul>
                            <input type="text" name="origin" id="search"  placeholder="Origin" class="input-large" />
                            <input type="text" name="destination" id="searchdestination"  placeholder="Destination" class="input-large" />
                            <ul class="list-group" id="result1"></ul>
                            <input type="date" name= "outbounddate"  placeholder="Departing On" class="date-input">
                            <input type="text" name= "inbounddate"  placeholder="Returning On" class="date-input">
                            <input type="text" name="adults" id="adultsearch"  placeholder="Adults" class="input-small" />
                            <input type="text" name="children" id="childrensearch"  placeholder="Children" class="input-small" />
                            <input type="submit" value="Search">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <script src="js/autocomplete.js"></script>
                        </form>




           

             
                        
                        
                    </div>
                    <!-- END FILTER HEADER--> 
                </div>
                <!-- END FILTERHEADER - TITLE HEADER -->
            </div>       
            <!-- End Slide And Filter Section-->

            <!--Content Central -->
            <div class="content-central">
                <!-- Shadow Semiboxed Layout -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed Layout -->

                <!-- End content info - Carousel boxes Section-->
                <div class="content_info">
                    <!-- carousel-boxes-2-->
                    <div id="carousel-boxes-2">
                        <!-- Item Boxed 2-->
                        <div class="boxes-2">
                            <img src="img/gallery-2/6.jpg" alt="">
                            <div class="info-boxes-2">
                                <h3>
                                    <i class="fa fa-plane"></i>
                                    <span class="up">From: $230</span>
                                    Paris To Spain
                                    <span class="down">
                                       AVIANCA - AIRLINE
                                    </span>
                                </h3>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        <!-- End Item Boxed 2-->

                        <!-- Item Boxed 2-->
                        <div class="boxes-2">
                            <img src="img/gallery-2/4.jpg" alt="">
                            <div class="info-boxes-2">
                                <h3>
                                    <i class="fa fa-plane"></i>
                                    <span class="up">From: $300</span>
                                    Lima To Cartagena
                                    <span class="down">
                                        LAN - AIRLINE
                                    </span>
                                </h3>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        <!-- End Item Boxed 2-->

                        <!-- Item Boxed 2-->
                        <div class="boxes-2">
                            <img src="img/gallery-2/7.jpg" alt="">
                            <div class="info-boxes-2">
                                <h3>
                                    <i class="fa fa-plane"></i>
                                    <span class="up">From: $360</span>
                                    Italy To Venecia
                                    <span class="down">
                                        COPA - AIRLINE
                                    </span>
                                </h3>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        <!-- End Item Boxed 2-->
                    </div>
                    <!-- End carousel-boxes-2-->
                </div>   
                <!-- End content info - Carousel boxes Section--> 

                <!-- End content info - White Section-->
                <div class="content_info">
                    <!-- Info Resalt-->
                    <div class="paddings-mini">
                        <div class="container wow fadeInUp">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Why we are different</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-styles">
                                                <li><i class="fa fa-check"></i> <a href="#">World Travel</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">First Class Flights</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">5 Star Accommodations</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">Inclusive Packages</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-6">
                                            <ul class="list-styles">
                                                <li><i class="fa fa-check"></i> <a href="#">Latest Model Vehicles</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">Best Price Guarantee</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">Great Experience</a></li>
                                                <li><i class="fa fa-check"></i> <a href="#">Great Travel Theme</a></li>
                                            </ul>
                                        </div>
                                    </div>    

                                    <!-- accrodation -->
                                    <div class="accrodation">
                                        <!-- section 1 -->
                                        <span class="acc-trigger"><a href="#">Mision</a></span>
                                        <div class="acc-container">
                                            <div class="content">
                                                Book cheap hotels and make payment facilities, free cancellation when the hotel so provides, compare prices and find all the options for your vacation.
                                            </div>
                                        </div>
                                      
                                        <!-- section 2 -->
                                        <span class="acc-trigger"><a href="#">Vision</a></span>
                                        <div class="acc-container">
                                            <div class="content">
                                                You can choose your favorite destination and start planning your long-awaited vacation. We offer thousands of destinations and have a wide variety of hotels so that you can host and enjoy your stay without problems. Book now your trip travelia.com.
                                            </div>
                                        </div>
                                   
                                        <!-- section 3 -->
                                        <span class="acc-trigger"><a href="#">What we offer?</a></span>
                                        <div class="acc-container">
                                            <div class="content">
                                                Find a wide variety of airline tickets and cheap flights, hotels, tour packages, car rentals, cruises and more in travelia.com.You can choose your favorite destination and start planning your long-awaited vacation.
                                            </div>
                                        </div>
                                        
                                        <!-- section 4 -->
                                        <span class="acc-trigger active"><a href="#">Our services</a></span>
                                        <div class="acc-container">
                                            <div class="content">
                                                You can also check availability of flights and hotels quickly and easily, in order to find the option that best suits your needs.Book cheap hotels and make payment facilities, free cancellation when the hotel so provides, compare prices and find all the options for your vacation.
                                            </div>
                                        </div>
                                    </div> 
                                    <!-- End accrodation -->
                                </div>

                                <div class="col-md-7">
                                    <h4>Offer Hotels Worldwide</h4>
                                    <div class="row list-view">
                                        <!-- Item Gallery List View-->
                                        <div class="col-md-12">
                                            <div class="img-hover">
                                                <img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
                                                <div class="overlay"><a href="img/hotel-img/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                                            </div>

                                            <div class="info-gallery">
                                                <h3>
                                                    Hotel Royal National<br>
                                                    <span>Gran Londres (Gran Bretaña)</span>
                                                </h3>
                                                <hr class="separator">
                                                <p>The Royal National is in London near Covent Garden and 100 meters from the British Museum.</p>
                                                <ul class="starts">
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                                <div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
                                                <div class="price"><span>$</span><b>From</b>110</div>
                                            </div>
                                        </div>
                                        <!-- End Item Gallery List View-->

                                        <!-- Item Gallery List View-->
                                        <div class="col-md-12">
                                            <div class="img-hover">
                                                <img src="img/hotel-img/2.jpg" alt="" class="img-responsive">
                                                <div class="overlay"><a href="img/hotel-img/2.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
                                            </div>

                                            <div class="info-gallery">
                                                <h3>
                                                    Hotel Holiday Inn Bilba<br>
                                                    <span>Bilbao , Vizcaya (España) </span>
                                                </h3>
                                                <hr class="separator">
                                                <p>The Holiday Inn Bilbao is in a prime location next to the Basilica of Begoña and the historical town of Bilbao.</p>
                                                <ul class="starts">
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                                                </ul>
                                                <div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
                                                <div class="price"><span>$</span><b>From</b>254</div>
                                            
                                            </div>
                                        </div>
                                        <!-- End Item Gallery List View-->            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Info Resalt-->
                </div>   
                <!-- End content info - White Section--> 

                <!-- End content info - Sponsors-->
                <div class="content_info no-overflow">
                    <!-- Title -->
                    
                    <!-- End Title-->

                    <!-- content-->
                   
                    <!-- End content-->
                  
                <!-- End content info - Sponsors--> 

                

                        <div class="image-container col-md-5 col-sm-3 pull-right">
                            <div class="bg_parallax image_02_parallax"></div>
                        </div>
                    </div>
                </div>
                <!-- End content info - Items Numbers  -->
            
            <!-- End Content Central -->
      
            <!-- footer-->
            <footer id="footer" class="footer-v4">
                <div class="container">
                    <div class="row">         
                        <div class="col-md-7">
                            <
                            
                            
                                               
                        </div>

                        <div class="col-md-offset-1 col-md-4">
                            <div class="img-footer">
                                <img src="img/image-footer-2.png" class="img-responsive" alt="img">
                            </div>
                        </div>      
                    </div>
                </div>

                <!-- footer Down-->
                <div class="footer-down">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <p>&copy; 2019 Badr . All Rights Reserved.  2019</p>
                            </div>
                            <div class="col-md-7">
                                <!-- Nav Footer-->
                                <ul class="nav-footer">
                                    <li><a href="/">HOME</a> </li>
                                    <li><a href="/flightsearch">FLIGHTS</a></li>
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

        <!--Slider Function-->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.tp-banner').show().revolution({
                    dottedOverlay:"none",
                    delay:9000,
                    startwidth:1000,
                    startheight:800,
                    minHeight:500,
                    navigationType:"none",
                    navigationArrows:"solo",
                    navigationStyle:"preview1"
                });             
            }); //ready
        </script>
        <!--End Slider Function-->
    </body>
</html>