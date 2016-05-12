<!DOCTYPE html>

<html>
<head>
<title>Meseyside High School</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="layout/scripts/sweetalert-master/dist/sweetalert.css">
<!-- <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'> -->
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
        <h1>ALL CLUBS</h1>
        <div class="sdb_holder" style="margin-bottom: 20px;">  
          <div class="search-form">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here" onkeyup="searchClub(this.value)">
              <button class="fa fa-search" type="button" title="Search"><em>Search</em></button>
            </fieldset>
          </div>
        </div>
        <div id="clubs" class="scrollable">
         <?php include_once __SITE_PATH.'/view/admin/club_table.php'; ?>
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
<script src="layout/scripts/sweetalert-master/dist/sweetalert.min.js"></script>
<!-- <script src="layout/scripts/sweetalert-master/dist/sweetalert-dev.js"></script> -->
<script type="text/javascript">
  function searchClub(searchValue) {
    $.ajax({
      url: "index.php"+window.location.search+"&&search=" + searchValue, 
      success: function(result){
        $("#clubs").html(result);
    }});
  };

  function deleteStaff(clubId) {
    // console.log(staffId);
    swal(
      {   
        title: "Are you sure?",   
        text: "You will not be able to recover this imaginary file!",   
        type: "warning",   showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false 
      }, 
      function(){   
        $.ajax({
          url: "index.php?page=admin&tag=delete_club&clubId="+clubId,
          success: function(){
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
              searchStaff("");
            }
          })
          
        }
    );
  };
</script>
</body>
</html>