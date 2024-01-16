<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/teams.css");
        
    echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));

    echo '
    <h2>Teams page</h2>';

    echo MyUtils::html_footer();
?>