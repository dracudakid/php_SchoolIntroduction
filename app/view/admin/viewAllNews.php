<?php 
include_once __SITE_PATH.'/model/news.php'; 

?>

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
<title>Meseyside High School</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="layout/scripts/sweetalert-master/dist/sweetalert.css">


</head>
<body id="top">
<div class="wrapper row0">
  <?php include __SITE_PATH.'/layout/topbar.php' ?>
</div>


<div class="wrapper row1">
  <?php include __SITE_PATH.'/layout/header.php' ?>
</div>


<!-- ################################################################################################ --> 

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
        <!-- ################################################################################################ -->
        
        <!-- admin -->
        <?php require __SITE_PATH.'/layout/admin-nav.php' ?>
        
      </div>
      
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1>ALL NEWS</h1>
        <div class="sdb_holder" style="margin-bottom: 20px;">  
          <form class="search-form" method="post" action="#">
            <fieldset>
              <legend>Search:</legend>
              <input id="txtSearch" type="text" value="" placeholder="Search Here" onkeyup="searchNews(this.value)">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <div class="scrollable">
        <div id="news">
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Create date</th>
                <th>Creator</th>
                <th>Function</th>
              </tr>
            </thead>
             
            <tbody>
	            <?php 
	            	foreach ($all_news as $n) { ?>
	              <tr>
	                <td><a href=""><?php echo $n->getTitle()?></a></td>
	                <td><?php echo $n->getContent()?></td>
	                <td><?php echo $n->getCreated()?></td>
	                <td><?php echo $n->getCreator_id()?></td>
	                <td>
	                	<div style="text-align: center;">
		                	<a class="fa fa-pencil-square-o" aria-hidden="true" 
		                		href="index.php?page=admin&tag=edit_news&idNews=<?php echo $n->getId() ?>">
		                	 </a>
		                	<a class="fa fa-trash" aria-hidden="true" id="b4"
		                		onclick="deleteNews('<?php echo $n->getId() ?>')">
		                	</a>
	                	</div>
					       </td>
	              </tr>
	             <?php }?>

            </tbody>
          </table>
          </div>
        </div>
      </div>
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>

<?php include 'layout/footer.php' ?>
<!-- JAVASCRIPTS --> 

<script src="layout/scripts/sweetalert-master/dist/sweetalert.min.js"></script>
<script src="layout/scripts/sweetalert-master/dist/sweetalert-dev.js"></script>
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script type="text/javascript">

	//comfirm delete
	function deleteNews(id){
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
					url: "index.php?page=admin&tag=delete_news&idNews="+id,
					success: function(){
						swal({
							title: "Deleted",   
							type: "success"
						}, function(){
							window.location="index.php?page=admin&tag=all_news";
						}); 
						}
					})
					
				});
	};

	//search
	function searchNews(searchValue) {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	        document.getElementById("news").innerHTML = xmlhttp.responseText;
	      }
	    }
	    xmlhttp.open("GET", "index.php?page=admin&tag=all_news&search=" + searchValue, true);
	    xmlhttp.send();
	  }

</script>
</body>
</html>