<?php include_once 'model/news.php';?>

<style>
ul.enlarge li{
	position: relative; /*allows precise positioning of the popup image when used with position:absolute - see support section */
	z-index: 0; /*resets the stack order of the list items - we'll increase in step 4. See support section for more info*/
}

ul.enlarge span{
position:absolute; /*see support section for more info on positioning*/
top: -3000px;
}

ul.enlarge li:hover{
	z-index: 50; /*places the popups infront of the thumbnails, which we gave a z-index of 0 in step 1*/ 
	cursor:pointer; /*changes the cursor to a hand*/
}

ul.enlarge li:hover span{ /*positions the <span> when the <li> (which contains the thumbnail) is hovered*/ 
	top: -200px; /*the distance from the bottom of the thumbnail to the top of the popup image*/
	left: -100px;
}

ul.enlarge span img{
	padding: 2px; /*size of the frame*/
	background: #ccc; /*colour of the frame*/
	max-width: none;
	width: 500px;
}

ul.enlarge span{
	/**Style the frame**/
	padding: 10px; /*size of the frame*/
	background:#eae9d4; /*colour of the frame*/
	/*add a drop shadow to the frame*/
	-webkit-box-shadow: 0 0 20px rgba(0,0,0, .75));
	-moz-box-shadow: 0 0 20px rgba(0,0,0, .75);
	box-shadow: 0 0 20px rgba(0,0,0, .75);
	/*give the corners a curve*/
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius:8px;
	/**Style the caption**/
	font-family: 'Droid Sans', sans-serif; /*Droid Sans is available from Google fonts*/
	font-size:.9em;
	text-align: center;
	color: #495a62;
}
</style>

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
<ul class="nospace enlarge" >
	<li class="btmspace-15"><a href="#"><em class="heading">Administrator</em>
			<img class="borderedbox" src="images/left/administrator.png" alt="">
			<span> <!--span contains the popup image-->
				<img src="images/left/administrator.png" alt="" /> <!--popup image-->
				<br />Administrator
			</span>
			</a></li>
	<li class="btmspace-15 "><a href="index.php?page=staff_list"><em class="heading">Staff</em> 
			<img class="borderedbox" src="images/left/tapthekhoa.png" alt="">
			<span>
				<img src="images/left/tapthekhoa.png" alt="" /> <!--popup image-->
				<br />Staff
			</span>
			</a></li>
	<li class="btmspace-15"><a href="index.php?page=club_list"><em class="heading">Club</em> 
		<img class="borderedbox" src="images/left/eng_club.png" alt="">
		<span>
			<img src="images/left/eng_club.png" alt="" /> <!--popup image-->
			<br />Club
		</span>
		</a></li>
</ul>
<!-- ################################################################################################ -->
</div>

