<?php
	//Validation.php
	
	$fields = array();
	foreach($_POST as $fieldname => $val){	
		if($fieldname == 'cnumber'){
			if(is_numeric($val)){
				$fields[$fieldname] = 1;
			}else{
				$fields[$fieldname] = check_fields($fieldname);
			}
		}
		if($fieldname == 'email'){
			if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
				$fields[$fieldname] = check_fields($fieldname);
			}else{
				$fields[$fieldname] = 1;
			}
		}		
		else if(!$val || $val == check_fields($fieldname)){
			$fields[$fieldname] = check_fields($fieldname);
		}		
		else{
			$fields[$fieldname] = 1;
		}
	}		
	
	$data = array();	
	foreach($fields as $fieldname => $value){	
		$data[$fieldname] = $value;		
	}
		
	echo json_encode($data);
	
	function check_fields($fieldname){
		switch($fieldname){
			case 'fname' 	: return 'Full name is required'; break;
			case 'cname' 	: return 'Company name is required';break;
			case 'cnumber'	: return 'Contact number is required or invalid';break;
			case 'email'	: return 'Email is invalid';break;
			case 'pname'	: return 'Project name is required';break;
			case 'comments'	: return 'Comment field is required';break;
		}
	}	
?>