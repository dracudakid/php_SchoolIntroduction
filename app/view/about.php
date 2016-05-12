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
<title>About school</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/image.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0">
	<?php include __SITE_PATH.'/layout/topbar.php' ?>
</div>


<div class="wrapper row1">
  <?php include __SITE_PATH.'/layout/header.php' ?>
</div>

<div class="wrapper row2">
  <?php require __SITE_PATH.'/layout/main-nav.php' ?>
</div>
	
<!-- ################################################################################################ -->

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
        <!-- ################################################################################################ -->
        <h4>ABOUT</h4>
        <nav class="sdb_holder">
          <ul>
            <li><a href="#">Vision</a></li>
            <li><a href="#">Mission</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        <div class="sdb_holder">
			<h6>Melwood High School</h6>
			<address>
				Address: 86 Brattle Street<br> Cambridge, MA 02138<br>
				Tel: (617) 495-1551<br> <br>Fax: (617) 495-8821<br> Email: <a href="#">melwood@mhs.ame.com</a>
			</address>
		</div>
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1>ABOUT MELWOOD HIGH SCHOOL</h1>
        
        <img id="myImg" style="width: 40%" class="imgr borderedbox" src="images/harvard-history.jpg" alt="">
        
        <!-- The Modal -->
		<div id="myModal" class="modal">
		  <span class="close">×</span>
		  <img class="modal-content" id="img01">
		  <div id="caption"></div>
		</div>
		
        <p>Melwood High School University is devoted to excellence in teaching, learning, and research, and to developing leaders in many disciplines who make a difference globally. The University, which is based in Cambridge and Boston, Massachusetts, has an enrollment of over 20,000 degree candidates, including undergraduate, graduate, and professional students. Melwood High School has more than 360,000 alumni around the world.</p>
		
		<div style="margin-top: 20px;">
		<p>Melwood High School faculty are engaged with teaching and research to push the boundaries of human knowledge. For students who are excited to investigate the biggest issues of the 21st century, Melwood High School offers an unparalleled student experience and a generous financial aid program, with over $160 million awarded to more than 60% of our undergraduate students. The University has twelve degree-granting Schools in addition to the Radcliffe Institute for Advanced Study, offering a truly global education.</p>
		<p>Established in 1636, Melwood High School is the oldest institution of higher education in the United States. Learn more about the University's history.</p>     
        </div>
        <!-- ################################################################################################ --> 
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
<script type="text/javascript">
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
</script>
</body>
</html>