<!DOCTYPE html>
<html>
<head>
  <title>Crave Nation</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/offer_style.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  <style>   
  
body {
	background-color: #ddd;
	padding: 0px;
	text-align: center;
  
}



/* Wrapper */
.icon-button {
	background-color: white;
	border-radius: 20px;
	cursor: pointer;
	display: inline-block;
	font-size: 1.3rem;
	height: 2.6rem;
	line-height: 2.6rem;
	margin: 0 5px;
	position: relative;
	text-align: center;
	-webkit-user-select: none;
	   -moz-user-select: none;
	    -ms-user-select: none;
	        user-select: none;
	width: 2.6rem;
}

/* Circle */
.icon-button span {
	border-radius: 0;
	display: block;
	height: 0;
	left: 50%;
	margin: 0;
	position: absolute;
	top: 50%;
	-webkit-transition: all 0.3s;
	   -moz-transition: all 0.3s;
	     -o-transition: all 0.3s;
	        transition: all 0.3s;
	width: 0;
}
.icon-button:hover span {
	width: 2.6rem;
	height: 2.6rem;
	border-radius: 20px;
	margin: -1.3rem;
}

/* Icons */
.icon-button i {
	background: none;
	color: white;
	height: 2.6rem;
	left: 0;
	line-height: 2.6rem;
	position: absolute;
	top: 0;
	-webkit-transition: all 0.3s;
	   -moz-transition: all 0.3s;
	     -o-transition: all 0.3s;
	        transition: all 0.3s;
	width: 2.6rem;
	z-index: 10;
}

.twitter {
	background-color: rgba(64,153,255,.7);
}
.facebook  {
	background-color: rgba(80,122,189,.7);
}
.google-plus {
	background-color: rgba(219,90,60,.7);
}
.linkedin {
	background-color: rgba(16,134,200,.7);
}
.pinterest {
	background-color: rgba(203,32,39,.7);
}


/*HOVER*/

.twitter span{
	background-color: rgba(64,153,255,.7);
}
.facebook span {
	background-color: rgba(80,122,189,.7);
}
.google-plus span {
	background-color: rgba(219,90,60,.7); 
}
.linkedin span {
	background-color: rgba(16,134,200,.7);
}
.pinterest span {
	background-color: rgba(203,32,39,.7);
}

.icon-button:hover .icon-twitter,
.icon-button:hover .icon-facebook,
.icon-button:hover .icon-google-plus,
.icon-button:hover .fa-tumblr,
.icon-button:hover .fa-instagram,
.icon-button:hover .fa-youtube,
.icon-button:hover .fa-pinterest {
	color: white;
}

@media all and (max-width: 680px) {
  .icon-button {
    border-radius: 1.6rem;
    font-size: 0.8rem;
    height: 1.6rem;
    line-height: 1.6rem;
    width: 1.6rem;
  }

  .icon-button:hover span {
    width: 1.6rem;
    height: 1.6rem;
    border-radius: 1.6rem;
    margin: -0.8rem;
  }

  /* Icons */
  .icon-button i {
	  height: 1.6rem;
	  line-height: 1.6rem;
	  width: 1.6rem;
  }
 
  .pinterest {
   display: none; 
  }

}


@keyframes slide-up {
  from {
    padding-top: 100px;
    opacity: .25;
    line-height: 80px;
    opacity: .25;
        line-height: 500px;
  }
  to {
    padding-top: 0;
    opacity: 1;
    height: 25px;
    opacity: 1;
    line-height: 25px;
  }
}
    
.slide-up {
  animation: slide-up 5s;
}

.white-space-nowrap{
  white-space: nowrap;
}

.padding-10{
  padding: 10px;
}

.font-size-10{
  font-size: 14px;
}

.text-transform-initial{
  text-transform: initial;
}

.font-family-monospace{
  font-family: monospace;
}

 </style>
