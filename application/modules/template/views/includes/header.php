<link rel="stylesheet" href="<?php echo base_url();?>assets/css/notify.css">
<?php 
 $new_version  = file_get_contents('https://update.bdtask.com/xainhotel/autoupdate/update_info');
 $myversion = current_version();
function current_version(){

        //Current Version
        $product_version = '';
        $path = FCPATH.'system/core/compat/lic.php'; 
        if (file_exists($path)) {
            
            // Open the file
            $whitefile = file_get_contents($path);

            $file = fopen($path, "r");
            $i    = 0;
            $product_version_tmp = array();
            $product_key_tmp = array();
            while (!feof($file)) {
                $line_of_text = fgets($file);

                if (strstr($line_of_text, 'product_version')  && $i==0) {
                    $product_version_tmp = explode('=', strstr($line_of_text, 'product_version'));
                    $i++;
                }                
            }
            fclose($file);

            $product_version = trim(@$product_version_tmp[1]);
            $product_version = ltrim(@$product_version, '\'');
            $product_version = rtrim(@$product_version, '\';');

            return @$product_version;
            
        } else {
            //file is not exists
            return false;
        }
        
    }

?>
<div id="openregister" class="modal fade  bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="openclosecash">
        </div>
    </div>
</div>
<nav class="navbar-custom-menu navbar navbar-expand-xl m-0">
    <div class="sidebar-toggle-icon" id="sidebarCollapse">
        <span></span>
    </div>
    <!--/.sidebar toggle icon-->
    <!-- Collapse -->
    <div class="navbar-icon d-flex">
        <ul class="navbar-nav flex-row align-items-center">
            <div class="">
                <a href="<?php echo base_url('') ?>" target="_blank" class="btn btn-success"><?php echo display('website') ?></a>
            </div>
            <?php 
            $notification = $this->db->select("*")->from("tbl_version_checker")->get()->row();
            if($notification->disable==0 | $notification->version!=$new_version){ ?>
                <div>
                    <?php if ($new_version>$myversion) { ?><li><a href="<?php echo base_url("autoupdate") ?>" style="display: flex;align-items: center;background: #f81111;padding: 5px 10px 5px 10px;margin-right: 5px;margin-left: 5px;color: #fff;animation-name: anim_opa; animation-duration: 0.8s; animation-iteration-count: infinite;"><i class="fa fa-warning" style="background: transparent; border: 0; color: #fff;"></i><span style="font-size: 16px;font-weight: 600;"><?php echo display("update")." ".display("available") ?></span></a></li><?php } ?>
                </div>
            <?php } ?>
            <?php 
            $checkModule = $this->db->where('directory', 'day_closing')->where('status', 1)->get('module')->num_rows(); if ($checkModule == 1 & $this->db->table_exists('tbl_cashregister')) {
            $saveid=$this->session->userdata('id'); 
		    $checkuser = $this->db->select('*')->from('tbl_cashregister')->where('userid',$saveid)->where('status',0)->order_by('id','DESC')->get()->row(); 
            if(!empty($checkuser)){ ?>
            <div>
                <li class="day-close"><a href="javascript:;" class="btn" onclick="closeopenresister()" role="button"><span class="text-white"><?php echo display("day_close") ?></span></a></li>
            </div>
            <?php } } ?>
            <li class="nav-item dropdown quick-actions">
                <a class="nav-link dropdown-toggle material-ripple" href="" data-toggle="dropdown">
                    <i class="typcn typcn-th-large-outline"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="nav-grid-row row">
                        <a href="<?php echo base_url('profile-setting') ?>" class="icon-menu-item col-4">
                            <i class="typcn typcn-cog-outline d-block"></i>
                            <span><?php echo display('setting') ?></span>
                        </a>
                        <a href="<?php echo base_url('profile') ?>" class="icon-menu-item col-4">
                            <i class="typcn typcn-group-outline d-block"></i>
                            <span><?php echo display('user_list') ?></span>
                        </a>
                        <a href="<?php echo base_url('room_reservation/room_reservation') ?>"
                            class="icon-menu-item col-4">
                            <i class="typcn typcn-puzzle-outline d-block"></i>
                            <span><?php echo display('booking_list') ?></span>
                        </a>
                        <a href="<?php echo base_url('reports/report') ?>" class="icon-menu-item col-4">
                            <i class="typcn typcn-chart-bar-outline d-block"></i>
                            <span><?php echo display('report') ?></span>
                        </a>
                    </div>
                </div>
            </li>
            <!--/.dropdown-->
            <li class="nav-item">
                <a class="nav-link material-ripple" href="#" id="btnFullscreen"><i
                        class="full-screen_icon typcn typcn-arrow-move-outline"></i></a>
            </li>
            <li class="nav-item dropdown user-menu">
                <a class="nav-link dropdown-toggle material-ripple" href="" data-toggle="dropdown">
                    <i class="typcn typcn-user-add-outline"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-header d-sm-none">
                        <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="user-header">
                        <?php $image = $this->session->userdata('image'); 
                                        $fullname = $this->session->userdata('fullname'); 
                                        ?>
                        <div class="img-user">
                            <img src="<?php echo html_escape(base_url((!empty($image)?$image:'assets/img/user-icon.png'))) ?>"
                                alt="">
                        </div><!-- img-user -->
                        <h6><?php echo html_escape($fullname) ?></h6>
                    </div><!-- user-header -->
                    <a href="<?php echo base_url('profile') ?>" class="dropdown-item"><i
                            class="typcn typcn-user-outline"></i> <?php echo display('profile') ?></a>
                    <a href="<?php echo base_url('profile-setting') ?>" class="dropdown-item"><i
                            class="typcn typcn-cog-outline"></i> <?php echo display('edit_profile') ?></a>
                    <a href="<?php echo base_url('logout') ?>" class="dropdown-item"><i
                            class="typcn typcn-key-outline"></i> <?php echo display('logout') ?></a>
                </div>
                <!--/.dropdown-menu -->
            </li>
        </ul>
        <!--/.navbar nav-->
        <div class="nav-clock">
            <div class="time">
                <span class="time-hours"></span>
                <span class="time-min"></span>
                <span class="time-sec"></span>
            </div>
        </div><!-- nav-clock -->
    </div>
</nav>