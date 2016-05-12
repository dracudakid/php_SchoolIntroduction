<?php 
include_once __SITE_PATH.'/model/department.php'; 
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
       <h4>Search for staff</h4>
        <div class="sdb_holder">  
          <form class="search-form" method="post" >
            <fieldset>
              <legend>Search:</legend>
              <input id="txtSearch"type="text" value="" placeholder="Search Here" onkeyup="searchStaff(this.value)">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <h4>DEPARTMENTS</h4>
        <nav class="sdb_holder">
          <?php 
            foreach ($dep_list as $dep) { ?>
              <ul>
                <li><a href="index.php?page=staff_list&&dep=<?php echo $dep->getId() ?>"><?php echo $dep->getName() ?></a></li>
              </ul>
          <?php
            }
           ?>
        </nav>
      </div>

      <div id="content" class="three_quarter"> 
        <h1>Melwood High School's Staffs</h1>
        <div id="staffs">
          <ul id="staffs-list">
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
<script src="layout/scripts/jPaginate.js"></script>
<script type="text/javascript">
  function searchStaff(searchValue) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("staffs").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "index.php?page=staff_list&&search=" + searchValue, true);
    xmlhttp.send();
  }
  $("#staffs-list").jPaginate();
</script>
</body>
</html>