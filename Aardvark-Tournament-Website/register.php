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
			<form method="POST">
				<div class="loginContainer">
					<div id = "loginForm">


						<img class="logo" src="assets/images/Aardvark logo clear horizontal.png">
						<input class="input" type="text" name="email" placeholder="Email" id="email" required />
						<br> 
						<input class="input" type="text" name="username" placeholder="Username" id="username" required />
						<br>
						<input class="input" type="password" name="password" placeholder="Password" id="pass" required />
						<br>
						<div class="link">
						<a href="restPassword.php">ForgetPassword</a>
						</div>
						<br>
						<input type="submit" name="submit" class="loginButton" value="SIGN UP" />
							
						
					
					</div>

					<div class="registerSelect">
						<label>Select Type of Account</label>
						<div class="radio">
							<input type="radio" name="Role" value="1" checked />Member of Existing Team<br />
							<input type="radio" name="Role" value="2" />Team Captain<br />
							<input type="radio" name="Role" value="3" />College Administrator<br />
							<input type="radio" name="Role" value="3" />Tournament Administrator<br />
							<input type="radio" name="Role" value="3" />Administrator<br />
						</div>
						<div>
						<label>Enter Code:</label>
						<input class="input" type="text" name="code" id="code" required />
						</div>
					</div>

			
				</div>
			</form>';
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

		showForm($errorMsg,$errorText);
	} 
    else {
        require_once "DB.class.php";
		$db = new DB();

		session_start();
		$message = null;
		

		if ( isset($_GET['success']) && $_GET['success'] == 1 )
		{
			//back to login page 
			echo "<script>if(confirm('You need to login!')){document.location.href='login.php'};</script>";
		}

		if (isset($_POST['username']) && isset($_POST['password'])) {
			if($_POST['username']!='' && $_POST['password']!='' ){
				$username = ($_POST['username']);
				$password = ($_POST['password']);
				$db->login($username, $password);

		}
	}


    
			
	} //form was a success!
} //else check form

    echo MyUtils::html_footer();
?>
