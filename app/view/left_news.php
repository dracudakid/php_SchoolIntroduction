<?php include_once 'model/news.php';?>
<div id = "list_recent" >
<div class="sidebar" style="margin-bottom: 50px;">
	<h2>Recently</h2>
	<nav class="sdb_holder">
		<ul>
			<?php foreach ($news_recently as $a_news_recently){?>
				<li><a style="color: rgba(218, 11, 11, 0.81);"
				href="index.php?page=news_detail&idNews=<?php echo $a_news_recently->getId()?>">
						<?php echo $a_news_recently->getTitle()?>
					</a></li>
			<?php }?>
			</ul>
	</nav>
</div>

<!-- image infor -->
<!-- ################################################################################################ -->
<ul class="nospace">
	<li class="btmspace-15"><a href="#"><em class="heading">Administrator</em>
			<img class="borderedbox imageHome" src="images/4.jpg" alt=""></a></li>
	<li class="btmspace-15 "><a href="#"><em class="heading">Staff</em> <img
			class="borderedbox imageHome" src="images/tapthekhoa.jpg" alt=""></a></li>
	<li class="btmspace-15"><a href="#"><em class="heading">Club</em> <img
			class="borderedbox imageHome" src="images/mqdefault.jpg" alt=""></a></li>
</ul>
<!-- ################################################################################################ -->
</div>