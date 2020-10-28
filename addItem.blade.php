<html>
<head>

		<link href="css/w3.css" rel="stylesheet"/>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<link href="fa.css" rel="stylesheet"/>
		<link href="owl/assets/owl.carousel.min.css" rel="stylesheet"/>
		<link href="owl/assets/owl.theme.default.min.css" rel="stylesheet"/>
		<script src="jq.js"></script>
		<script src="owl/owl.carousel.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<style type="text/css">
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 500px;
	padding: 30px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
	background: #4D4D4D;
	text-transform: uppercase;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #797979;
	font-size: 18px;
	font-weight: 100;
	padding: 20px;
	margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select 
{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	outline: none;
	display: block;
	width: 100%;
	padding: 7px;
	border: none;
	border-bottom: 1px solid #ddd;
	background: transparent;
	margin-bottom: 10px;
	font: 16px Arial, Helvetica, sans-serif;
	height: 45px;
}
.form-style-8 textarea{
	resize:none;
	overflow: hidden;
}
.form-style-8 input[type="button"], 
.form-style-8 input[type="submit"]{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #2CBBBB;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 8px 18px;
	text-decoration: none;
	text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover, 
.form-style-8 input[type="submit"]:hover {
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
}
</style>

</head>
	<body style="background-image:url(images/about2.jpg);filter: brightness(80%);" >
	<div class="form-style-8">
  <h2 style="color:white;">Add Food item(s)
  <a href="{{url('cravenation.home')}}" style="float: right;" class="btn btn-success">Home</a>
  </h2>
  <form  action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
{{  csrf_field()  }}

    <lagel> Restaurant(s)</lable>
	<select name="resto_id" class="form-control">
	<option>Please select a Restaurant</option>
	@foreach(App\AddRestro::all() as $restoData)
	<option value="{{$restoData->id}}">{{$restoData->resto_name}}</option>
	@endforeach
	</select>

    <input type="text" name="food_name" placeholder="Food Item" />

	<lagel> Category</lable>
	<select name="category_id" class="form-control">
	<option>Please select a category</option>
	@foreach(App\Category::all() as $cData)
	<option value="{{$cData->id}}">{{$cData->cat_name}}</option>
	@endforeach
	</select>
    <input type="text" name="food_price" placeholder="Price" />
	<input type="file" name="image"></br></br>
	<button type="submit" name="submit">Save Data</button>

  </form>
	</div>

	<div class="container" align="center">
	<div class="col-md-10">
		<div class ="card">
			<div class="content">
				<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Restaurant</th>
						<th>Food Name</th>
						<th>Food Price</th>
						<th>Food Category</th>
						<th>Image</th>
					</tr>
					</thead>
					@foreach($foodItemListData as $list)
					<tr>
					    <td>{{$list->resto_name}}</td>
						<td>{{$list->food_name}}</td>
						<td>{{$list->food_price}}</td>
						<td>{{$list->cat_name}}</td>
						<td>
						 <img src="{{ URL::asset('uploads/food/'.$list->image) }}" alt=""  style="height: 35px;width: 60px; padding-top: 5px"/>
						</td>
					</tr>	
						@endforeach

				</table>
			</div>
		</div>
	</div>
  </div>

</body>
</html>
