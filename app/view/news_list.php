<?php 
include_once __SITE_PATH.'/model/news.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<title>News</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/image.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" onload="load_recent()">
<div class="wrapper row0">
  <?php include __SITE_PATH.'/layout/topbar.php' ?>
</div>


<div class="wrapper row1">
  <?php include __SITE_PATH.'/layout/header.php' ?>
</div>

<div class="wrapper row2">
  <?php require __SITE_PATH.'/layout/main-nav.php' ?>
</div>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
      
        <!-- Left Column -->
        
        <!-- seen recently -->
        <div class="one_quarter first">
        
        	<!-- Search -->
	        <h1>Search news</h1>
	        <div class="sdb_holder" style="margin-bottom: 20px;">  
	          <form class="search-form" method="post" action="#">
	            <fieldset>
	              <legend>Search:</legend>
	              <input id="txtSearch" type="text" value="" placeholder="Search Here" onkeyup="searchNews(this.value)">
	              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
	            </fieldset>
	          </form>
	        </div>
	        
	        <!-- List recent -->
        	<div id = "list_recent" >
								
			</div>
	       
        </div>
        <!-- / Left Column --> 
        
        <!-- Middle Column -->
        <div class="one_half"> 
          <!-- ################################################################################################ -->
          <h2>LATEST NEWS &amp; EVENTS</h2>
      	<div id="news">
          <ul id="news-list" class="nospace listing">
           <?php 
          		foreach ($all_news as $n){
          ?>
            <li class="clear">
              <div class="imgl borderedbox" style="width: 150px;">
                  <img src="<?php echo $n->getImage()?>" alt="">
              </div>
              <p class="nospace btmspace-15">
              	<a href="index.php?page=news_detail&idNews=<?php echo $n->getId()?>"><strong>
              	<?php 
              	if(strlen($n->getTitle())>30){
              		$title = substr($n->getTitle(), 0,30);
              		$n->setTitle($title."...");
              	}
              	echo $n->getTitle()?></strong></a>
              </p>
              <p style="font-size: 12px; font-style: italic;"><a href="#"><?php echo $n->getCreated()?></a></p>
              <p><?php if(strlen($n->getContent())>200){
							$content =substr($n->getContent(), 0,200);
							$n->setContent($content."...");
						}
						echo $n->getContent()?></p>
            </li>
          <?php }?>
          </ul>
        </div>
         <div class="right"></div>
        </div>
        <!-- / Middle Column --> 
        
        
        <!-- Right Column -->
        <div class="one_quarter sidebar"> 
          <!-- ################################################################################################ -->
          
          <div class="sdb_holder">
            <h4>Introduce school</h4>
            <div class="mediacontainer">
				<video width="100%" controls autoplay muted>
					<source src="images/demo/Harvard University.mp4" type="video/mp4">
  					<source src="movie.ogg" type="video/ogg">
				</video>
            </div>
          </div>
          <div class="sdb_holder">
            <h4>Quick Information</h4>
            <ul class="nospace quickinfo">
            <?php foreach ($best_news as $a_news){?>
              <li class="clear">
              	<a href="index.php?page=news_detail&idNews=<?php echo $a_news->getId()?>">
              		<img src="<?php echo $a_news->getImage()?>" alt=""><?php echo $a_news->getTitle()?>
              	</a>
              </li>
              <?php }?>
            </ul>
          <!-- ################################################################################################ --> 
        	</div>
        </div>
        <!-- / Right Column --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="twitter" class="group btmspace-30">
        <div class="one_quarter first center"><a href="#"><i class="fa fa-twitter fa-3x"></i><br>
          Follow Us On Twitter</a></div>
        <div class="three_quarter bold">
          <p>Inteligula congue id elis donec sce sagittis intes id laoreet aenean. Massawisi condisse leo sem ac tincidunt nibh quis dui fauctor et donecnibh elis velit <a href="#">@name</a> - 10:15 AM yesterday</p>
        </div>
      </div>
    
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>

<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center"><img class="btmspace-15" src="images/demo/worldmap.png" alt="">
          <figcaption><a href="#">Find Us With Google Maps &raquo;</a></figcaption>
        </figure>
      </div>
      <div class="one_third">
        <address>
        Long Educational Facility Name<br>
        Address Line 2<br>
        Town/City<br>
        Postcode/Zip<br>
        <br>
        <i class="fa fa-phone pright-10"></i> xxxx xxxx xxxxxx<br>
        <i class="fa fa-envelope-o pright-10"></i> <a href="#">contact@domain.com</a>
        </address>
      </div>
      <div class="one_third">
        <p class="nospace btmspace-10">Stay Up to Date With What's Happening</p>
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
            <input type="text" value="" placeholder="Enter Email Here&hellip;">
            <button class="fa fa-sign-in" type="submit" title="Sign Up"><em>Sign Up</em></button>
          </fieldset>
        </form>
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script src="layout/scripts/jPaginate.js"></script>
<script type="text/javascript">

	//search
	function searchNews(searchValue) {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	        document.getElementById("news").innerHTML = xmlhttp.responseText;
	      }
	    }
	    xmlhttp.open("GET", "index.php?page=news_list&search=" + searchValue, true);
	    xmlhttp.send();
	}

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
	
  $("#news-list").jPaginate({items: 3});
	
</script>
</body>
</html>