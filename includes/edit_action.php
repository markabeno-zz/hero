<?php
	session_start();
	$field = array();
	
	/* Check fields */
	foreach($_POST as $fieldname => $value){

		if(!$value || $value == check_fields($fieldname)){
			$field[$fieldname] = check_fields($fieldname);
		}
		else{
			$_SESSION[$fieldname] = $value;	
			$field[$fieldname] = 1;					
		}
	}
	/* Check error fields */
	function check_fields($fieldname){
		switch($fieldname){
			case 'title' 	: return 'Title field is required'; break;
			case 'text' 	: return 'Text field is required';break;
		}
	}
	
	/* Return Data */
	if(in_array(0,$field)){
		echo json_encode(array('val' => 1));
	}
	else{
		echo json_encode(array('val' => 0,'title' => $_SESSION['title'],'text' => $_SESSION['text']));
	}	
?>