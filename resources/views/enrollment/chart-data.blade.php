

<div class="card">

    <!-- Card header -->
    <div class="card-header">
<!-- Title -->
<h5 class="h3 mb-0">Bars chart</h5>
</div>
<!-- Card body -->
    <div class="card-body">
<div class="chart">
    <!-- Chart wrapper -->
    <canvas id="new" class="chart-canvas"></canvas>
</div>
</div>
</div>





  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Docs JS -->
  <script src="../../assets/vendor/anchor-js/anchor.min.js"></script>
  <script src="../../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="../../assets/vendor/holderjs/holder.min.js"></script>
  <script src="../../assets/vendor/prismjs/prism.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.min.js?v=1.2.0"></script>

  <script type="text/javascript">
  var BarsChart = (function() {

	//
	// Variables
	//

	var $chart = $('#new');


	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'bar',
			data: {
				labels: ['Semester', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: 'Sales',
					data: [100, 35, 30, 22, 17, 29]
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', ordersChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
</script>

</body>

</html>
