	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Composite Performance Index (CPI)</b> - Penentuan Produk Unggulan Kota Lhokseumawe
		</div>
		<strong>Sistem Pendukung Keputusan</strong> . All Is Well.
	</footer>
	</div>

	<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
	<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/datatables.min.css" rel="stylesheet" />

	<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/datatables.min.js"></script>
	<link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.5/rg-1.4.0/sc-2.2.0/datatables.min.css" rel="stylesheet" />
	<script>
		$(document).ready(function() {
			$('#tabeldata').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#normalisasi1').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#normalisasi2').DataTable();
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#bobotnormal1').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#bobotnormal2').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#hasil1').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#hasil2').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#sub').DataTable();
		});
	</script>
	<script>
		var xValues = [<?php
						foreach ($graph as $g) {
							echo "'" . $g->jenis_nama . "',";
						}
						?>];
		var yValues = [<?php
						foreach ($graph as $g) {
							echo $g->the_count . ",";
						}
						?>];
		var barColors = [
			"#b91d47",
			"#1e7145"
		];

		new Chart("myChart", {
			type: "pie",
			data: {
				labels: xValues,
				datasets: [{
					backgroundColor: barColors,
					data: yValues
				}]
			},
			options: {
				title: {
					display: true,
					text: ""
				}
			}
		});
	</script>
	<script>
		var xValues = [<?php
						foreach ($graph2 as $g) {
							echo "'" . $g->kriteria_nama . "',";
						}
						?>];
		var yValues = [<?php
						foreach ($graph2 as $g) {
							echo $g->the_count . ",";
						}
						?>];
		var barColors = ["orange", "red", "green", "blue", "brown", "yellow", "magenta", "cyan", "darkblue"];

		new Chart("barchart", {
			type: "bar",
			data: {
				labels: xValues,
				datasets: [{
					backgroundColor: barColors,
					data: yValues
				}]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: "ya"
				}
			}
		});
	</script>
	</body>

	</html>