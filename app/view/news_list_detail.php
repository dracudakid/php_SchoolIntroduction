<?php
include_once __SITE_PATH . '/model/news.php';
?>
<!DOCTYPE html>
<!--
Template Name: Academic Education V2
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>News</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/image.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" onload="load_recent()">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=1675074109399975";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

	<div class="wrapper row0">
  <?php include __SITE_PATH.'/layout/topbar.php'?>
</div>


	<div class="wrapper row1">
  <?php include __SITE_PATH.'/layout/header.php'?>
</div>

	<div class="wrapper row2">
  <?php require __SITE_PATH.'/layout/main-nav.php'?>
</div>

	<div class="wrapper row3">
		<div class="rounded">
			<main class="container clear"> <!-- main body --> <!-- ################################################################################################ -->
			<div class="group btmspace-30">

				<!-- Left Column -->
				<div class="one_quarter first">
					<!-- List recent -->
		        	<div id = "list_recent" >
										
					</div>	        
        		</div>
				<!-- / Left Column -->


				<!-- Middle Column -->
				<div class="one_half">
					<!-- ################################################################################################ -->

					<!-- if viewAllNews request check -->

					<h1>DETAIL</h1>
					<div id="comments">
						<p style="font-size: 22px;"><?php echo $news_detail->getTitle()?></p>
						<div class="one_third first">
							<p style="font-style: italic;">View quantity: <?php echo $news_detail->getView_quantity()?></p>
						</div>
						<div class="one_third first">
							<img alt="" id="myImg"
								src="<?php echo $news_detail->getImage()?>">
						</div>
						
						<!-- The Modal -->
						<div id="myModal" class="modal">
						  <span class="close">×</span>
						  <img class="modal-content" id="img01">
						  <div id="caption"></div>
						</div>
						
						<div class="block clear">
							<p><?php echo $news_detail->getContent()?></p>
						</div>
						<div class="fb-like" data-href="http://localhost:8888/workspacePHP/school_Introduction/app/index.php?page=news_detail&amp;idNews=<?php echo $news_detail->getId() ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
						<div class="fb-comments" 
							data-href="http://localhost:8888/workspacePHP/school_Introduction/app/index.php?page=news_detail&amp;idNews=<?php echo $news_detail->getId() ?>" data-numposts="5"></div>
					</div>

					<!-- ################################################################################################ -->
				</div>
				<!-- / Middle Column -->


				<!-- Right Column -->
				<div class="one_quarter sidebar">
					<!-- ################################################################################################ -->
					<div class="sdb_holder">
						<h4>Introduce school</h4>
						<div class="mediacontainer">
							<video width="100%" controls autoplay muted>
								<source src="images/demo/Harvard University.mp4"
									type="video/mp4">
								<source src="movie.ogg" type="video/ogg">
							</video>
						</div>
					</div>
					<div class="sdb_holder">
						<h4>Quick Information</h4>
						<ul class="nospace quickinfo">
           					 <?php foreach ($best_news as $a_news){?>
				              <li class="clear"><a
								href="index.php?page=news_detail&idNews=<?php echo $a_news->getId()?>">
									<img src="<?php echo $a_news->getImage()?>" alt=""><?php echo $a_news->getTitle()?>
				              		</a></li>
				              <?php }?>
            </ul>
					</div>
					<!-- ################################################################################################ -->
				</div>
				<!-- / Right Column -->
			</div>
			<!-- ################################################################################################ -->
			<!-- ################################################################################################ -->
			
			<!-- ################################################################################################ -->

			<!-- / main body -->
			<div class="clear"></div>
			</main>
		</div>
	</div>
	<!-- ################################################################################################ -->
	<!-- ################################################################################################ -->
	<!-- ################################################################################################ -->
	<div class="wrapper row4">
		<div class="rounded">
			<footer id="footer" class="clear">
				<!-- ################################################################################################ -->
				<div class="one_third first">
					<figure class="center">
						<img class="btmspace-15" src="images/demo/worldmap.png" alt="">
						<figcaption>
							<a href="#">Find Us With Google Maps &raquo;</a>
						</figcaption>
					</figure>
				</div>
				<div class="one_third">
					<address>
						Long Educational Facility Name<br> Address Line 2<br> Town/City<br>
						Postcode/Zip<br> <br> <i class="fa fa-phone pright-10"></i> xxxx
						xxxx xxxxxx<br> <i class="fa fa-envelope-o pright-10"></i> <a
							href="#">contact@domain.com</a>
					</address>
				</div>
				<div class="one_third">
					<p class="nospace btmspace-10">Stay Up to Date With What's
						Happening</p>
					<ul class="faico clear">
						<li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="faicon-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
						<li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
					</ul>
					<form class="clear" method="post" action="#">
						<fieldset>
							<legend>Subscribe To Our Newsletter:</legend>
							<input type="text" value=""
								placeholder="Enter Email Here&hellip;">
							<button class="fa fa-sign-in" type="submit" title="Sign Up">
								<em>Sign Up</em>
							</button>
						</fieldset>
					</form>
				</div>
				<!-- ################################################################################################ -->
			</footer>
		</div>
	</div>
	<!-- ################################################################################################ -->
	<!-- ################################################################################################ -->

	
<?php include 'layout/footer.php'?>
<!-- JAVASCRIPTS -->
	<script src="layout/scripts/jquery.min.js"></script>
	<script src="layout/scripts/jquery.fitvids.min.js"></script>
	<script src="layout/scripts/jquery.mobilemenu.js"></script>
	<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>

<script>
	// Get the modal
	var modal = document.getElementById('myModal');
	
	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById('myImg');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
	    modal.style.display = "block";
	    modalImg.src = this.src;
	    modalImg.alt = this.alt;
	    captionText.innerHTML = this.alt;
	}
	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	    modal.style.display = "none";
	}


	//get recentlist
	function load_recent(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		   if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		        document.getElementById("list_recent").innerHTML = xmlhttp.responseText;
		      }
		   }
		xmlhttp.open("GET", "index.php?page=news_list&recent=news_recently", true);
	    xmlhttp.send();
	}
</script>
</body>
</html>
