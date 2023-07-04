<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            
            <div class="card-body">
                <?php echo form_open('room_reservation/room-booking');?>
                <?php echo form_hidden('bookedid', (!empty($intinfo->bookedid)?$intinfo->bookedid:null)) ?>
                <div class="form-group row">
                    <label for="guest" class="col-sm-4 col-form-label"><?php echo display('guest') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('guest2',$customerlist,$customerlist=$intinfo->cutomerid, 'class="selectpicker form-control" data-live-search="true" id="guest2" disabled="disabled"') ?>
                        <input name="guest" type="hidden"  value="<?php echo html_escape($intinfo->cutomerid) ?>" id="guest" >
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label for="bookingnumber" class="col-sm-4 col-form-label"><?php echo display('bookingnumber') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="bookingnumber" type="hidden"  value="<?php echo html_escape($intinfo->booking_number) ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="room_name" class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('room_name2',$roomlist,$roomlist=$intinfo->roomid, 'class=" form-control" data-live-search="true" id="room_name2"disabled="disabled"') ?>
                        <input name="room_name" type="hidden"  value="<?php echo html_escape($intinfo->roomid) ?>" id="room_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_of_people" class="col-sm-4 col-form-label"><?php echo display('no_of_people') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="no_of_people" autocomplete="off" class="form-control" type="text"  readonly="readonly" placeholder="<?php echo display('no_of_people') ?>" value="<?php echo html_escape((!empty($intinfo->nuofpeople)?$intinfo->nuofpeople:null)) ?>" id="no_of_people" >
                    </div>
                </div>
                <?php if(!empty($intinfo->room_no)){ ?>
                <div class="form-group row">
                    <label for="select_room_no" class="col-sm-4 col-form-label"><?php echo display('select_room_no') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="room_no" autocomplete="off" class="form-control" type="text"  readonly="readonly" placeholder="<?php echo display('select_room_no') ?>" value="<?php echo html_escape((!empty($intinfo->room_no)?$intinfo->room_no:null)) ?>" id="select_room_no" >
                    </div>
                </div>
                <?php }else{ ?>
                <?php if($isfound==2){ ?>
                <span text-center><?php echo display('no_room_found'); ?></span>
                <?php }else{ ?>
                <div class="form-group row">
                    <label for="no_of_people" class="col-sm-4 col-form-label"><?php echo display('select_room_no') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select name="slroomno[]" multiple="multiple" class="selectpicker form-control" data-live-search="true" id="slroomno">
                            <option value="" disabled><?php echo display('select_room_no') ?></option>
                            <?php $allroomno=explode(',',$freeroom);
                            foreach($allroomno as $sroom){?>
                            <option value="<?php echo html_escape($sroom);?>"><?php echo html_escape($sroom);?> </option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="check_in" class="col-sm-4 col-form-label"><?php echo display('check_in') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="check_in" autocomplete="off" class="form-control" type="text" readonly="readonly" placeholder="<?php echo display('check_in') ?>" value="<?php echo html_escape((!empty($intinfo->checkindate)?$intinfo->checkindate:null)) ?>" id="check_in" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="check_out" class="col-sm-4 col-form-label"><?php echo display('check_out') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="check_out" autocomplete="off" class="form-control" readonly="readonly" type="text" placeholder="<?php echo display('check_out') ?>" value="<?php echo html_escape((!empty($intinfo->checkoutdate)?$intinfo->checkoutdate:null)) ?>" id="check_in" >
                    </div>
                </div>
                <?php if(!empty($intinfo->bookingstatus!='1')){ ?>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?> </label>
                    <div class="col-sm-8">
                        <select name="status" class="selectpicker form-control" data-live-search="true" id="status">
                            <option value=""><?php echo display('select') ?> <?php echo display('status') ?></option>
                            <option value="0" <?php if($intinfo->bookingstatus=='0'){ echo "selected";}?>><?php echo display('pending') ?></option>
                            <option value="1" <?php if($intinfo->bookingstatus=='1'){ echo "selected";}?>><?php echo display('cancel') ?></option>
                            <option value="2" <?php if($intinfo->bookingstatus=='2'){ echo "selected";}?>><?php echo display('complete') ?></option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/reservationEdit.js"></script>