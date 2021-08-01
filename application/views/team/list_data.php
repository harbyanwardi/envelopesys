<?php
  foreach ($dataTeam as $team) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $team->name_team; ?></td>
      <td ><?php echo $team->established; ?></td>
      <td><?php echo $team->city_basecamp; ?></td>
      <td style="min-width: 230px"><?php echo $team->address_basecamp; ?></td>
      <td ><img src="<?php echo base_url().'upload/team/'.$team->logo_team ?>" style="width:40%" class="img-responsive" alt="Logo"></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataTeam" data-id="<?php echo $team->id_team; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-team" data-id="<?php echo $team->id_team; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>