<canvas id="lineChart2" height="140"></canvas>
<input type="hidden" id="monthlysaleamount" value="<?php echo html_escape($monthlysaleamount);?>">
<input type="hidden" id="monthlysaleorder" value="<?php echo html_escape($monthlysaleorder);?>">
<input type="hidden" id="month_name" value='<?php echo html_escape($monthname);?>'>
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/chart2.js"></script>
