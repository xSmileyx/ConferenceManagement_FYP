<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Description: Template for XHTML1.0 Strict with an external CSS -->
<!-- Author: Rayner Paun -->
<!-- Date: 24/3/2016 -->
<!-- Validated: 24/3/2016 -->

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="author" content="Rayner Paun" />
	<meta name="description" content="The home page of the CMROP." />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="loginForm.js"></script>
	 <script src="js/modernizr.custom.63321.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css" />
		
		<style>
			body {
				background: #e1c192 url(wood_pattern.jpg);
			}
		</style>
		
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
</head>

<body>

<div id="container">

		<header>
			
			<img src="FYPbanner.jpg" width="100%" height="300" border="0" />
				<ul id = "nav">
				</ul>	
		</header>

			<section class="main">
				<form action="index.php" class="form-2" method="post">
					<h1><span class="log-in">Log in</span> or <span class="sign-up">register</span></h1>
					<p class="float">
						<img src="user_icon.png" width="12" height="12" id="iUser"/>  
						<label for="login">Username ID</label>
						<input type="text" name="user" id="username" autocomplete=off>
					</p>
					
					<p class="float">
						<img src="pass_icon.png" width="14" height="14" id="iPass"/>  
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="showpassword" autocomplete=off>
					</p>
					<p class="clearfix"> 
						<a href="Register.php" class="log-register">Register</a>    
						<input type="submit" name="submit" value="Log in">
					</p>
					
				</form>​​
			</section>
	<div id="footer">	
			<hr>
			<p>Created by: Rayner Paun<br>
			Student ID: 4308875<br>
			Email Address: <a href="mailto:4308875@students.swinburne.edu.my">
			4308875@students.swinburne.edu.my</a></p>
	</div>
</div>
	
</body>

</html>

<?php

if(isset($_POST["submit"]))
	{
		
		//the variables are initialized and retrieved AFTER the submit button is clicked
		$username = $_POST["user"];
		$password = $_POST["password"];

		validateInput($username,$password); //calling the function
		
	}
	
function validateInput($user,$pass)
	{
		if((empty($user)) || (empty($pass)))//checks if both text field in empty
			{
				echo '<script language="javascript">';
				echo 'alert("Do not leave any of the fields empty!")';
				echo '</script>';
			}
		else if(($user !== "admin") || ($pass !== "123"))
			{
				echo '<script language="javascript">';
				echo 'alert("Wrong username or password!")';
				echo '</script>';
			}
		else if(($user == "admin") || ($pass == "123"))
		{
				header('Location: Main.html');
				exit;
			}
			
		
	}

?>