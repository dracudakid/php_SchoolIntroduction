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
        
        <?php require __SITE_PATH.'/layout/admin-nav.php' ?>
        <div class="sdb_holder">
          <h6>Lorem ipsum dolor</h6>
          <address>
          Full Name<br>
          Address Line 1<br>
          Address Line 2<br>
          Town/City<br>
          Postcode/Zip<br>
          <br>
          Tel: xxxx xxxx xxxxxx<br>
          Email: <a href="#">contact@domain.com</a>
          </address>
        </div>
        <div class="sdb_holder">
          <article>
            <h6>Lorem ipsum dolor</h6>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
            <ul>
              <li><a href="#">Lorem ipsum dolor sit</a></li>
              <li>Etiam vel sapien et</li>
              <li><a href="#">Etiam vel sapien et</a></li>
            </ul>
            <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed. Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
            <p class="more"><a href="#">Continue Reading &raquo;</a></p>
          </article>
        </div>
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- Add News -->
      
      
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        
       	<!-- if viewAllNews request check -->
       	
        <h2>Add News</h2>
        <div id="comments">
          <form action="index.php?page=admin&&tag=all_news" method="post">
            <div class="one_third first">
              <label for="title">Title<span>*</span></label>
              <input type="text" name="titleNews" id="title" value="<?php if($news_edit != null) 
              	echo $news_edit->getTitle()?>" size="22">
            </div>
            
            <div class="one_third first">
              <label for="image">Image<span>*</span></label>
              <input type="file" name="imageNews" id="image">
              <img alt="" src="/php_schoolIntroduction/app/images/demo/avatar.png">
            </div>
            
            <div class="block clear">
              <label for="content">Content<span>*</span></label>
              <textarea name="contentNews" id="content" cols="25" rows="10" class="ckeditor" 
              class="input-long" ><?php if($news_edit != null) echo $news_edit->getContent()?></textarea>
            </div>
            
            <div>
            	<input type="hidden" value="<?php if($news_edit != null) echo $news_edit->getId()?>" name="idNews"/>
            </div>
            <div>
              <input name="SubmitNews" type="submit" value="Submit">
              &nbsp;
              <input name="reset" type="reset" value="Reset">
            </div>
          </form>
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
<script type="text/javascript" src="view/admin/ckeditor/sample.js"></script>
<script type="text/javascript" src="view/admin/ckeditor/ckeditor.js"></script>
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>