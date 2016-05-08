<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/CongNgheWeb/app/model/department.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Academic Education V2 | Pages | Sidebar Left 2</title>
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
       <h6>Search for staff</h6>
        <div class="sdb_holder">  
          <form class="search-form" method="post" action="#">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <h6>Departments</h6>
        <nav class="sdb_holder">
          <?php 
            foreach ($dep_list as $dep) { ?>
              <ul>
                <li><a href="#"><?php echo $dep->getName() ?></a></li>
              </ul>
          <?php
            }
           ?>
        </nav>
      </div>

      <div id="content" class="three_quarter"> 
        <h1>Staff</h1>
        <div id="staffs">
          <ul>
          <?php foreach ($staff_list as $s) { ?>
           <li>
              <article>
                <header>
                  <?php if ($s->getImage()!="") $img_src = $s->getImage(); else $img_src="images/demo/120x120.gif";  ?>
                  <img class="avatar imgl borderedbox" src="<?php echo $img_src?>" alt="">
                  <div class="staff-name">
                  <a href="#"><?php echo $s->getName(); ?></a>
                  </div>
                  
                </header>
                <div class="staffcon">
                  <ul>
                    <li><time datetime="2045-04-06T08:15+00:00"><?php echo $s->getDob(); ?></time></li>
                    <li><?php echo $s->getEmail(); ?></li>
                    <li><?php echo $s->getDegree(); ?></li>
                    <li><?php echo $s->getPosition(); ?></li>
                    <li><?php echo $s->getDepartmentId(); ?></li>
                  </ul>
                </div>
              </article>
            </li>
          <?php } ?>
           
          </ul>
        </div>
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
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