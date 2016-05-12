
<div id="topbar" class="clear"> 
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Contact Us</a></li>
      
      
        <?php if (isset($_SESSION["account"])) { ?>
          <li><a href="index.php?page=admin"><?php echo $_SESSION["account"]; ?></a> </li>
          <li><a id="account" href="index.php?page=log-out">Log out</a></li>
        <?php }  else {?>
           <li><a id="sign-in"  style="cursor: pointer;">Admin Login</a></li>
        <?php } ?>
      
    </ul>
  </nav>
</div>

<div id="sign-in-modal" class="modal">
  <div class="modal-content">
    <div class="wrapper row3">
      <div class="rounded">
        <div class="container clear">
          <!-- <div class=""> -->
            <h1 style="text-align: center">LOGIN</h1>
            <form action="index.php?page=sign-in" id="signin-form" method="POST">
              <div class="sdb_holder" style="margin-bottom: 20px;"> 
                <label for="">Name:</label>
                <input type="text" name="name">
              </div>
              <div class="sdb_holder" style="margin-bottom: 20px;"> 
                <label for="">Password:</label>
                <input type="password" name="password">
              </div>
              <div>
                <input type="submit" value="Sign in">
                <input type="button" id="close" value="Cancel">
              </div>
            </form>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById("sign-in").onclick = function(){
    console.log("sign-in");
    var modal = document.getElementById("sign-in-modal");
    modal.style.display = "block";
  };
  document.getElementById("close").onclick = function(){
    var modal = document.getElementById("sign-in-modal");
    modal.style.display = "none";
  };
</script>
