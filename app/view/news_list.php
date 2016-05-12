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
      <div class="clear"></div>
    </main>
  </div>
</div>


<?php include 'layout/footer.php' ?>

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