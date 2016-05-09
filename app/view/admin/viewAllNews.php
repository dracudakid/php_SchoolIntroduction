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
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1>ALL NEWS</h1>
        <div class="sdb_holder" style="margin-bottom: 20px;">  
          <form class="search-form" method="post" action="#">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <div class="scrollable">
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
            	foreach ($news_list as $n) { ?>
              <tr>
                <td><a href=""><?php echo $n->getTitle()?></a></td>
                <td><?php echo $n->getContent()?></td>
                <td><?php echo $n->getCreated()?></td>
                <td><?php echo $n->getCreator_id()?></td>
                <td>
                	<img alt="" src="/php_schoolIntroduction/app/images/demo/avatar.png">
                	<img alt="" src="/php_schoolIntroduction/app/images/delete_icon.png">
				</td>
              </tr>
             <?php }?>
            </tbody>
          </table>
        </div>
        <div id="comments">
          <h2>Comments</h2>
          <ul>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                  By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                  By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                  By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
          </ul>
          <h2>Write A Comment</h2>
          <form action="#" method="post">
            <div class="one_third first">
              <label for="name">Name <span>*</span></label>
              <input type="text" name="name" id="name" value="" size="22">
            </div>
            <div class="one_third">
              <label for="email">Mail <span>*</span></label>
              <input type="text" name="email" id="email" value="" size="22">
            </div>
            <div class="one_third">
              <label for="url">Website</label>
              <input type="text" name="url" id="url" value="" size="22">
            </div>
            <div class="block clear">
              <label for="comment">Your Comment</label>
              <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
            </div>
            <div>
              <input name="submit" type="submit" value="Submit Form">
              &nbsp;
              <input name="reset" type="reset" value="Reset Form">
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

<?php include '../../layout/footer.php' ?>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>