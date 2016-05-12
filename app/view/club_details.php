<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/CongNgheWeb/app/model/department.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Melwood High School</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
       <h4>Search for club</h4>
        <div class="sdb_holder">  
          <form class="search-form" method="post" action="#">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <h4>CLUBS</h4>
        <nav class="sdb_holder">
          <?php 
            foreach ($club_list as $c) { ?>
              <ul>
                <li><a href="index.php?page=club_list&&club=<?php echo $c->getId() ?>"><?php echo $c->getName() ?></a></li>
              </ul>
          <?php
            }
           ?>
        </nav>
      </div>

      <div id="content" class="three_quarter"> 
        <div class="one_quarter first">
          <img src="<?php echo $club->getImage(); ?>" alt="">
        </div>
        <div class="three_quarter">
          <h1><?php echo $club->getName(); ?></h1>
          <p><?php echo $club->getDescription(); ?></p>
          <ul>
            <li><strong>Meeting days/times:</strong><?php echo $club->getTime() ;?></li>
            <li><strong>Location:</strong><?php echo $club->getLocation() ;?></li>
            <li><strong>Advisor:</strong><?php echo $club->getAdvisor() ;?></li>
          </ul>
        </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include __SITE_PATH.'/layout/footer.php' ?>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>