<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Statistik </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content"><br><br>

<script type="text/javascript">
	var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },
         title: {
            text: ''
         },
         xAxis: {
            categories: ['Nama Barang']
         },
         yAxis: {
            title: {
               text: 'Stok'
            }
         },
              series:
            [

    <?php foreach ($chart as $data_chart){ ?>

      {
        name:  '<?php echo $data_chart['nama_barang'] ?>' ,
        data: [<?php echo $data_chart['stok']?>]
      },

    <?php } ?>
]
});
});
</script><br><br>
<body>
<div id="container" style="min-width: 300; height: 300; margin: 0 auto"></div>
</body>
</div>
</div>
</div>
</div>
</div>
