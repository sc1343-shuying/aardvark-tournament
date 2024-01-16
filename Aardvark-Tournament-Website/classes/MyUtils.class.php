<?php

class MyUtils{

	static function html_header($title="Untitled",$styles=""){
		$string = <<<END
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="utf-8"/>
			<title>$title</title>
			<link rel="stylesheet" type="text/css" href="$styles"/>
		</head>

		<body>\n

		END;
		return $string;
	}
	static function navigation($navItem=array()){
		$string = '
		<header>
           <figure><a href="home.php"><img id="nav_logo" src = "assets/images/A New World title text clear background.png" alt="logo" title="logo"></a></figure>
            <nav>
                <ul>';
		foreach ($navItem as $item){
			if ($item == ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME))){
				$string .= '<li><a class="active" href="'.strtolower($item).'.php">'.$item.'</a></li>';
			}else{	
				$string .= '<li><a href="'.strtolower($item).'.php">'.$item.'</a></li>';
			}
		}

		$string .= '</ul>

		<a href="login.php"><button>REGISTER/LOG IN</button></a>
		</nav>
		</header>';
		return $string;
		
	}

	static function html_footer($text=""){
		$string ="<footer>
		<div class='footerLogo'>
			<h1>AARDVARK GAMES</h1>
		</div>

		<div class='copyright-text'>
			<p> &copy; 2023 Team Boston</p>
			<br>
			<p> Support: teamboston@gmail.com </p>

		</div>

		</footer>\n</body>\n</html>";
		return $string;
	}


} // end class


?>