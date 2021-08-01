<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Team</h3>
      <form method="POST" id="form-update-team" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $dataTeam->id_team; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama" name="name_team" aria-describedby="sizing-addon2" value="<?php echo $dataTeam->name_team; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Tahun Berdiri" name="established" aria-describedby="sizing-addon2" value="<?php echo $dataTeam->established; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Kota Asal" name="city_basecamp" aria-describedby="sizing-addon2" value="<?php echo $dataTeam->city_basecamp; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-town-alt"></i>
          </span>
          <textarea name="address_basecamp" placeholder="Alamat Basecamp team" class="form-control"><?php echo $dataTeam->address_basecamp; ?></textarea>
         
        </div>
        <div class="input-group form-group">

          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-picture"></i>
          </span>
           <p>Logo Team</p>
           <img src="<?php echo base_url().'upload/team/'.$dataTeam->logo_team ?>" style="width:40%" class="img-responsive" alt="Logo">
         <input type="file" class="form-control" value="<?php echo $dataTeam->logo_team; ?>" name="logo_team">
         <input type="hidden" class="form-control" name="olg_logo" aria-describedby="sizing-addon2" value="<?php echo $dataTeam->logo_team; ?>">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>