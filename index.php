<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>PetClinic a Medical Category Flat Bootstrap responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="PetClinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!--start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
<!--requried-jsfiles-for-owl-->
		<link href="css/owl.carousel.css" rel="stylesheet">
			<script>
				$(document).ready(function() {
					$("#owl-demo").owlCarousel({
						items : 5,
						lazyLoad : true,
						autoPlay : true,
						pagination : false,
					});
				});
			</script>
			<script src="js/owl.carousel.js"></script>
		<!---//requried-jsfiles-for-owl-->
		<!--script-->
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
		<!--light-box-files-->
		<script type="text/javascript">
		$(function() {
			$('.g1 a').Chocolat();
		});
		</script>
</head>
<body>	

	<!--banner-starts-->
	<div class="banner">
		<div class="container">
			<div class="banner-top">
				<div class="col-md-3 banner-left">
				<div class="logo">
					<a href="index.php"><h1>Pet<span>Shop</span></h1></a>
				</div>
					<div class="navigation">
						<span class="menu"></span> 
							<ul class="navig cl-effect-16">

								<li><a href="index.php"  class="active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
								<li><a href="contact.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Login/Register</a></li>
							</ul>
					</div>
				</div>
				<div class="col-md-9 banner-right">
					<div class="b-one">
						<div class="col-md-8 b-left">
							<img src="images/cao.jpg" alt="" />
						</div>
						<div class="col-md-4 b-right">
							<img src="images/pussy.jpg" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="b-one b-two">
						<div class="col-md-4 bt-left">
	
								<img class="img-responsive" src="images/gato.png" alt=""/>
	
							
						</div>
						<div class="col-md-4 bt-left">
							
								<img class="img-responsive" src="images/doge.png" alt=""/>
		
							
						</div>
						<div class="col-md-4 bt-left">
							
								<img class="img-responsive" src="images/cat-vibing-vibing-cat.gif" alt=""/>
		
			
						</div>
						<div class="clearfix"></div>
					</div>	


					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--banner-starts-->
	<!--script-for-menu-->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!--script-for-menu-->
	<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</body>
</html>