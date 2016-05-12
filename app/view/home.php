<?php 
include_once __SITE_PATH.'/model/news.php'; 
?>

<!DOCTYPE html>

<html>
<head>
<title>Melwood High School</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" onload="load_recent()">
<div class="wrapper row0">
  <?php include __SITE_PATH.'/layout/topbar.php' ?>
</div>


<div class="wrapper row1">
  <?php include __SITE_PATH.'/layout/header.php' ?>
</div>

<div class="wrapper row2" id="main-nav-wrapper">
  <?php require __SITE_PATH.'/layout/main-nav.php' ?>
</div>
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
      <figure id="slide-1"><a class="view" href="#"><img src="images/header/melwood.png" alt=""></a>
        <figcaption>
          <h2>Melwood High School</h2>
          <p>Welcome to the online information resource of Melwood High School's Commencement Office.</p>
          <p class="right"><a href="index.php?page=about">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-2"><a class="view" href="#"><img src="images/header/should_study.png" alt=""></a>
        <figcaption>
          <h2>Why You Should Study With Us</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-3"><a class="view" href="#"><img src="images/header/experence.png" alt=""></a>
        <figcaption>
          <h2>Academic Experience</h2>
          <p>With an enduring dedication to the pursuit of excellence, Melwood High School offers unparalleled student experiences across a broad spectrum of academic environments.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-4"><a class="view" href="#"><img src="images/header/volunteer.png" alt=""></a>
        <figcaption>
          <h2>Volunteer</h2>
          <p>Do you want to be more involved with public service organizations in and around New York City? The Melwood Club of New York Non-Profit Board Recruitment Fair, sponsored by the Center for Public Interest Careers (CPIC), </p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-5"><a class="view" href="#"><img src="images/header/event.png" alt=""></a>
        <figcaption>
          <h2>Latest School News &amp; Events</h2>
		  <p>John McDonnell (Deputy Principal at Melwood High School) has held nearly every role imaginable at Cycling New Zealand. A former councillor, board </p>
          <p class="right"><a href="index.php?page=news_list">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <!-- ################################################################################################ -->
      <ul id="slide-tabs">
        <li><a href="#slide-1">All About The School</a></li>
        <li><a href="#slide-2">Why You Should Study With Us</a></li>
        <li><a href="#slide-3">Academic Experience</a></li>
        <li><a href="#slide-4">Volunteer</a></li>
        <li><a href="#slide-5">Latest School News &amp; Events</a></li>
      </ul>
      <!-- ################################################################################################ --> 
    </div>
  </div>
</div>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
      
        <!-- Left Column -->
		<div class="one_quarter first">
		<div id = "list_recent" >
		</div>
		</div>
        <!-- / Left Column --> 
        
        <!-- Middle Column -->
        <div style="width: 72%;" class="one_half"> 
          <!-- ################################################################################################ -->
          <h2>WELCOME</h2>
          <p>Welcome to the online information resource of Melwood High School's Commencement Office. Here you will find a wealth of logistical information, helpful tips, and background material. Some of the most commonly sought after items include: specific information about Commencement activities, details about tickets, events schedule, maps and locations, news, resources for guests with disabilities, and links to Senior Week activities and the graduate and professional schools.</p>
          <img alt="" src="images/graduate.jpg">
          <p>In the event of extreme weather, ticketholders for Special Guest seating sections A2/SG, SG-1, and SG-2 ONLY, please proceed to Sanders Theatre in Memorial Hall to view the Morning Exercises.

All other ticketholders are requested to view the ceremony over Comcast Cable (Channel 283) available at most of the undergraduate Houses and at the Graduate and Professional Schools. Limited indoor seating with large-screen viewing will be available in the Science Center. The Morning Exercises can also be viewed via live web-cast on this site.</p>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Middle Column --> 
       
       
      </div>
      
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>


<?php include 'layout/footer.php' ?>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script type="text/javascript">
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

$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 110) {
      $('#main-nav-wrapper').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 111) {
      $('#main-nav-wrapper').removeClass('navbar-fixed');
    }
  });
});
</script>
</body>
</html>