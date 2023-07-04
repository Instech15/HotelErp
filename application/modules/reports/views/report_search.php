<link type="text/css" href="<?php echo MOD_URL.$module;?>/assets/css/table.css">
<link type="text/css" href="<?php echo MOD_URL.$module;?>/assets/css/report_search.css">
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h4><?php echo display('search_report'); ?></h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <?php echo form_open('report/index',array('class' => 'form-inline'))?>
                        <div class="form-group">
                            <label class="padding_right_5px col-form-label"
                                for="name"><?php echo display('customer') ?>
                            </label>
                            <?php echo form_dropdown('customer',$customerlist,'', 'class="selectpicker w-138 col-form-control" data-live-search="true" id="customer"') ?>
                        </div>
                        <div class="form-group">
                            <label class="padding_right_5px col-form-label"
                                for="from_date"><?php echo display('booking_status') ?>
                            </label>
                            <select name="status" class="selectpicker form-control w-138 col-form-label"
                                data-live-search="true" id="status" required="">
                                <option value="" selected="selected"><?php echo display('select_staus') ?>
                                </option>
                                <option value="0"><?php echo display('pending') ?></option>
                                <option value="4"><?php echo display('checkin') ?></option>
                                <option value="5"><?php echo display('checkout') ?></option>
                                <option value="1"><?php echo display('cancel') ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="padding_right_5px col-form-label"
                                for="payment_status"><?php echo display('payment_status') ?>
                            </label>
                            <select name="payment_status" class="selectpicker form-control w-138 col-form-label"
                                data-live-search="true" id="payment_status" required="">
                                <option value="" selected="selected"><?php echo display('select_staus') ?>
                                </option>
                                <option value="3"><?php echo display('pending') ?></option>
                                <option value="1"><?php echo display('complete') ?></option>
                                <option value="2"><?php echo display('credit') ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="padding_right_5px col-form-label"
                                for="from_date"><?php echo display('start_date') ?>
                            </label>
                            <input type="text" name="start_date" value="" class="form-control datepickers"
                                id="start_date" placeholder="<?php echo display('start_date') ?>">
                        </div>

                        <div class="form-group">
                            <label class="padding_0_5px col-form-label" for="to_date"> <?php echo display('end_date') ?>
                            </label>
                            <input type="text" name="to_date" value="" class="form-control datepickers" id="to_date"
                                placeholder="<?php echo display('end_date') ?>">
                        </div>
                        <input name="invoiceurl" type="hidden"
                            value="<?php echo base_url("reports/report/getinvoice") ?>" id="invoiceurl" />
                        &nbsp;<a class="btn btn-success" onclick="showinvoice()"><span class="text-white">
                                <?php echo display('search') ?></span></a>&nbsp;
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4 d_none p-2" id="report_show">
            <div class="row" id="printArea">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-header">
                                <h4>
                                    <?php echo display('booking_report') ?>
                                    <small class="float-right">
                                        <input type="button" class="btn btn-info button-print text-white"
                                            name="btnPrint" id="btnPrint" value="Print"
                                            onclick="printContent('printArea')" />
                                    </small>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div id="itemlist" class="text-center">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4" id="hide_report">
            <div class="card-header">
                <h4><?php echo display('all_report') ?></h4>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(!empty($bookings)){?>
                            <div class="card-body">
                                <?php } else{ ?>
                                <div class="card-body text-center">
                                    <?php } ?>
                                    <?php if(!empty($bookings)){?>

                                    <table width="100%" id="rexdatatable"
                                        class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo display('sl_no') ?></th>
                                                <th><?php echo display('booking_number') ?></th>
                                                <th><?php echo display('room_name') ?></th>
                                                <th><?php echo display('check_in') ?></th>
                                                <th><?php echo display('check_out') ?></th>
                                                <th><?php echo display('booking_date') ?></th>
                                                <th><?php echo display('booking_status') ?></th>
                                                <th><?php echo display('payment_status') ?></th>
                                                <th><?php echo display('total_amount') ?></th>
                                                <th><?php echo display('paid_amount') ?></th>
                                                <th><?php echo display('due_amount') ?></th>
                                                <th><?php echo display('action') ?></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="8" style="text-align:right"><?php echo display('total') ?>:
                                                </th>
                                                <th></th>
                                                <th colspan="1" style="text-align:right"><?php echo display('due_amount'); ?>:
                                                </th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $i=0;
                                            foreach($bookings as $book){
                                                $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo html_escape($book->booking_number);?></td>
                                                <td><?php echo html_escape($book->roomtype);?></td>
                                                <td><?php echo html_escape($book->checkindate);?></td>
                                                <td><?php echo html_escape($book->checkoutdate);?></td>
                                                <td><?php echo html_escape($book->date_time);?></td>
                                                <td><?php if($book->bookingstatus==5){ echo display("checkout");} else if($book->bookingstatus==0){ echo display('pending');} else if($book->bookingstatus==1){ echo display("cancel");} else if($book->bookingstatus==4){ echo display("checkin");}?>
                                                </td>
                                                <td><?php if($book->bookingstatus==5){if($book->creditamt>0){echo display("credit");} else{ echo display('complete');}}else{if($book->total_price<=$book->paid_amount){echo display("complete");}else{echo display('pending');}}?>
                                                </td>
                                                <td><?php echo html_escape($book->total_price);?></td>
                                                <td><?php echo html_escape($book->paid_amount);?></td>
                                                <td><?php echo ($book->total_price-$book->paid_amount)<0 ? 0 : html_escape($book->total_price-$book->paid_amount);?></td>
                                                <td><a href="<?php echo base_url("reports/booking-details/".html_escape($book->bookedid)) ?>"
                                                        class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Details"
                                                        title="Details"><i class="ti-eye"></i></a>&nbsp;<a
                                                        href="<?php echo base_url("reports/customer-reciept/".html_escape($book->bookedid)) ?>"
                                                        class="btn btn-success btn-sm" data-toggle="tooltip"
                                                        data-placement="top" data-original-title="Customer Invoice"
                                                        title="Customer Invoice"><i class="ti-receipt"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <?php } 
                                    else { ?>
                                    <span class="text-center">
                                        <svg class="mb-4" height="150pt" viewBox="0 0 496 496" width="150pt"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m232 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                            <path
                                                d="m232 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                            <path
                                                d="m360 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                            <path
                                                d="m360 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
                                            <path d="m160 208h176v16h-176zm0 0" />
                                            <path d="m352 208h16v16h-16zm0 0" />
                                            <path d="m160 240h176v16h-176zm0 0" />
                                            <path d="m352 240h16v16h-16zm0 0" />
                                            <path d="m160 272h176v16h-176zm0 0" />
                                            <path d="m352 272h16v16h-16zm0 0" />
                                            <path d="m128 208h16v16h-16zm0 0" />
                                            <path d="m128 240h16v16h-16zm0 0" />
                                            <path d="m128 272h16v16h-16zm0 0" />
                                            <path
                                                d="m400 96c-26.472656 0-48 21.527344-48 48h16c0-17.648438 14.351562-32 32-32s32 14.351562 32 32h16c0-26.472656-21.527344-48-48-48zm0 0" />
                                            <path
                                                d="m372 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
                                            <path
                                                d="m428 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
                                            <path
                                                d="m400 0c-52.9375 0-96 43.0625-96 96 0 11.230469 2.039062 21.976562 5.601562 32h-123.203124c3.5625-10.023438 5.601562-20.769531 5.601562-32 0-52.9375-43.0625-96-96-96s-96 43.0625-96 96 43.0625 96 96 96v296c0 4.425781 3.574219 8 8 8h288c4.425781 0 8-3.574219 8-8v-296c52.9375 0 96-43.0625 96-96s-43.0625-96-96-96zm-128 144v16h-48v-16zm-256-48c0-44.113281 35.886719-80 80-80s80 35.886719 80 80-35.886719 80-80 80-80-35.886719-80-80zm368 384h-272v-289.449219c28.625-4.832031 52.945312-22.328125 67.007812-46.550781h28.992188v24c0 4.414062 3.574219 8 8 8h64c4.425781 0 8-3.585938 8-8v-24h28.992188c14.0625 24.230469 38.382812 41.71875 67.007812 46.550781zm16-304c-44.113281 0-80-35.886719-80-80s35.886719-80 80-80 80 35.886719 80 80-35.886719 80-80 80zm0 0" />
                                            <path
                                                d="m88 112h16c3.566406 0 6.710938-2.367188 7.695312-5.800781l16-56c1.058594-3.703125-.671874-7.632813-4.121093-9.351563l-8.839844-4.421875c-11.574219-5.785156-25.886719-5.785156-37.46875 0l-8.839844 4.414063c-3.449219 1.726562-5.179687 5.65625-4.121093 9.359375l16 56c.984374 3.433593 4.128906 5.800781 7.695312 5.800781zm-3.574219-61.265625c7.160157-3.574219 16-3.574219 23.160157 0l2.902343 1.457031-12.519531 43.808594h-3.9375l-12.511719-43.816406zm0 0" />
                                            <path
                                                d="m112 144c0 8.835938-7.164062 16-16 16s-16-7.164062-16-16 7.164062-16 16-16 16 7.164062 16 16zm0 0" />
                                        </svg><br />
                                        <?php echo display('no_result_found'); }
          ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/searchReport.js"></script>