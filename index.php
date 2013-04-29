<?php include('init.inc')?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Hero Testing</title>			
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>		
		<script src="js/jquery.js"></script>
		<script src="js/slider.js"></script>
		<script src="js/slides.min.jquery.js"></script>
		<script type="text/javascript">
		
			$(function(){
				$('#slides').slides({					
					preload: true,						
					play: 5000,
					pause: 2500,
					hoverPause: true
				});
			});
			
			function validate() {				
				var fname = $('#fname').val();
				var cname = $('#cname').val();
				var cnumber = $('#cnumber').val();
				var email = $('#email').val();
				var pname = $('#pname').val();
				var comments = $('#comments').val();
				
				$.post("includes/validate.php", { "fname" : fname,"cname" : cname,"cnumber" : cnumber,"email" : email,"pname" : pname,"comments" : comments},
				function (data){	
						for(var i in data)
						{						
							if(isNaN(data[i])){
								$('#'+i).css({color: 'red', border: '1px solid red',padding:'3px 3px 4px'}).val(data[i]);
								$('#'+i).focus();
							}
							else{								
								$('#'+i).css({color: '#999', border: '0',padding:'4px 3px 5px'});								
							}														
						}						
				}, "json");			
			}				
		</script>	
	</head>

	<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo">
				<h1>HERO</h1>
				<span>TESTING</span>
			</div>
			<div class="info"><div class="cs">customer support</div><div class="cs_sub">1-800-XXX XXXXX <br/> support@heroprinting.com</div></div>	
			<div class="clear"></div>		
			<div class="navigation">
				<ul>
					<li><a href="#" class="active">home</a></li>
					<li>/</li>
					<li><a href="#">about us</a></li>
					<li>/</li>
					<li><a href="#">printing services</a></li>
					<li>/</li>
					<li><a href="#">the hero formula</a></li>
					<li>/</li>
					<li><a href="#">quick quote</a></li>
					<li>/</li>
					<li><a href="#">samples</a></li>
					<li>/</li>
					<li><a href="#">contact us</a></li>				
				</ul>
			</div>
			<form action="result.php" method="post">
			<input type="submit" id="search-btn" value=""/>
			<div class="search"><input type="text" name="search" class="search_box" value="search_" onblur="if (this.value == '') { this.value = 'search_'; }" onfocus="if (this.value == 'search_') { this.value = ''; }"/></div>			
			</form>
		</div>
		
		<div class="clear"></div>

		<div id="content">
			<div class="left-col">		
				<div class="slider">
						<div id="slides">
						<div class="slides_container">
							<a href="#" title="" target="_blank"><img src="images/banner/banner1.png" width="602" height="401" alt="Slide 0"></a>
							<a href="#" title="" target="_blank"><img src="images/banner/banner2.png" width="602" height="401" alt="Slide 0"></a>
							<a href="#" title="" target="_blank"><img src="images/banner/banner3.png" width="602" height="401" alt="Slide 0"></a>
							<a href="#" title="" target="_blank"><img src="images/banner/banner4.png" width="602" height="401" alt="Slide 0"></a>
							<a href="#" title="" target="_blank"><img src="images/banner/banner5.png" width="602" height="401" alt="Slide 0"></a>
							<a href="#" title="" target="_blank"><img src="images/banner/banner6.png" width="602" height="401" alt="Slide 0"></a>
						</div>
						</div>						
				</div>
			</div>
			
			<div class="right-col">				
				<h1>quick quote /</h1>
				<label for="fname">
					Full name</label>
				<input name="fname" id="fname" type="text" />

				<label for="cname">
					Company Name</label>
				<input  name="cname" id="cname" type="text" />
				<label for="cnumber">
					Contact Number</label>
				<input name="cnumber" id="cnumber" type="text" />
				<label for="email">
					Email</label>
				<input name="email" id="email" type="text" />
				<label for="pname">
					Project Name</label>
				<input name="pname" id="pname" type="text" />					
				<label for="comments">
					Please Provide Quantiyy Ink Color,  Paper Specifics,
					Finished Size, Folding or Finishing, Number or Originals</label>
				<textarea  rows="2" id="comments" name="comments" cols="30"></textarea>					
				<center><input type="button" onclick="validate()" class="submit" value="submit"/></center>
				
			</div>
			<div class="clear"></div>
			
			<div class="featured-box">
				<div class="box1">
					<div class="title">products categories /</div>
					<ul class="u1">
						<li><a href="#">Booklets</a></li>
						<li><a href="#">Brochures</a></li>
						<li><a href="#">Business cards</a></li>
						<li><a href="#">Custom Order</a></li>
						<li><a href="#">Envelope</a></li>
						<li><a href="#">Flyers</a></li>
						<li><a href="#">Greeting Cards</a></li>
					</ul>					
					<ul class="u2">
						<li><a href="#">Letterhead</a></li>
						<li><a href="#">Postcards</a></li>
						<li><a href="#">Posters</a></li>
						<li><a href="#">Sell Sheets</a></li>
						<li><a href="#">Stickers</a></li>
						<li><a href="#">Tent Cards</a></li>
						<li><a href="#">Trading Cards</a></li>
					</ul>					
				</div>
				<div class="box2">
					<div class="title">graphic design /</div>
				</div>
				<div class="box3">
					<div class="title">custom websites /</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="expertise">
				<div class="left">
					<h1><?php echo @$_SESSION['title'];?></h1>
					<div class="einfo">
					<?php echo truncate(@$_SESSION['text']);?>
					<a href="#">LEARN MORE</a> <img src="images/arrow.png"/>
					</div>
				</div>
				<div class="right">
					<span class="dp">Digital Printing</span><br/>
					<span class="op">Offset Printing</span><br/>
					<span class="is">Indoor Signage</span><br/>
					<span class="lf">Large Format</span>
				</div>
			</div>
			<div class="connect">
				<div class="title">connect /</div>
				<div class="social">
					<div>Lorem ipsum dolor sit amet, consectetur bortis.</div>
					<br/>
					<a href="#"><img src="images/social-fb.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-twitter.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-1.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-3.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-linkin.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-2.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-blogr.png" border="0"/></a>&nbsp;&nbsp;
					<a href="#"><img src="images/social-rss.png" border="0"/></a>&nbsp;&nbsp;
				</div>
			</div>			
		</div>		
	
		<div id="footer">
			<div class="box1">
				<div class="bottom-links">Home | About Us  |  Printing Services | The Hero Formula  |  Quick Quote Samples  |  Contact Us</div><br/>
				123 St. Hooray City, Lorem Ipsum, 54321 1-800-xxx-xxxx  | support@heroprinting.com
			</div>
			<div class="box2">
				<div class="title">products categories /</div>
					<ul class="u1">
						<li><a href="#">Booklets</a></li>
						<li><a href="#">Brochures</a></li>
						<li><a href="#">Business cards</a></li>
						<li><a href="#">Custom Order</a></li>
						<li><a href="#">Envelope</a></li>
					</ul>					
					<ul class="u2">
						<li><a href="#">Flyers</a></li>
						<li><a href="#">Greeting Cards</a></li>					
						<li><a href="#">Letterhead</a></li>
						<li><a href="#">Postcards</a></li>
					</ul>
					<ul class="u3">
						<li><a href="#">Posters</a></li>
						<li><a href="#">Sell Sheets</a></li>
						<li><a href="#">Stickers</a></li>
						<li><a href="#">Tent Cards</a></li>
						<li><a href="#">Trading Cards</a></li>
					</ul>					
				
			</div>
			<div class="box3">
				<div class="title">services /</div>
					<ul class="u1">
						<li><a href="#">Digital Printing</a></li>
						<li><a href="#">Offset Printing</a></li>
						<li><a href="#">Indoor Signage</a></li>
						<li><a href="#">Large Format</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
					</ul>					
					<ul class="u2">
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Custom Websites</a></li>					
						<li><a href="#">Cras et ante urna</a></li>
						<li><a href="#">Nullam porttitor</a></li>
						<li><a href="#">Cum sociis</a></li>
					</ul>		
			</div>
		</div>
	</div>
	</body>
	</html>