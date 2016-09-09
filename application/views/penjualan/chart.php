<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo $judul; ?> </h5>
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
      <div class="ibox-content">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Pie Chart</title>
		<script type="text/javascript">
		$(document).ready(function() {
			var options = {
				chart: {
	                renderTo: 'container',
	                plotBackgroundColor: null,
	                plotBorderWidth: null,
	                plotShadow: false
	            },
	            title: {
	                text: 'Penjualan Barang '
	            },
	            tooltip: {
	                formatter: function() {
	                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	                }
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                        color: '#000000',
	                        connectorColor: '#000000',
	                        formatter: function() {
	                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	                        }
	                    }
	                }
	            },
	            series: [{
	                type: 'pie',
	                name: 'Browser share',
	                data: []
	            }]
	        }

	        $.getJSON( "<?php echo site_url()?>penjualan/data_chart", function(json) {
				options.series[0].data = json;
	        	chart = new Highcharts.Chart(options);
	        });
      	});
		</script>

	<body>
		<div id="container" style="min-width: 300px; height: 300px; margin: 0 auto"></div>
	</body>
</div>
</div>
</div>
</div>
</div>
