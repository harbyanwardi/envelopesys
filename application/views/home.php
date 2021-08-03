<div class="row">
  
  <div class="col-lg-4 col-xs-6">
                  <div class="form-group">
                    <label class="control-label">From</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="date" class="form-control" id="dateFrom" name="date_from" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                  <div class="form-group">
                    <label class="control-label">To</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="date" class="form-control" id="dateTo" name="date_to" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" style="margin-top: 23px;">
                    <button id="searchtotal" type="button" class="btn btn-block btn-primary" data-toggle="search">Search</button>
                  </div>
                </div>
             
              </div>
              <div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_acc; ?></h3>

        <p>Jumlah Surat ACC</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-checkmark-circle"></i>
      </div>
      <a href="<?php echo base_url('SuratController') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $jml_tolak; ?></h3>

        <p>Jumlah Surat Ditolak</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-cancel"></i>
      </div>
      <a href="<?php echo base_url('SuratController') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_tk; ?></h3>

        <p>Jumlah Surat TK</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-create"></i>
      </div>
      <a href="<?php echo base_url('SuratController') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green  ">
      <div class="inner">
        <h3><?php echo $jml_belum; ?></h3>

        <p>Jumlah Surat Belum Diterima</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-exit"></i>
      </div>
      <a href="<?php echo base_url('SuratController') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
</div>

<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>
  //data posisi
  var pieChartCanvas = $("#data-posisi").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_posisi; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);

  //data kota
  var pieChartCanvas = $("#data-kota").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_kota; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
</script>