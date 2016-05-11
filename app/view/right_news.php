<div id="others">
	<div class="sdb_holder">
		<h6>Introduce school</h6>
		<div class="mediacontainer">
			<video width="100%" controls autoplay muted>
				<source src="images/demo/Harvard University.mp4" type="video/mp4">
				<source src="movie.ogg" type="video/ogg">
			</video>
		</div>
	</div>
	<div class="sdb_holder">
		<h6>Quick Information</h6>
		<ul class="nospace quickinfo">
            <?php foreach ($best_news as $a_news){?>
              <li class="clear"><a
				href="index.php?page=news_detail&idNews=<?php echo $a_news->getId()?>">
					<img src="<?php echo $a_news->getImage()?>" alt=""><?php echo $a_news->getTitle()?>
              	</a></li>
              <?php }?>
            </ul>
	</div>
</div>