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
       <h6>Search for club</h6>
        <div class="sdb_holder">  
          <form class="search-form" method="post" action="#">
            <fieldset>
              <legend>Search:</legend>
              <input type="text" value="" placeholder="Search Here">
              <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
            </fieldset>
          </form>
        </div>
        <h6>CLUBS</h6>
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
        <h1>Clubs and Activities</h1>
        <p>Welcome to the student activities program at Upper Arlington High School. Our high school strives to offer a diversified group of student activities, and we encourage student involvement.</p>
        <h2>Purpose of Extra-Curricular Programs</h2>
        <p>The Board of Education recognizes that a complete extra-curricular program based upon student interest assists in the total education of students. While emphasis is given to intellectual growth, diversified opportunities must be provided for students who wish to participate in the program. All such programs must contribute to the goals of general education to justify their existence in the curriculum.</p>
        <h2>Academic Requirements (Athletic, Extra-Curricular and Co-Curricular)</h2>
        <p>High school students must meet the following academic requirements in order to participate in athletics, extra-curricular activities, or co-curricular activities:</p>
        <p>A student must earn at least a 2.0 grade point average in order to be eligible for participation. The GPA will be calculated each grading period, and eligibility can be maintained, gained, or lost each grading period.</p>
        <p>A student's eligibility will be determined according to his or her GPA for each nine-week grading period. A student's eligibility will be determined by examining each nine-week GPA independently of prior grading periods.</p>
        <p>In addition to the above requirements, a UAHS student athlete must qualify under all rules established by the Ohio High School Athletic Association (OHSAA). Which includes: "During the preceding grading period, the student must have received passing grades in a minimum of five one-credit courses or the equivalent which count toward graduation."</p>
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