<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-team"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama Team</th>
          <th>Tahun Berdiri</th>
          <th>kota</th>
          <th>Alamat Basecamp</th>
          <th>Logo</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-team">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_team; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataTeam', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Team';
  $data['url'] = 'Team/import';
  echo show_my_modal('modals/modal_import', 'import-team', $data);
?>

<script>
  $(document).ready(function() {
    function tampilTeam() {
      $.get('<?php echo base_url('TeamController/tampil'); ?>', function(data) {
        MyTable.fnDestroy();
        $('#data-team').html(data);
        refresh();
      });
    }

    tampilTeam();
  });
</script>