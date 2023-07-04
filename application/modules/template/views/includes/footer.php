<!-- jquery-ui --> 

<script src="<?php echo base_url('assets/plugins/bootstrap/js/datatables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/datatable.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/datatablereport.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap-select.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/moment-with-locales.min.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap-material-datetimepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/plugins/pace/pace.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap tag input-->
<script src="<?php echo base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/custom-script.js') ?>" type="text/javascript"></script>
<!-- lobipanel -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>" type="text/javascript"></script>
<!-- new panel -->
<script src="<?php echo base_url('assets/plugins/metisMenu/metisMenu.min.js') ?>" type="text/javascript"></script>
<!-- Pace js -->
<script src="<?php echo base_url('assets/js/script.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') ?>" type="text/javascript"></script>

<!-- sweetalert -->
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>

<!-- bootstrap timepicker -->
<script src="<?php echo base_url('assets/js/jquery-ui-sliderAccess.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/sidebar.js') ?>" type="text/javascript"></script>
<input type="hidden" id="base" value="<?php echo base_url(); ?>">
<input type="hidden" id="emtycheck" value="<?php echo $this->uri->segment(2); ?>">
<script src="<?php echo base_url('assets/js/global.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/demo.js') ?>" type="text/javascript"></script>


<!-- Select2 -->
<script src="<?php echo base_url('assets/js/select2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url("assets/plugins/jQuery-print/jQuery.print.min.js")?>"></script>



<!-- Ordermanage js load -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/pusher.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/mousetrap-master/mousetrap.min.js')?>" type="text/javascript"></script>
<?php  $path = 'application/modules/';
        $map = directory_map($path);
        $modnames = array();
        if (is_array($map) && sizeof($map) > 0){
        $modnames = array_filter(array_keys($map));
        $modnames = preg_replace('/\W/', '', $modnames);
        }
        if (in_array("ordermanage", $modnames) === true) {
           
            ?>
        
<script src="<?php echo base_url('/ordermanage/order/showljslang') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/application/modules/ordermanage/assets/js/print.js') ?>" type="text/javascript"></script>
<?php } ?>
<?php $checkModule = $this->db->where('directory', 'day_closing')->where('status', 1)->get('module')->num_rows(); if ($checkModule == 1) { ?>
    <a id="dayClose" hidden></a>
    <script src="<?php echo base_url('application/modules/day_closing/assets/js/cashregister.js') ?>" type="text/javascript"></script>
<?php } ?>
<!-- Include module Script -->
<?php
    $path = 'application/modules/';
    $map  = directory_map($path);
    if (is_array($map) && sizeof($map) > 0)
    foreach ($map as $key => $value) {
        $js   = str_replace("\\", '/', $path.$key.'assets/js/script.js'); 
        if (file_exists($js)) {
            echo "<script src=".base_url($js)." type=\"text/javascript\"></script>";
        }   
    }   
?>
