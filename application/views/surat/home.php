<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-surat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>No Surat</th>
          <th>Tanggal Surat</th>
          <th>Tujuan</th>
        
          <th>Ket Diterima</th>
          <th>Keterangan</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-surat">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_surat; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSurat', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Surat';
  $data['url'] = 'Surat/import';
  echo show_my_modal('modals/modal_import', 'import-surat', $data);
?>

<script>
  $(document).ready(function() {
   // var table = $('#example').DataTable({
   //    "paging": true,
   //    "lengthChange": true,
   //    "scrollX": false,
   //    "scrollY": false,
   //    "searching": false,
   //    "ordering": false,
   //    "info": false,
   //    "autoWidth": false,
   //  });
    
     // table.columns.adjust().draw();
    function tampilSurat() {
      $.get('<?php echo base_url('SuratController/tampil'); ?>', function(data) {
        // MyTable.fnDestroy();
        $('#data-surat').html(data);
        refresh();
      });
    }

    tampilSurat();
  });
</script> 