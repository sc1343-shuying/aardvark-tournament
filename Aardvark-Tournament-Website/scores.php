<?php
    spl_autoload_register (function($class) {
        require_once "./classes/$class.class.php";
    });
    echo MyUtils::html_header($title="Aardvark Games",$styles="assets/css/scores.css");
        
    echo MyUtils::navigation($navItem=array("Teams","Events","Scores", "About"));

    echo '
    <h2>Scores page</h2>';
    echo MyUtils::html_footer();
?>