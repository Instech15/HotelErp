<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <h4><?php echo display('payment_form') ?></h4>
        </div>
        <div class="card-body">
          <?php echo form_open('room_reservation/room_reservation/addpayment/'.$bookinginfo->bookedid,array('id'=>'updatepayment'));?>
          <input type="hidden" id="bookedid" name="bookedid"
          value="<?php echo html_escape((!empty($bookinginfo->bookedid)?$bookinginfo->bookedid:null));?>" />
          <input type="hidden" name="payid" id="payid"
          value="<?php echo html_escape((!empty($intinfo->payid)?$intinfo->payid:null));?>" />
          <div class="form-group row">
            <label for="booking_number"
              class="col-sm-5 pr-0 col-form-label"><?php echo display('booking_number') ?> <span
              class="text-danger">*</span></label>
              <div class="col-sm-7">
                <input name="booking_number" autocomplete="off" class="form-control" type="text"
                value="<?php echo html_escape($bookinginfo->booking_number);?>" id="booking_number"
                placeholder="<?php echo display('booking_number') ?>" readonly="readonly">
              </div>
            </div>
            <div class="form-group row">
              <label for="invoice_no"
                class="col-sm-5 pr-0 col-form-label"><?php echo display('invoice_no') ?> <span
                class="text-danger">*</span></label>
                <div class="col-sm-7">
                  <input name="invoice_no" autocomplete="off" class="form-control" type="text"
                  value="<?php echo html_escape($invoice);?>" id="invoice_no"
                  placeholder="<?php echo display('invoice_no') ?>" readonly="readonly">
                </div>
              </div>
              <div class="form-group row">
                <label for="pay_date" class="col-sm-5 pr-0 col-form-label"><?php echo display('pay_date') ?>
                  <span class="text-danger">*</span></label>
                  <div class="col-sm-7">
                    <input name="pay_date" autocomplete="off" class="datepickers form-control"
                    value="<?php echo date('Y-m-d');?>" type="text"
                    placeholder="<?php echo display('pay_date') ?>" id="pay_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="payment_method"
                    class="col-sm-5 pr-0 col-form-label"><?php echo display('payment_method') ?> <span
                    class="text-danger">*</span></label>
                    <div class="col-sm-7">
                      <?php echo form_dropdown('payment_method',$paymentmethod,$paymentmethod=4, 'class="selectpicker form-control" data-live-search="true" id="payment_method"') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="total_amount"
                      class="col-sm-5 pr-0 col-form-label"><?php echo display('total_amount') ?> <span
                      class="text-danger">*</span></label>
                      <div class="col-sm-7">
                        <input name="total_amount" autocomplete="off" class="form-control" type="number"
                        value="<?php echo html_escape($bookinginfo->total_price - $bookinginfo->paid_amount); ?>"
                        readonly>
                      </div>
                    </div>
                    <?php if (($bookinginfo->total_price - $bookinginfo->paid_amount)!=0){ ?>
                    <div class="form-group row">
                      <label for="amount" class="col-sm-5 pr-0 col-form-label"><?php echo display('amnt') ?>
                        <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                          <input name="amount" id="amount" autocomplete="off" class="form-control" type="number"
                          value="" placeholder="<?php echo display('amount') ?>" required>
                        </div>
                      </div>
                      <?php }else{ ?>
                      <div class="form-group row">
                        <label for="amount" class="col-sm-5 pr-0 col-form-label"><?php echo display('amnt') ?>
                          <span class="text-danger">*</span></label>
                          <div class="col-sm-7">
                            <input name="amount" id="amount" autocomplete="off" class="form-control" type="number"
                            value="" placeholder="<?php echo display('paid') ?>" disabled>
                          </div>
                        </div>
                        <?php } ?>
                        <div class="form-group text-right">
                          <button type="submit" id="btnchnage"
                          class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                        </div>
                        <?php echo form_close() ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="card">
                      <div class="card-header">
                        <h4><?php echo display('payment_list') ?></h4>
                      </div>
                      <div class="card-body table-responsive">
                        <table width="100%" class="datatable table table-striped table-bordered table-hover"
                          id="bookingdetails">
                          <thead>
                            <tr>
                              <th><?php echo display('invoice')?></th>
                              <th><?php echo display('booking_number')?></th>
                              <th><?php echo display('pay_date')?></th>
                              <th><?php echo display('payment_method')?></th>
                              <th><?php echo display('amount')?></th>
                              <th><?php echo display('action')?></th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <input type="hidden" id="booking_id" value="<?php echo $bookinginfo->bookedid; ?>">
              <script src="<?php echo MOD_URL.$module;?>/assets/js/payments.js"></script>