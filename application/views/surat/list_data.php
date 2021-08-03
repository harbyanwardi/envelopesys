<?php
  foreach ($dataSurat as $surat) {
    ?>
    <tr>
      <td style="min-width:180px;"><?php echo $surat->nama; ?></td>
      <td><?php echo $surat->nomor_surat; ?></td>
      <td ><?php echo $surat->tanggal_surat; ?></td>
      <td ><?php echo $surat->tujuan; ?></td>
      
      <td><?php echo $surat->ket_diterima; ?></td>
      <td><?php echo $surat->keterangan; ?></td>
      
      <td class="text-center" style="min-width:100px;">
        <a href="<?php echo base_url()."SuratController/download/".$surat->id; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i></a>
        <button class="btn btn-info detail-dataSurat" data-id="<?php echo $surat->id; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
        <button class="btn btn-warning update-dataSurat" data-id="<?php echo $surat->id; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-danger konfirmasiHapus-surat" data-id="<?php echo $surat->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
      </td>
    </tr>
    <?php
  }
?>