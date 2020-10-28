<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <style>
/*We will import 2 fonts*/
/*fontawesome iconfont*/
@import url(http://thecodeplayer.com/uploads/fonts/fontawesome/css/font-awesome.min.css);
/*Montserrat for the text*/
@import url(http://fonts.googleapis.com/css?family=Montserrat); 

/*basic reset*/
* {margin: 0; padding: 0;}

body {
	font-family: montserrat;
	padding-top: 100px;
	color: #333;
}

h1 {
	font-size: 16px;
	padding: 15px;
	text-align: center;
}

ul {
	width: 290px;
	margin: 0 auto;
}
ul li {
	list-style-type: none;
	padding: 10px;
}

/*Adding custom checkbox icons*/
label {
	position: relative;
	padding-left: 30px;
	font-size: 14px;
	cursor: pointer;
}
label:before, label:after {
	font-family: FontAwesome;
	font-size: 21px;
	/*absolutely positioned*/
	position: absolute; top: 0; left: 0;
}
label:before {
	content: '\f096'; /*unchecked*/
}
label:after {
	/*content: '\f046'; /*checked*/*/
	/*checked icon will be hidden by default by using 0 max-width and overflow hidden*/
	max-width: 0;
	overflow: hidden;
	opacity: 0.5;
	/*CSS3 transitions for animated effect*/
	transition: all 0.35s;
}

/*hiding the original checkboxes*/
input[type="checkbox"] {
	display: none;
}
/*when the user checks the checkbox the checked icon will animate in*/
input[type="checkbox"]:checked + label:after {
	max-width: 25px; /*an arbitratry number more than the icon's width*/
	opacity: 1; /*for fade in effect*/
}

/*adding some colors for fun*/
#one+label:before, #one+label:after {color: hsl(0, 45%, 40%);}
#two+label:before, #two+label:after {color: hsl(60, 45%, 40%);}
#three+label:before, #three+label:after {color: hsl(120, 45%, 40%);}



/* Common style */
.grid figure {
	position: relative;
	float: left;
	overflow: hidden;
	margin: 10px 1.5%;
	min-width: 300px;
	max-width: 480px;
	max-height: 360px;
	width: 20%;
	height: 40%;
	background: #3085a3;
	text-align: center;
	cursor: pointer;

}

/* Individual effects */


/*-----------------*/
/***** Apollo *****/
/*-----------------*/

figure.effect-apollo {
	background: #3498db;
}

figure.effect-apollo img {
	opacity: 0.95;
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
	-webkit-transform: scale3d(1.05,1.05,1);
	transform: scale3d(1.05,1.05,1);
}

figure.effect-apollo figcaption::before {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(255,255,255,0.5);
	content: '';
	-webkit-transition: -webkit-transform 0.6s;
	transition: transform 0.6s;
	-webkit-transform: scale3d(1.9,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,-100%,0);
	transform: scale3d(1.9,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,-100%,0);
}

figure.effect-apollo p {
	position: absolute;
	right: 0;
	bottom: 0;
	margin: 3em;
	padding: 0 1em;
	max-width: 150px;
	border-right: 4px solid #fff;
	text-align: right;
	opacity: 0;
	-webkit-transition: opacity 0.35s;
	transition: opacity 0.35s;
}

figure.effect-apollo h2 {
	text-align: left;
}

figure.effect-apollo:hover img {
	opacity: 0.6;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

figure.effect-apollo:hover figcaption::before {

	-webkit-transform: scale3d(1.9,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,100%,0);
	transform: scale3d(1.9,1.4,1) rotate3d(0,0,1,45deg) translate3d(0,100%,0);
}

figure.effect-apollo:hover p {
	opacity: 1;
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
}

/* body {
  font-family: "Lato", sans-serif;
} */

.sidenav {
  height: 100%;
  width: 330px;
  position: relative;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #000;
  overflow-x: hidden;
  padding-top: 600px;
  padding-bottom: 500px;
}

.sidenav a{
  padding: 2px 8px 6px 16px;
  text-decoration: none;
  font-size: 17px;
  color: #818181;
  display: block;
  background-color: #000;
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


		@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
.red-heart-checkbox {
  visibility: hidden;
}
.red-heart-checkbox + label {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-size: 30px;
  padding-left: 15px;
  transition: all 0.2s;
  color: white;
}
.red-heart-checkbox:checked + label:before {
  content: "";
  color: #f00;
}
.red-heart-checkbox + label:before {
  width: 31.5px;
  height: 30px;
  content: "";
  position: absolute;
  margin-left: -48px;
  margin-top: 3px;
  font-family: FontAwesome;
  font-size: 30px;
  content: "";
  transition: all 0.3s;
  color: #fff;
}
.red-heart-checkbox + label:hover:before {
  transform: scale(1.2);
}

html,
body {
  height: 100%;
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.control-group {
  margin: 3px;
}

.attribution {
  position: absolute;
  bottom: 0;
  width: 100%;
  text-align: center;
}

body {
  font-family: Open Sans, Helvetica;
}

a,
a:visited,
a:hover {
  text-decoration: none;
}

h1 {
  text-align: center;
}

		.rep{
			padding: 30px;
		}
	</style>
	<title>Restaurant</title>
</head>
<body>
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
<table style="background-color: #161717;width: 100%;height: 20%;">
	<tr>
		
		<td class="rep" style="color: white"; >
		  <img src="{{ URL::asset('uploads/restro/'.$restroDetails[0]->image) }}" height="150px" width="200px"/>
		</td>
		<td></td>
		<td style="color: white";>
		<h2>{{$restroDetails[0]->resto_name}}</h2>
		<br>
			<p style="color: white";> <img src="images/download.png" width="20px" height="20px">&nbsp&nbsp4.1 &nbsp&nbsp | &nbsp&nbsp 31 mins &nbsp&nbsp |&nbsp&nbsp  ₹ 400 for two &nbsp&nbsp</p>
			<input type="search" placeholder="search for dishes..." name="search " style="height: 40px">
		</td>
	    <td style="color: white";>

        <ul style="width: 90%;">
         @foreach($categoryDropDownData as $category)
		 <li>
		  <input type="checkbox" name="three" id="$category->id" />
		  <label for="three">{{$category->cat_name}}</label>
		  
	     </li>
        @endforeach
	
        </ul>

		
   

	    </td>
	    <td style="width: 18%;" >
	    	<div class='container'>
    		<div class='control-group'>
    		  <input class='red-heart-checkbox' id='red-check2' type='checkbox'>
     		 <label for='red-check2'>
    			    Favourite
     		 </label>
   			 </div>
			 </div>
		</td>

		<td>
		   <a href="{{url('postpage.addRestaurant')}}" class="btn btn-success" style="color: white;">Add new Restaurant</a>
		</td>

		<td>
		   <a href="{{url('postpage.addItem')}}" class="btn btn-primary" style="color: white;">Add Food item</a>
		</td>

	</tr>
</table>
<table>
	<tr>
		<td width="5%">
			<!-- span class="sidenav" style="background-color: black;">
			  <a href="#">Recommended</a>
			  <a href="#">Trending Now</a>
			  <a href="#">Chicken</a>
			  <a href="#">Burgers</a>
			   <a href="#">Rice Bowlz</a>
			  <a href="#">Snacks</a>
			<a href="#">Beverages</a>
			</span -->
		</td>
		
		<td width="95%">
             <br>
		
			<h2>
			Recommended &nbsp; 
			<a href="{{url('cravenation.gormet')}}"  class="btn btn-outline-primary">View Menu</a>
			&nbsp;
			<a href="{{url('cravenation.cart2.1')}}"  class="btn btn-outline-dark">Go To Cart</a>
			</h2>
			
			<p>{{$foodItemCount}} item(s)</p>

			<div class="grid">

			@foreach($foodItemListData as $foodItem)

			        <figure class="effect-apollo">

						<img src="{{ URL::asset('uploads/food/'.$foodItem->image) }}" alt="img18" width="100%" height="370px"/>
						<figcaption>
						<p>
						<a href="{{url('cravenation.cart2.'.$foodItem->id)}}"  class="btn btn-primary">Add to cart</a>
						<br>
						<span style="font-size: 18px;color: white;float: left;">{{$foodItem->food_name}}</span>
						<span style="font-size: 18px;color: white;float: left;">Price : {{$foodItem->food_price}}</span>
						</p>
						</figcaption>	

			      </figure>

              @endforeach

			</div>
		</td> 

</tr>

</table>
</body>
</html>