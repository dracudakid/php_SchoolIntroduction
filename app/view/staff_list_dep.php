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
              <input type="text" value="" placeholder="Search Here" onkeyup="searchStaff(this.value)">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <h6>DEPARTMENTS</h6>
        <nav class="sdb_holder">
          <?php 
            foreach ($dep_list as $dep) { ?>
              <ul>
                <li><a href="index.php?page=staff_list&dep=<?php echo $dep->getId() ?>"><?php echo $dep->getName() ?></a></li>
              </ul>
          <?php
            }
           ?>
        </nav>
      </div>

      <div id="content" class="three_quarter"> 
        <div class="container">
        <h1><?php echo $department->getName() ?></h1>
        <?php if ($department->getImage()!="") $depImg = $department->getImage(); else $depImg="images/demo/120x120.gif";  ?>
        <div class="clearfix"><img id="department-img" class="imgl borderedbox" style="overflow: all;" src="<?php echo $depImg ?>" alt="">
        <p><?php echo $department->getDescription(); ?></p>
        <p>Founding: <?php echo $department->getFounding(); ?></p>
        <p>Dean: <?php echo $department->getDeanId(); ?></p>
        </div>
        </div>
        <div class="container">
        <h1>Staff</h1>
          <div id="staffs">
            <ul>
            <?php foreach ($staff_list as $s) { ?>
             <li class="staff">
                <div class="one_quarter first"> 
                   <?php if ($s->getImage()!="") $img_src = $s->getImage(); else $img_src="images/demo/120x120.gif";  ?>
                  <img class="avatar borderedbox" src="<?php echo $img_src?>" alt="">
                </div>
                <div class="three_quarter">
                  <article>
                  <header>
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
                </div>

              </li>
            <?php } ?>
             
            </ul>
          </div>
        </div>
        <div class="container">
          <nav class="pagination">
        <ul>
          <li><a href="#">« Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>…</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><strong>…</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li><a href="#">Next »</a></li>
        </ul>
      </nav>
        </div>
        
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
<script type="text/javascript">
  function searchStaff(searchValue) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("staffs").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "index.php"+window.location.search+"&&search=" + searchValue, true);
    xmlhttp.send();
  }
</script>
</body>
</html>