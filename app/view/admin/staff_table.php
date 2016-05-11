<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Date Of Birth</th>
      <th>Email</th>
      <th>Degree</th>
      <th>Position</th>
      <th></th>
    </tr>
  </thead>
   
  <tbody>
    <?php if (sizeof($staff_list) == 0) { ?>
      <tr>
        <td colspan="5"> No result. . .</td>
      </tr>
    <?php } ?>
    <?php 
    foreach ($staff_list as $s) { ?>
    <tr>
      <td><a href="index.php?page=admin&tag=edit_staff&staffId=<?php echo $s->getId(); ?>"><?php echo $s->getName()?></a></td>
      <td><?php echo $s->getDob()?></td>
      <td><?php echo $s->getEmail()?></td>
      <td><?php echo $s->getDegree()?></td>
      <td><?php echo $s->getPosition()?></td>
      <td>
        <a href="index.php?page=admin&tag=edit_staff&staffId=<?php echo $s->getId(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> /
        <a id="delete-staff" onclick="deleteStaff('<?php echo $s->getId(); ?>')">
          <i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
   <?php }?>
  </tbody>
</table>