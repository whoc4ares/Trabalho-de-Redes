<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: back_office/sistema_login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: back_office/sistema_login/login.php");
  }



?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>PetClinic a Medical Category Flat Bootstrap responsive Website Template | Contact :: w3layouts</title>
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
					<a href="index.php"></span><h1>Pet<span>Shop</span></h1></a>
				</div>
					<div class="navigation">
						<span class="menu"></span> 
							<ul class="navig cl-effect-16">
								<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
								
								
								<?php echo $_SESSION['username']; ?>

								<p> <a href="contact.php?logout='1'" style="color: red;">logout</a> </p>
							</ul>
					</div>
				</div>
				<div class="col-md-9 banner-right">
					<div class="contact">
						<div class="contact-top b-head">
							<h2>Compras</h2>
						</div>
						<div class="contact-bottom">

							<div class="cnt">
								<div class="col-md-8 contact-left">
									<form method="POST" action="inseredados.php">

											<div class="form-group">
												<label for="select" class=" form-control-label">Tipo de animal</label><br>
												<select name="tipo" id="subject" required>
												<option selected disabled  value="tipo" selected="selected">Selecione o tipo de animal</option>
												</select>
												<br><br>

												<label for="select" class=" form-control-label">Raça</label><br>
												<select name="raca" id="topic" required>
													<option selected disabled  value="raca" selected="selected">Selecione a raça</option>
												</select>
												<br><br>

												<label for="select" class=" form-control-label">Gênero</label><br>
												<select name="genero" id="chapter" required>
													<option selected disabled value="genero" selected="selected">Selecione o genero</option>
												</select>
											</div>						

										<textarea name="descricao" placeholder="Morada"  id="comment" placeholder="Message" required></textarea>

										<div class="submit-btn">
											<input type="submit" value="Finalizar compra" name="enviar">
										</div>

									</form>
								</div>

								<div class="clearfix"></div>
							</div>
						</div>
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
	<!--footer-starts-->

	<!--footer-end-->	
</body>
</html>
<script>
var subjectObject = {
  "cao": {
    "pastor alemão": ["macho", "femea"],
    "buldogue": ["macho", "femea"],
    "Dobermann": ["macho", "femea"]    
  },
  "gato": {
    "persa": ["macho", "femea"],
    "maine coon": ["macho", "femea"],
    "ragdoll": ["macho", "femea"]
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  var chapterSel = document.getElementById("chapter");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>