</head>
<body>
<div id="home">
<!-- Navigation Bar begin -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"><img src="images/logo11.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
        <a class="nav-link" href="{{url('cravenation.home')}}"><img src="images/home.png"></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('cravenation.about')}}">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#bottom">Contact</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{url('postpage.addItem')}}">Order</a>
      </li>
       
        <li class="nav-item active">
        @if($loggedin_user_email ==null)         
        <a href="{{route('cravenation.create')}}" class="btn btn-outline-light">Sign-up</a>    
        @endif
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="{{url('cravenation.cart2.1')}}">
        <img src="images/cart.png">
        <span class="badge badge-pill badge-danger">{{$cartItemCount}}</span>
        </a>
        </li>

        <li class="nav-item active">
        @if($loggedin_user_email !=null)         
        <a class="nav-link" href="{{url('cravenation.create')}}">
         <h5><i class="fa fa-user"></i> {{$loggedin_user_name}}</h5>
        </a>       
        @endif
      </li>

      <li class="nav-item active">
        @if($loggedin_user_email !=null)         
        <a class="nav-link" href="{{url('cravenation.loginsignup')}}">
         <h3><i class="fa fa-sign-out"></i></h3>
        </a>       
        @endif
      </li>

    </ul>
  </div>
</nav>
<!-- Navigation Bar end -->

<!-- ImageSlider begin -->
<div class="bd-example">
  <!-- <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel"> -->
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="2000">
        <img src="images/slider1.png" class="d-block w-100" alt="..." >
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slider2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slider3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slide (2).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slide (3).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slide (4).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slide (5).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="images/slide (6).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/slide (7).jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<!-- ImageSlider end -->

<!-- Offer Zone begin -->
<br><br>
<center><h1>Offer Zone</h1></center>
  <section>
    <div class="container-fluid">
      <div class="container">
        <div class="row">


        @foreach($offerZoneRestaurentData as $offerItem)

          <div class="col-xs-6 col-sm-4">
            <div class="box">
              <div class="imgBox">
                <img src="{{ URL::asset('uploads/restro/'.$offerItem->image) }}"  style="height: 290px;width: 350px">
              </div>
              <div class="content">
                <h3>{{$offerItem->resto_name}}</h3>
                <p>{{$offerItem->offer_title}}</p>
                <a href="{{url('cravenation.restro.'.$offerItem->id)}}" class="btn btn-default btnD">Order Now</a>
              </div>
            </div>            
          </div>

          @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- Offer Zone end  -->
  <!-- food section begin -->
  <center><h1 style="margin-top: 50px; margin-bottom:40px">Place your order with Crave Nation</h1></center>
  <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="search_input" type="text" name="" placeholder="Search for restaurants or cuisines. . .">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
    </div>
  <div class="greyBg">
    <div class="container">
		<div class="wrapper">
		    <div class="row">

		    		<div class="col-xs-6 col-sm-3">

				    	 <div class="nice-select">
               <select id="selectbox2" onchange="window.location.href='/cravenation.home/'+this.options[this.selectedIndex].value;">
                <option>Please select a category to search</option>
                 @foreach($categoryDropDownData as $cat)
	               <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
	               @endforeach
						   </select>
						</div>
            
				    </div>

				    <div class="col-xs-6 col-sm-3">

			

				    </div>
			
				<div class="col-xs-6 col-sm-3 hidden-xs pull-right">

							<!--select id="selectbox3">
							    <option value="">Sort By</option>
							    <option value="">Relevance</option>
							    <option value="">Rating</option>
							    <option value="">Low to High</option>
							    <option value="">High to Low</option>
							</select -->

				   </div>

           <div class="col-xs-6 col-sm-3 hidden-xs pull-right">
        
            <a href="{{url('postpage.addRestaurant')}}" class="btn btn-success">Add Restaurant</a>
            <a href="{{url('postpage.addItem')}}" class="btn btn-primary" style="color: white;">Add Food item</a>
            
            </div>

		    </div>

        <br>

	    	<div class="row top25">

         @foreach($allRestaurentData as $allItem)
	    		<div class="col-xs-6 col-sm-4">
	    			<div class="itemBox">
	    				<div class="prod">
              <a href="{{url('cravenation.restro.'.$allItem->id)}}">
              <img src="{{ URL::asset('uploads/restro/'.$allItem->image) }}" alt=""  style="height: 200px;width: 300px;padding-top: 10px"/>
              </a>
              </div>
              <h3>{{$allItem->resto_name}}</h3>
	    			</div>
	    		</div>
          @endforeach

	    	</div>
		</div>
	</div>		
