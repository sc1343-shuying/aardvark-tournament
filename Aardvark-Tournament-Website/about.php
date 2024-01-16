<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/about.css");
        
    echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));

    echo '
        <div class="firstSection"> 
            <h1>About</h1>
            <h2>Aardvark Games announces our newest board game adventure, A New World. </h2>

            <div class="countdownContainer">
                <p style="text-decoration: line-through;" class="countDown">00</p>
                <p class="countDown">:</p>
                <p style="text-decoration: line-through;" class="countDown">00</p>
                <p class="countDown">:</p>
                <p style="text-decoration: line-through;" class="countDown">00</p>
                <p class="countDownText">Until Deadline: May 1st</p>
            </div>
        </div>

        <div class="secondSection"> 
            <div class="secondSectionTtile">
                <img src = "assets/images/aboutTitle.png">
            </div>

            <div class="secondSectionCotainer">
                <p class="leftText">
                A New World requires a team of 2-5 players who will work together to score as many points as possible after being dropped into a new, unpopulated world. 
                The habitats will vary and the team will not know in advance where they will land. 
                </p>

                <p class="rightText">
                The game is best played in a head-to-head competition with a second team seeking to survive in its own New World, but competing for the same resources. 
                <br>However, with the modifications described for solo team play, it is possible to enjoy striving to beat your own prior scores.
                </p>
            </div>
            <img class="bar" src = "assets/images/aboutImage.png">

            <p class="centerText">Environments could be a desert planet, an underwater location, a water world with scattered islands, an ice covered mountain range, or a jungle full of predatory animals and dangerous plant life. 
            <br>
            (Advance News! Expansion Pack 1 is in the design phase with additional worlds and resources!) </p>
        </div>

        <div class="thirdSection">
            <div class="thirdSectionTitle">
            <h1>Roles</h1>

            <p>Every team must designate the roles for each player prior to beginning play. If a team has fewer than five players, team members may assume more than one role</p>
            </div>

            <div class="roleContainer">
                <div class="eachRole">
                    <h2>Expedition Leader</h2>
                    <ul>
                    <li>Make decisions on when and how action cards are played</li>
                    <li>Facilitate the team’s joint strategic planning</li>
                    <li>Manage the expedition budget</li>
                    </ul>

                </div>

                <div class="eachRole">
                    <h2>Resource Specialist</h2>
                    <ul>
                    <li>Responsible for obtaining the resources required for survival on arrival </li>
                    <li>Responsible for the establishment of a base on the new world</li>
                    </ul>
                </div>

                <div class="eachRole">
                    <h2>Scientist</h2>
                    <ul>
                    <li>Collects knowledge cards that allow the team an advantage in knowing how to overcome obstacles and which actions are most likely to succeed </li>
                    </ul>
                </div>

                <div class="eachRole">
                    <h2>Technician</h2>
                    <ul>
                    <li>Uses tool and technology cards to create the team </li>
                    <li>Repair machines and weapons as needed</li>
                    </ul>
                </div>

                <div class="eachRole">
                    <h2>Weapons Specialist</h2>
                    <ul>
                    <li>Leads the team defense strategies and works to gain points to raise each team member’s skill level on the weapon classes best suited to the current habitat</li>
                    </ul>
                </div>

            </div>

        </div>
            
        
        
    ';

    function showForm($errorMsg=false, $errorTxt="") {
		if ($errorMsg) {
			echo '
                <div class="lastSection">
                <form  id="form"  method="POST">


                <h2>Got Questions?</h2>
                <div class="formSection">
                    <div class="formEachSection">
                        <input type="text" placeholder="First Name" class="input" name="firstName" id="firstName" size="30" />
                    
                        <input type="text" placeholder="Email" class="input" name="email" id="email" size="30" />
                
                        <select id="interest" name="interest">
                        <option value="" disabled selected>Area of Interest</option>
                        <option value="event">Event</option>
                        <option value="college">College</option>
                        <option value="team">Teams</option>
                        </select>
                    </div>

                    <div class="formEachSection">
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </div>

                </div>

                <div id="error">'.$errorTxt.'</div>'.'
                <div class="submit">
                    <input type="submit" class="btn" name="submit" value="Submit" />
                </div>	
        
                </form>
                </div>';
	
		}
		else{
			echo '
            <div class="lastSection">
                <form  id="form"  method="POST">

                <h2>Got Questions?</h2>
                <div class="formSection">
                    <div class="formEachSection">
                        <input type="text" placeholder="First Name" class="input" name="firstName" id="firstName" size="30" />
                    
                        <input type="text" placeholder="Email" class="input" name="email" id="email" size="30" />
                
                        <select id="interest" name="interest">
                        <option value="" disabled selected>Area of Interest</option>
                        <option value="event">Event</option>
                        <option value="college">College</option>
                        <option value="team">Teams</option>
                        </select>
                    </div>

                    <div class="formEachSection">
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </div>

                </div>

                            
                <div class="submit">
                    <input type="submit" class="btn" name="submit" value="Send Message" />
                </div>	
        
                </form>
            </div>';
		}
		
	
		
		
	} //showForm


    if (!isset($_POST['submit'])) {
		showForm();
	}else {
		//sanitize input
		function sanitize($input){
			$string = trim($input);
			$string = stripslashes($input);
			$string = htmlentities($input);
			$string = strip_tags($input);
			return $string;
		}
	
		//Init error variables
		$errorMsg = false;
		$errorText = "";
	 
		$username = isset($_POST['username']) ? sanitize($_POST['username']) : "";
		$password = isset($_POST['password']) ? sanitize($_POST['password']) : "";
		
		if($username== "") {
			
			$errorText = $errorText."<p>Userename can't be empty</p>";
			$errorMsg = true;
		  }else if (strlen($username) > 30 || strlen($username) < 3){
			$errorText = $errorText."<p>The length of userename should between 3 and 30</p>";
			$errorMsg = true;
		}
	
		if($password== "") {
			$errorText = $errorText."<p>Password can't be empty</p>";
			$errorMsg = true;
		  }else if (strlen($password) > 30 || strlen($password) < 3){
			$errorText = $errorText."<p>The length of password should between 3 and 30</p>";
			$errorMsg = true;
		}
	
		// Display the form again as there was an error
		if ($errorMsg) {
			showForm($errorMsg,$errorText);
		} else {
			showForm();
		} //form was a success!
	} //else check form

    echo MyUtils::html_footer();
?>