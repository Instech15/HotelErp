<div class="card">
    <?php if($this->permission->method('room_reservation','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('room_booking')?> <small class="float-right"> <a
                    href="<?php echo base_url("room_reservation/room_reservation") ?>" class="btn btn-primary btn-md"><i
                        class="ti-plus" aria-hidden="true"></i> <?php echo display('booking_list')?></a></small></h4>
    </div>
    <?php endif; ?>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-body">

                <?php echo form_open('room_reservation/room-booking');?>
                <?php echo form_hidden('bookedid', (!empty($intinfo->bookedid)?$bookedid->roomid:null)) ?>

                <div class="form-group row">
                    <label for="room_name" class="col-sm-2 col-form-label"><?php echo display('guest') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('guest',$customerlist,'', 'class="selectpicker form-control" data-live-search="true" id="guest"') ?>
                    </div>
                    <label for="room_name" class="col-sm-2 col-form-label"><?php echo display('room_name') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('room_name',$roomlist,'', 'class="selectpicker form-control" data-live-search="true" id="room_name"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="booking_type" class="col-sm-2 col-form-label"><?php echo display('booking_type') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('booking_type','booking type','', 'class="selectpicker form-control" data-live-search="true" id="booking_type"') ?>
                    </div>
                    <label for="booking_source" class="col-sm-2 col-form-label"><?php echo display('booking_source') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('booking_source','Booking List','', 'class="selectpicker form-control" data-live-search="true" id="booking_source"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="room_name" class="col-sm-2 col-form-label" hidden><?php echo display('no_of_people') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-4" hidden>
                        <input name="no_of_people" autocomplete="off" class="form-control" type="text" value="1"
                            placeholder="<?php echo display('no_of_people') ?>" id="no_of_people">
                    </div>
                    <label for="check_in" class="col-sm-2 col-form-label"><?php echo display('check_in') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="check_in" autocomplete="off" class="datepickerwithoutprevdate form-control"
                            type="text" placeholder="<?php echo display('check_in') ?>" id="check_in"
                            onkeyup="enddate()">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="check_out" class="col-sm-2 col-form-label"><?php echo display('check_out') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="check_out" autocomplete="off" class="datepickerwithoutprevdates form-control"
                            type="text" placeholder="<?php echo display('check_out') ?>" id="check_out">
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-success w-md m-b-5"
                            onclick="getfreerooms()"><?php echo display('search') ?></button>
                    </div>
                </div>
                <div id="bookinginfo">

                </div>
                <?php echo form_close() ?>
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/addBooking.js"></script>