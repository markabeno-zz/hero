<?php session_start();
	error_reporting(E_ALL ^ E_NOTICE);

	if(empty($_SESSION['title'])){
		$_SESSION['title'] = 'our expertise /';
	}

	if(empty($_SESSION['text'])){
		$_SESSION['text'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc malesuada turpis nec sem fringilla ut iaculis sapien accumsan. Phasellus accumsan auctor varius. Morbi justo dui, posuere a venenatis sit amet, sollicitudin in arcu. Aenean eleifend pretium urna, ac posuere nisl varius ac. Mauris tempor nunc ut lorem interdum dictum. In et adipi. Mauris tempor nunc ut lorem interdum dictum. In et adipi. Mauris tempor nunc ut lorem interdum dictum. In et adipi.';
	}	
	
	

	function truncate($string, $limit = 260, $break=".", $pad="...") {	
		if(strlen($string) <= $limit) return $string; 
		
		if(false !== ($breakpoint = strpos($string, $break, $limit))) {
			if($breakpoint < strlen($string) - 1) {
				$string = substr($string, 0, $breakpoint) . $pad; 
			} 
		} 
		return $string; 
	}	
?>