<?php
	include('data.php');	
	$keyword = $_POST['search_str'];
	$data = array($data1,$data2,$data3,$data4,$data5);
	
	/*
	* @function :: hightlight
	* Apply Styling to keywork if there is match is search.
	*/
	function hightlight($str, $keywords = '') {
	
		$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

		$style = 'highlight';
		$style_i = 'highlight_important';

		/* Apply Style */
		$var = '';

		foreach(explode(' ', $keywords) as $keyword){
			$replacement = "<span class='".$style."'>".$keyword."</span>";
			$var .= $replacement." ";
			$str = str_ireplace($keyword, $replacement, $str);
		}

		/* Apply Important Style */
		$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
		return $str;
	}
	
	/* Execute Search */
	$result = array();	
	foreach($data as $k => $value){		
		if(preg_match_all("/{$keyword}/i",$value['title'],$matches)){			
			$result[]= array('title' => hightlight($value['title'], $keyword),'desc' => hightlight($value['desc'], $keyword),'link' => hightlight($value['link'], $keyword));
		}
	}
	
	/* Get page execution time */
    list($u, $s) = explode(' ',microtime());
    $parseTime = bcadd($u, 0, 2);
	
	//Display results
	$return = array('results' => $result,'te' => $parseTime,'total' => count($data),'rcount' => count($result));
	echo json_encode($return);
?>