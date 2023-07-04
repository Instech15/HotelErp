<div class="card">
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-header">
                <h4><?php echo display('assign_roomoffer')?> </h4>
                <small><?php echo "Room offer will be displayed to user from current date to next 12 month" ?> </small>
            </div>
            <div class="card-body">
                <?php echo  form_open('room_setting/room_details/roomofferinsert') ?>
                <div class="form-group row">
                    <label for="room_name" class="col-sm-2 col-form-label"><?php echo display('room_name') ?> <span
                    class="text-danger">*</span></label>
                    <div class="col-sm-3 customesl pl-0">
                        <?php echo form_dropdown('room_name',$allroom,'', 'class="selectpicker form-control" data-live-search="true" id="room_name" required') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="offermonth" class="col-sm-2 col-form-label"><?php echo display('offer_year_month') ?>
                        <span class="text-danger">*</span></label>
                        <div class="col-sm-3 customesl pl-0">
                            <?php echo form_dropdown('offermonth',$allmonthyear,'', 'class="selectpicker form-control" onchange="getmonthyear()" data-live-search="true" id="offermonth" required') ?>
                        </div>
                    </div>
                    <div class="col-sm-12" id="floorandroom">
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/roomOfferAssign.js"></script>