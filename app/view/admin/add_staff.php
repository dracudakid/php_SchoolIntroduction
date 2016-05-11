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
        <h1>ADD STAFFS</h1> 
      
          <form action="index.php?page=admin&tag=add_staff" id="add-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo "$id"; ?>" >
            <div class="sdb_holder" style="margin-bottom: 20px;">  
              <label for="name">Name: </label>
              <input type="text" name="name">
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;">  
              <label for="dob">Date Of Birth: </label>
              <input type="date" name="dob">
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;"> 
              <label for="email">Email: </label>
              <input type="email" name="email">
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;"> 
              <label for="degree">Degree: </label>
              <select name="degree" id="">
                <option value="Doctor">Doctor</option>
                <option value="Master">Master</option>
                <option value="None">None</option>
              </select>
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;"> 
              <label for="image">Image</label>
              <input type="file" name="image" id="imgInp" accept="image/*">
              <img src="" alt="" id="image-preview" class="borderedbox">
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;"> 
              <label for="position">Position: </label>
              <input type="text" name="position">
            </div>
            <div class="sdb_holder" style="margin-bottom: 20px;"> 
              <label for="department">Department: </label>
              <select name="department" id="">
                <?php foreach ($dep_list as $d) { ?>
                  <option value="<?php echo $d->getId(); ?>"><?php echo $d->getName(); ?></option>
                <?php } ?>
              </select>
            </div>
            <div>
              <input type="submit" value="Add staff">
              <input type="reset" value="Reset">
            </div>
          </form>
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
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#image-preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>
</body>
</html>