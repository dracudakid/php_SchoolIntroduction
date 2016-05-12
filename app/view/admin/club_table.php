<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Time</th>
      <th>Location</th>
      <th>Advisor</th>
      <th></th>
    </tr>
  </thead>
   
  <tbody>
    <?php if (sizeof($club_list) == 0) { ?>
      <tr>
        <td colspan="7"> No result. . .</td>
      </tr>
    <?php } ?>
    <?php 
    foreach ($club_list as $c) { ?>
    <tr>
      <td><a href=""><?php echo $c->getName()?></a></td>
      <td><?php echo substr($c->getDescription(), 0, 100).'. . .'?></td>
      <td><?php echo $c->getTime();?></td>
      <td><?php echo $c->getLocation();?></td>
      <td><?php echo $c->getAdvisor(); ?></td>
      <td style="min-width: 60px;">
        <a href="index.php?page=admin&tag=edit_staff&staffId=<?php echo $c->getId(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> /
        <a id="delete-staff" onclick="deleteStaff('<?php echo $c->getId(); ?>')">
          <i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
   <?php }?>
  </tbody>
</table>