<ul>
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