<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/login.css");

	echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));


	function showForm($errorMsg=false, $errorTxt="") {
	
		$message = ""; //used for displaying messages on form
		
		//is the form being submitted or displayed for the first time
		if (isset($_POST['submit']))
		{
			$message = "";
			//make sure cat exists and other validation
			
		}

		if ($errorMsg) {
			echo '<script>alert("'.$errorTxt.'");</script>';
		}
		if ($message != "")
			echo "<h2 class='msg'>$message</h2>";
			echo '
				<div class="loginContainer">

					<div id = "loginForm">

						<form method="POST">
						<img class="logo" src="assets/images/Aardvark logo clear horizontal.png">
						<br> 
						<p>Enter your email or username and we will send you a link to get back into your account.</p>
						<br>
						<input class="input" type="text" name="email" placeholder="Emai" id="email" required />
						<br>

						<div class="link">
						<a href="register.php">Sign Up</a>
						</div>
						<br>
						<input type="submit" name="submit" class="loginButton" value="Apply" />
							
						</form>
					
					</div>

					<div class="logoImage">
				
					</div>
			
				</div>';
		} //showForm
	
?>

<?php

if (!isset($_POST['submit'])) {
	showForm();
} else {
	//Init error variables
	$errorMsg = false;
	$errorText = "ERRORS: ";
 
	$name = isset($_POST['username']) ? trim($_POST['username']) : '';
	$pass = isset($_POST['password']) ? trim($_POST['password']) : '';
	
  	if($name == "" || !emailcheck($name) || strlen($name) > 30 || $name == "Enter a name") {
    	$errorText = $errorText.'You must enter a valid name.\n';
    	$errorMsg = true;
  	}


  	if($pass == ""  || strlen($pass) > 30) {
    	$errorText = $errorText.'You entered an invalid password.';
    	$errorMsg = true;
  	}
    $errorText = $errorText.'\nPlease try again.';
 
	// Display the form again as there was an error
	if ($errorMsg) {

		// showForm($errorMsg,$errorText);
		header("Location: newPassword.php");
	} 
    else {
		header("Location: newPassword.php");

    
			
	} //form was a success!
} //else check form

    echo MyUtils::html_footer();
?>
