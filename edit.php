<?php include('init.inc'); ?>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>	
		<script src="js/jquery.js"></script>	
		<script>
			function validate() {				
				var title = $('#title').val();
				var text = $('#text').val();			
				$.post("includes/edit_action.php", { "title" : title,"text" : text},
				function (data){					
					if(data.val == 1){
						$('.error').fadeIn();
						$('#'+i).css({color: 'red', border: '1px solid red',padding:'3px 3px 4px'});
						$('#'+i).focus();	
					}	
					else{
						$('.error').fadeOut();	
						$('.notice').fadeIn();
						setTimeout("$('.notice').fadeOut()",2000);
						$('#title').val(val.title);
						$('#title').val(val.text);										
						$('#'+i).css({color: '#999', border: '1px solid #000',padding:'4px 3px 5px'});	
					}
				
				}, "json");		
			}
		</script>
	</head>
	<body>
		<div id="edit_wrapper">
			<div class="error" style="display:none;">Please make sure to fill up all the fields.</div>
			<div class="notice" style="display:none;">Saved..</div>
			<label for="title">HEADING</label>
			<input type="text" id="title" value="<?php echo @$_SESSION['title'];?>" name="title"/>
			<div class="clear"></div>
			<label for="text">TEXT</label>
			<textarea name="text" id="text" rows="10"><?php echo @$_SESSION['text'];?></textarea>
			<input type="button" onclick="validate();" class="edit_save" value="save"/>
		</div>
	</body>
	</html>
