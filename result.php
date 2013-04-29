	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Hero Testing</title>					
		<link rel="stylesheet" type="text/css" href="css/style.css"/>	
		<script src="js/jquery.js"></script>
	</head>
	<body>
		<div id="result_wrapper">				
			<ul class="navigation black"> 
				<li><a href="#">Services</a></li>  
				<li><a href="#">About Us</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">Case Studies</a></li>
				<li><a href="#">Resources</a></li>
				<li><a href="#">Contact</a></li>			   
				<div class="block-search">
					<div>
					<div class="container-inline">
						<div class="form-item edit-search-wrapper">
							<input type="text" class="form-text edit-search" title="Enter the terms you wish to search for." value="" size="15" name="search" id="search" maxlength="128">
						</div>
						<input type="submit" class="form-submit" value="Search" name="go">
					</div>
					</div>		
				</div>			
			</ul>	

			<div class="logo">
				<h1>HERO</h1>
				<span>TESTING</span>
			</div>
			<div class="clear"></div>
			<div class="result_counter" id="result_counter"></div>
		
			<script>
				<?php if($_POST) : ?>
					$(document).ready(function(){
					var search_str = '<?php echo $_POST['search'];?>';
						$.post("includes/search.php", { "search_str" : search_str},
						function (data){
								
								var str = '';
								for(var i in data.results)
								{
									var title = data.results[i].title;									
									var desc = data.results[i].desc;									
									var link = data.results[i].link;															
									str += '<div class="search_item">';
									str += '<h3><a href="#">'+title+'</a></h3>';
									str += '<p>'+desc+'</p>';
									str += '<br/>';
									str += '<div class="phpsearch_link"><a href="#">'+link+'</a></div>';
									str += '<br/>';
									str += '</div>';																																					  
								}	
								if(data.results == ''){
									str += '<div class="search_item">';
									str += '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>No result found for <b>'+search_str+'</b></i></div>';
									str += '</div>';								
									var rstr = 'Results <b>0</b> to <b>'+data.rcount+'</b> for search '+search_str+'. (<b>'+data.te+'</b> seconds)';								
								}
								else{								
									var rstr = 'Results <b>1</b> to <b>'+data.rcount+'</b> for search '+search_str+'. (<b>'+data.te+'</b> seconds)';
								}
								document.getElementById('results').innerHTML = str;
								document.getElementById('result_counter').innerHTML = rstr;							
						}, "json");							
					});
				<?php endif;?>
				$('.form-submit').click(function(){		
					$('#loading').show();
					var search_str = $('#search').val();
					$.post("includes/search.php", { "search_str" : search_str},
					function (data){
							$('#loading').hide();
							var str = '';
							for(var i in data.results)
							{								
								var title = data.results[i].title;									
								var desc = data.results[i].desc;									
								var link = data.results[i].link;															
								str += '<div class="search_item">';
								str += '<h3><a href="#">'+title+'</a></h3>';
								str += '<p>'+desc+'</p>';
								str += '<br/>';
								str += '<div class="phpsearch_link"><a href="#">'+link+'</a></div>';
								str += '<br/>';
								str += '</div>';																																					  
							}	
							if(data.results == ''){								
								str += '<div class="search_item">';
								str += '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>No result found for <b>'+search_str+'</b></i></div>';
								str += '</div>';
								var rstr = 'Results <b>0</b> to <b>'+data.rcount+'</b> for search '+search_str+'. (<b>'+data.te+'</b> seconds)';								
							}
							else{								
								var rstr = 'Results <b>1</b> to <b>'+data.rcount+'</b> for search '+search_str+'. (<b>'+data.te+'</b> seconds)';
							}
							document.getElementById('results').innerHTML = str;
							document.getElementById('result_counter').innerHTML = rstr;							
					}, "json");					
				});
			</script>
			<div id="loading" style="display:none;"></div>			
			<div id="results"></div>						
		</div>	
	</body>
	</html>		