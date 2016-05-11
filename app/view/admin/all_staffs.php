<!DOCTYPE html>

<html>
<head>
<title>Meseyside High School</title>
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

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <div class="sidebar one_quarter first"> 
        <!-- admin -->
        <?php require __SITE_PATH.'/layout/admin-nav.php' ?>
        
        <div class="sdb_holder">
          
        </div>
        <div class="sdb_holder">
         
        </div>
     
      </div>
      <div id="content" class="three_quarter"> 
        <h1>ALL STAFFS</h1>
        <div class="sdb_holder" style="margin-bottom: 20px;">  
          <div class="search-form">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here" onkeyup="searchStaff(this.value)">
              <button class="fa fa-search" type="button" title="Search"><em>Search</em></button>
            </fieldset>
          </div>
        </div>
        <div id="staffs" class="scrollable">
         <?php include_once __SITE_PATH.'/view/admin/staff_table.php'; ?>
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
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script type="text/javascript">
  function searchStaff(searchValue) {
    $.ajax({
      url: "index.php"+window.location.search+"&&search=" + searchValue, 
      success: function(result){
        $("#staffs").html(result);
    }});
  }
</script>
</body>
</html>