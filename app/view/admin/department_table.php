<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Founding</th>
      <th>Dean</th>
      <th></th>
    </tr>
  </thead>
   
  <tbody>
    <?php if (sizeof($department_list) == 0) { ?>
      <tr>
        <td colspan="5"> No result. . .</td>
      </tr>
    <?php } ?>
    <?php 
    foreach ($department_list as $d) { ?>
    <tr>
       <td><a href="index.php?page=admin&tag=edit_department&depId=<?php echo $d->getId(); ?>"><?php echo $d->getName()?></a></td>
      <td><?php echo substr($d->getDescription(), 0, 100);?></td>
      <td><?php echo $d->getFounding()?></td>
      <td><?php echo $d->getDeanId()?></td>
      <td style="min-width: 60px;">
        <a href="index.php?page=admin&tag=edit_department&depId=<?php echo $d->getId(); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> /
        <a id="delete-staff" onclick="deleteDepartment('<?php echo $d->getId(); ?>')">
          <i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
   <?php }?>
  </tbody>
</table>