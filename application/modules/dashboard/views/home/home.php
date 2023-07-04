 <div class="row">
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('today')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('today_booking') ?></p>
                 <h3 class="card-title fs-18 font-weight-bold"><?php echo html_escape($todaybooking);?>
                 </h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('attach_money_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('amount') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape((!empty($totalamount)?$totalamount:0));?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card card-stats statistic-box mb-4">
             <div
                 class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('account_circle_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('total_customer') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape($totalcustomer);?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
         <div class="card card-stats statistic-box mb-4">
             <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                 <div class="card-icon d-flex align-items-center justify-content-center">
                     <i class="material-icons"><?php echo display('date_range_icon')?></i>
                 </div>
                 <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">
                     <?php echo display('total_booking') ?></p>
                 <h3 class="card-title fs-21 font-weight-bold"><?php echo html_escape($totalorder);?></h3>
             </div>
             <div class="card-footer p-3">
                 <div class="stats">
                 </div>
             </div>
         </div>
     </div>
     <div class="col-lg-12 col-xl-12">
         <!--Basic apexMixedChart Chart-->
         <div class="card mb-4">
             <div class="col-lg-10 col-xl-10 offset-md-1">
             </div>
             <div class="card-body">
                 <div id="apexMixedChart"></div>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-sm-6 col-md-6 col-cxl-4 ">
         <!--Simple Donut Chart-->
         <div class="card height_400 mb-4">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('total_booking_history')?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div id="apexPieCharts"></div>
             </div>
         </div>
     </div>

     <div class="col-sm-6 col-md-6 col-cxl-4">
         <!--Basic Line Chart-->
         <div class="card md-6 mb-4 height_400">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('total_reservation')?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div id="apexLineChart"></div>
             </div>
         </div>
     </div>


     <div class="col-sm-6 col-md-6 col-cxl-4">
         <div class="card mb-4 height_400">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('amount_vs_booking') ?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div id="apexMixedChart"></div>
                 <canvas id="barChart" height="220"></canvas>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-6 col-cxl-4">
         <div class="card mb-4">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('customer_list') ?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div class="message_inner1">
                     <div class="message_widgets height_320_position">
                         <?php if(!empty($customerlist)){
												  foreach($customerlist as $customer){
												?>
                         <div class="inbox-item">
                             <p class="margin_padding"><strong
                                     class="inbox-item-author"><?php echo display('candidate_name') ?> :
                                     <?php echo html_escape($customer->firstname." ".$customer->lastname);?></strong>
                             </p>
                             <p class="inbox-item-text"><?php echo display('phone') ?>:
                                 <?php echo html_escape($customer->cust_phone);?></p>
                             <p class="inbox-item-text"><?php echo display('email') ?>
                                 <?php echo html_escape($customer->email);?></p>
                             <p class="inbox-item-text">
                                 <?php echo display('add') ?><?php echo html_escape($customer->address);?></p>

                         </div>
                         <?php } } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-6 col-cxl-4">
         <div class="card mb-4">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('today_booking_list') ?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div class="message_inner2">
                     <div class="message_widgets2 height_320_position">
                         <?php if(!empty($todayorder)){
												  foreach($todayorder as $orderlist){
												?>
                         <div class="inbox-item">
                             <p class="margin_padding"><strong
                                     class="inbox-item-author"><?php echo display('candidate_name') ?> :
                                     <?php echo html_escape($orderlist->firstname." ".$orderlist->lastname);?></strong>
                             </p>
                             <p class="inbox-item-text"><?php echo display('phone') ?>:
                                 <?php echo html_escape($orderlist->cust_phone);?></p>
                             <p class="inbox-item-text"><?php echo display('booking_number') ?>: <a
                                     href="#">(<?php echo html_escape($orderlist->booking_number);?>)</a></p>
                             <p class="inbox-item-text"><?php echo display('checkin') ?>:
                                 <?php echo html_escape($orderlist->checkindate);?></p>
                             <p class="inbox-item-text"><?php echo display('checkout') ?>:
                                 <?php echo html_escape($orderlist->checkoutdate);?></p>

                         </div>
                         <?php } } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-md-6 col-cxl-4">
         <div class="card mb-4">
             <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center">
                     <div>
                         <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('next_day_booking') ?></h6>
                     </div>
                 </div>
             </div>
             <div class="card-body p-2">
                 <div class="message_inner2">
                     <div class="message_widgets3 height_320_position">
                         <?php if(!empty($nextayorder)){
												  foreach($nextayorder as $nextorderlist){
												?>
                         <div class="inbox-item">
                             <p class="margin_padding"><strong
                                     class="inbox-item-author"><?php echo display('candidate_name') ?> :
                                     <?php echo html_escape($nextorderlist->firstname." ".$nextorderlist->lastname);?></strong>
                             </p>
                             <p class="inbox-item-text"><?php echo display('phone') ?>:
                                 <?php echo html_escape($nextorderlist->cust_phone);?></p>
                             <p class="inbox-item-text"><?php echo display('booking_number') ?>: <a
                                     href="#">(<?php echo html_escape($nextorderlist->booking_number);?>)</a></p>
                             <p class="inbox-item-text"><?php echo display('checkin') ?>::
                                 <?php echo html_escape($nextorderlist->checkindate);?></p>
                             <p class="inbox-item-text"><?php echo display('checkout') ?>:
                                 <?php echo html_escape($nextorderlist->checkoutdate);?></p>

                         </div>
                         <?php } } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <input type="hidden" id="monthlytotalamount" value="<?php echo html_escape($monthlytotalamount);?>">
 <input type="hidden" id="monthlytotalorder" value="<?php echo html_escape($monthlytotalorder);?>">
 <input type="hidden" id="monthlytotalpending" value="<?php echo html_escape($monthlytotalpending);?>">
 <input type="hidden" id="monthlytotal" value="<?php echo html_escape($monthlytotal);?>">
 <input type="hidden" id="monthname" value='<?php echo html_escape($monthname);?>'>
 <input type="hidden" id="shortmonthname" value='<?php echo html_escape($shortmonthname);?>'>
 <input type="hidden" id="totalorder" value='<?php echo html_escape($totalorder);?>'>
 <input type="hidden" id="totalcheckin" value='<?php echo html_escape($totalcheckin);?>'>
 <input type="hidden" id="totalpending" value='<?php echo html_escape($totalpending);?>'>
 <input type="hidden" id="totalcancel" value='<?php echo html_escape($totalcancel);?>'>

 <script src="<?php echo MOD_URL.$module;?>/assets/js/Chart.min.js" type="text/javascript"></script>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/barchart.js"></script>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/apexcharts.min.js"></script>
 <script src="<?php echo MOD_URL.$module;?>/assets/js/apexcharts.active.js"></script>