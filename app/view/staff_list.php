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
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
        <!-- ################################################################################################ -->
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
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1>&lt;h1&gt; to &lt;h6&gt; - Headline Colour and Size Are All The Same</h1>
        <img class="imgr borderedbox" src="images/demo/120x120.gif" alt="">
        <p>Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.</p>
        <p>Dapiensociis <a href="#">temper donec auctortortis cumsan</a> et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.</p>
        <img class="imgl borderedbox" src="images/demo/120x120.gif" alt="">
        <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">website template licence</a>.</p>
        <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more website templates visit <a href="http://www.os-templates.com/">free website templates</a>.</p>
        <p>Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
        <h1>Table(s)</h1>
        <div class="scrollable">
          <table>
            <thead>
              <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
                <th>Header 4</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#">Value 1</a></td>
                <td>Value 2</td>
                <td>Value 3</td>
                <td>Value 4</td>
              </tr>
              <tr>
                <td>Value 5</td>
                <td>Value 6</td>
                <td>Value 7</td>
                <td><a href="#">Value 8</a></td>
              </tr>
              <tr>
                <td>Value 9</td>
                <td>Value 10</td>
                <td>Value 11</td>
                <td>Value 12</td>
              </tr>
              <tr>
                <td>Value 13</td>
                <td><a href="#">Value 14</a></td>
                <td>Value 15</td>
                <td>Value 16</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="comments">
          <h2>Comments</h2>
          <ul>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
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
                  <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
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
                  <figure class="avatar"><img src="images/demo/avatar.png" alt=""></figure>
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

<?php include__SITE_PATH.'/layout/footer.php' ?>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>