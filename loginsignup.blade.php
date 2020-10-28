
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha393-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"crossorigin="anonymous"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
	 <style>
		 *{
	box-sizing: border-box;
}

body {
	padding-top: 100px;
	font-family: 'Montserrat', sans-serif;
	background: #f6f5f7;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}
p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}
span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

.formContainer {
	background: #fff;
	border-radius: 10px;
	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container form {
	background: #dacece;
	display: flex;
	align-items: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	justify-content: center;
	align-content: center;
	text-align: center;
}

.socialContainer {
	margin: 20px 0;
}

.socialContainer a{
	border: 1px solid #ddd;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

.form-container input {
	background: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

button {
	border-radius: 20px;
	border: 1px solid #ff4b2b;
	background: #ff4b2b;
	color: #fff;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}
button:focus {
	outline: none;
}

button.overlaybtn{
	background: transparent;
	border-color: #fff;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}
.signInContainer {
	left: 0;
	width: 50%;
	z-index: 2;
}
.signUpContainer {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.overlayContainer{
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}
.overlay {
/*	background: #ff416c;
	background: linear-gradient(to right, #ff4b2b, #ff416c) no-repeat 0 0 /cover;*/
	background: url(../images/1.png);
	background-size: cover;
	background-position: center;
	color: #fff;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-panel{
	position: absolute;
	top: 0;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 0 40px;
	height: 100%;
	width: 50%;
	text-align: center;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;

}
.overlayRight {
	right: 0;
	transform: translateX(0);
}
.overlayLeft {
	transform: translateX(-20%);
}

/*Move SignIn to the right*/
.formContainer.right-panel-active .signInContainer {
	transform: translateX(100%);
} 

/*Move SignUP Overlay to the left*/

.formContainer.right-panel-active .overlayContainer {
	transform: translateX(-100%);
}

/*Bring signUp over signIn*/
.formContainer.right-panel-active .signUpContainer {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
}
/*Move overlay back to right*/
.formContainer.right-panel-active .overlay {
	transform: translateX(50%);
}

.formContainer.right-panel-active .overlayLeft {
	transform: translateX(0%);

}
.formContainer.right-panel-active .overlayRight {
	transform: translateX(20%);

}

#roleDropdown{
	background: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 121%;
}

 </style>

</head>

  @if($errors-> any())
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $errors)
    <li>{{$errors}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  <!-- @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif -->
 

<div class="formContainer" id="formContainer">
	<div class="form-container signUpContainer">
		<form method="post" action="{{url('cravenation')}}">
		{{csrf_field()}}
			<!-- <img src="images/logo.png" height="100px" width="180px"/> -->
			<h1>Create Account</h1>
			<div class="socialContainer">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name"/>
			<input type="email" placeholder="Email" name="email" />
			<input type="password" placeholder="Password" name="password"/>
			  <div class="nice-select">
               <select name="user_role" id="roleDropdown">
                <option>Please select a category</option>
				@foreach($roleDropDownData as $rData)
				   <option value="{{$rData->id}}">{{$rData->user_role}}</option>
	               @endforeach
				 <!-- @foreach(App\Role::all() as $rData)
	               <option value="{{$rData->id}}">{{$rData->user_role}}</option>
	               @endforeach -->
			   </select>
			 </div>
			<button type="submit">SIGN UP</button>

		</form>
	</div>

	<div class="form-container signInContainer">
		<form  action="{{ route('loginUser') }}" method="POST">
		<!-- <input type="hidden" name="token" value="{{csrf_field()}}"> -->
		{{csrf_field()}}
			<!-- <img src="images/logo.png" height="100px" width="180px"> -->
			<h1>Sign in</h1>
			<div class="socialContainer">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	
	<div class="overlayContainer">
		<div class="overlay">
			<div class="overlay-panel overlayLeft">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="overlaybtn" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlayRight">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="overlaybtn" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div><br><br><br>

<script>

const signUpBtn = document.getElementById('signUp');
const signInBtn = document.getElementById('signIn');
const container = document.getElementById('formContainer');

signUpBtn.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInBtn.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
