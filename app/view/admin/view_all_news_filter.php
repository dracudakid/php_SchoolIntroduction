<div id="news">
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
					foreach ( $all_news as $n ) {
				?>
	              <tr>
					<td><a href=""><?php echo $n->getTitle()?></a></td>
					<td><?php echo $n->getContent()?></td>
					<td><?php echo $n->getCreated()?></td>
					<td><?php echo $n->getCreator_id()?></td>
					<td>
						<div style="text-align: center;">
							<a class="fa fa-pencil-square-o" aria-hidden="true"
								href="index.php?page=admin&tag=edit_news&idNews=<?php echo $n->getId() ?>">
							</a> <a class="fa fa-trash" aria-hidden="true" id="b4"
								onclick="deleteNews('<?php echo $n->getId() ?>')"> </a>
						</div>
					</td>
				</tr>
	             <?php }?>
            
		</tbody>
	</table>
 </div>
