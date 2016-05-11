<div id="news">
	<ul class="nospace listing">
           <?php
				foreach ( $all_news as $n ) {
		   ?>
            <li class="clear">
			<div class="imgl borderedbox" style="width: 150px;">
				<img src="<?php echo $n->getImage()?>" alt="">
			</div>
			<p class="nospace btmspace-15">
				<a href="index.php?page=news_detail&idNews=<?php echo $n->getId()?>"><strong>
              	<?php
					if (strlen ( $n->getTitle () ) > 30) {
						$title = substr ( $n->getTitle (), 0, 30 );
						$n->setTitle ( $title . "..." );
					}
					echo $n->getTitle ()?></strong></a>
			</p>
			<p style="font-size: 12px; font-style: italic;">
				<a href="#"><?php echo $n->getCreated()?></a>
			</p>
			<p><?php
												
				if (strlen ( $n->getContent () ) > 200) {
					$content = substr ( $n->getContent (), 0, 200 );
					$n->setContent ( $content . "..." );
				}
				echo $n->getContent ()?></p>
		</li>
          <?php }?>
          </ul>
</div>