</div>
  <!-- food section end -->
  </div>
  <!-- FOOTER SECTION BEGIN -->

  
  <footer id="bottom" style="background-image: url(images/morning.jpg);">
  <p class="slide-up">

<div class="footer-wrps">
 <div class="footer-bxcolmwrps">
  <div class="container animatedParent">

<p class="slide-up">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="ftr-blockwrps">
      <h3>Crave Nation
       <hr>
      </h3>
      <p>Satisfying your taste buds</p>

	  <div class="social-footwps copy-sco-wps">
      	<h3>Follow us on
         <hr>
        </h3>
        <a href="#" class="icon-button twitter"><i class="fa fa-twitter"></i>
<span></span></a>
<a href="#" class="icon-button facebook"><i class="fa fa-facebook"></i>
<span></span></a>
<a href="#" class="icon-button google-plus"><i class="fa fa-google"></i>
<span></span></a>
<a href="#" class="icon-button linkedin"><i class="fa fa-linkedin"></i><span></span></a>
<!-- <a href="#" class="icon-button pinterest"><i class="fa fa-pinterest"></i><span></span></a> -->
	   </div>
	   
	   

     </div>
    </div>

	
	<br/>
	
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 ">
     <div class="ftr-blockwrps">
      <h3>Quick Links
       <hr>
      </h3>
      <ul class="group">
       <li ><a href="http://www.thesmartbridge.com/" style="color:black"><i class="fa fa-angle-double-right"></i> Home</a></li>
       <li><a href="http://www.thesmartbridge.com/Aboutus" style="color:black"><i class="fa fa-angle-double-right"></i> About Us</a></li>
       <li><a href="http://www.thesmartbridge.com/Student" style="color:black"><i class="fa fa-angle-double-right"></i> Caterers</a></li>
       <li><a href="http://www.thesmartbridge.com/College" style="color:black"><i class="fa fa-angle-double-right"></i> Restaurants </a></li>
       <li><a href="http://www.thesmartbridge.com/Company" style="color:black"><i class="fa fa-angle-double-right"></i> Home Delivery</a></li>
       <li><a href="http://www.thesmartbridge.com/Mentor" style="color:black"><i class="fa fa-angle-double-right"></i> Chef's Recommendation </a></li>
       <li><a href="http://www.thesmartbridge.com/Welcome/contactus"  style="color:black"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
      </ul>
     </div>
    </div>
	
	<br/>
	
    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 animated fadeInUp go">
     <div class="ftr-blockwrps">
      <h3>Contact Us
       <hr>
      </h3>
     <div class="ftr-cnctwps">
        <p><i class="fa fa-map-marker"></i> <strong>REGISTERED ADDRESS</strong><br>H.no-06,Subhash Path,baridih,<br>jamshedpur,<br>pincode-831017</p>
        <p><i class="fa fa-map-marker"></i> <strong>CORPORATE ADDRESS</strong><br>morabadi,<br>ranchi pincode-</p>
         
       <p><i class="fa fa-phone"></i> <strong>Nidhi Singh</strong> <br>
			singhnidhi530@gmail.com <br>
			+91 6201389485
	   </p>
	   <p><i class="fa fa-phone"></i> <strong>Rahul kumar</strong> <br>
			rahulkr.mits@gmail.com <br>
			+91 7909033562
	   </p>


       <p><i class="fa fa-envelope"></i> <a href="cravenation.com" style="color:black">info@cravenation.com</a> </p>
      </div>
     </div>
    </div>
	 
	 <br/>
	 
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
     <div class="ftr-blockwrps">
      <h3>Timings
       <hr>
      </h3>
      <ul class="timings-ul">
       <li><label>Monday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Tuesday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Wednesday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Thursday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Friday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Saturday</label> <span>:</span> 9:30 am - 12.00 pm</li>
       <li><label>Sunday</label> <span>:</span>10:30 am - 11.00 pm</li>
      </ul>
     </div>
    </div>
	
   </div>
   
   
   </div>
   </div>
   </div>
   </p>
  </footer>
<!-- FOOTER SECTION END -->
</body>
</html>