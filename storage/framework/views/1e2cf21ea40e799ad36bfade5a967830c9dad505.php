<!DOCTYPE html>
<html lang="en">
<head>
	<title>PJ technology zone</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="tvendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="tfonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="tvendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="tvendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="tcss/util.css">
	<link rel="stylesheet" type="text/css" href="tcss/main.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body>
		
	<!--  -->
	<div class="row">
		<div class="col">
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('timages/bg1.gif'); opacity:0.5;filter: alpha(opacity=50);"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('timages/bg03.jpg');opacity:0.5;filter: alpha(opacity=50);"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('timages/bg04.jpg');opacity:0.5;filter: alpha(opacity=50);"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('timages/bg02.jpg');opacity:0.5;filter: alpha(opacity=50);"></div>
	</div></div>
	<div class="flex-col-c-sb size1 overlay1  ">
		

		<!--  -->
		<div class=" flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
				<h1 align="center" style="color:orange;">
						<img src="timages/icons/artificial.png" class="center" width="200" height="200">
					</h1>
					<h3 style="color:#FFFFFF;">
							Call us more information :-071 011 3861
					</h3>
					<a href="https://www.facebook.com/artificiallimbcareSL/" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5" target="_blank">
							<i class="fa fa-facebook"></i>
						</a> 
						<h3 style="color:orange;">
						PJ technology zone website coming Soon
						</h3>

			<div class="flex-w flex-c-m cd100">
				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 days"><p id="demo"></p></span>
					<span class="s1-txt1 where1 p-l-35">Days</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 hours"><p id="demoh"></p></span>
					<span class="s1-txt1 where1 p-l-35">Hours</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 minutes"><p id="demom"></p></span>
					<span class="s1-txt1 where1 p-l-35">Minutes</span>
				</div>

				<div class="flex-col-c wsize1 m-b-30">
					<span class="l1-txt2 p-b-9 seconds"><p id="demos"></p></span>
					<span class="s1-txt1 where1 p-l-35">Seconds</span>
				</div>
			</div>
		</div>




	</div>
	

<!--===============================================================================================-->	
	<script src="tvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="tvendor/bootstrap/js/popper.js"></script>
	<script src="tvendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="tvendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="tvendor/countdowntime/moment.min.js"></script>
	<script src="tvendor/countdowntime/moment-timezone.min.js"></script>
	<script src="tvendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="tvendor/countdowntime/countdowntime.js"></script>
	
<!--===============================================================================================-->
	<script src="tvendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="tjs/main.js"></script>
	<script>
		// Set the date we're counting down to
		var countDownDate = new Date("July 16, 2019 09:09:00").getTime();
		
		// Update the count down every 1 second
		var x = setInterval(function() {
		
		  // Get todays date and time
		  var now = new Date().getTime();
			
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
			
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
		  // Output the result in an element with id="demo"
		  document.getElementById("demo").innerHTML = days ;
		  document.getElementById("demoh").innerHTML = hours ;
		  document.getElementById("demom").innerHTML = minutes ;
		  document.getElementById("demos").innerHTML = seconds ;
			
		  // If the count down is over, write some text 
		  if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		  }
		}, 1000);
		</script>
</body>
</html>