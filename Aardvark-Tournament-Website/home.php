<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/home.css");
        
    echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));

    echo '

        <div class="topSection">

            <div class="topEachSection">
                <h1> Can Your University’s Team Bring Home the Prize?</h1>

                <p>Gather a team and sign up to play, first for the honor of being your University’s championship team and then for the chance to represent your school in continued rounds of global competition.</p>
                

                <a href="register.php"><button>SIGN UP</button></a>

            </div>

            <div class="topEachSection">
                <img src = "assets/images/homeGroupImage.png" alt="group image" title="group image">
            </div>

        </div>


        <div class="middleSection">

            <a href="teams.php">
            <div class="midEachSection">
                <img src="assets/images/game pieces on desert board.jpg" alt="Cinque Terre" width="1000" height="300">
                <p>Who’s Playings?</p>
            </div>
            </a>

            <a href="evnets.php">
            <div class="midEachSection">
                <img src="assets/images/game board - undersea.jpg" alt="Cinque Terre" width="1000" height="300">
                <p>Events</p>
            </div>
            </a>
            
            <a href="scores.php">
            <div class="midEachSection">
                <img src="assets/images/game pieces on jungle board.jpg" alt="Cinque Terre" width="1000" height="300">
                <p>Scores</p>
            </div>
            </a>
            
            <a href="about.php">
            <div class="midEachSection">
                <img src="assets/images/game pieces on islands board.jpg" alt="Cinque Terre" width="1000" height="300">
                <p>About</p>
            </div>
            </a>

        </div>


        <div class="bottonSection">

            <div class="bottonEachSection">
            <img src = "assets/images/loginBackground.png" alt="group image" title="group image">
            </div>
            
            <div class="bottonEachSection">
            <h1> Tournament’s Prize</h1>

            <p>All players who complete at least one round of tournament play will receive a complimentary copy of A New World. Each university’s final round teams will go home with some awesome Aardvark Games swag. The First Place team for each university will receive a cash prize of $1,000 and each individual team member will get a $100 gift certificate for the Aardvark Games online store.</p>

            </div>

            

        </div>';

    echo MyUtils::html_footer();
?>
