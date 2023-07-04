<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open('room_setting/booking_type/b_type_create'); ?>
                    <?php echo form_hidden('btypeinfoid', (!empty($btyinfo->btypeinfoid)?$btyinfo->btypeinfoid:null)) ?>
                        <div class="form-group row">
                            <label for="booking_type" class="col-sm-4 col-form-label"><?php echo display('booking_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <select class="form-control basic-single" required name="booking_type" id="booking_type" >
                            <option value="" selected="selected"><?php echo display('please_select_one') ?></option>
                                <?php foreach ($booking_type_list2 as $ltype) {?>
                                <option value="<?php echo html_escape($ltype->booktypetitle)?>"
                                <?php if(!empty($btyinfo)){if($btyinfo->booking_type==$ltype->booktypetitle){echo "Selected";}} else{echo "Selected";} ?>><?php echo html_escape($ltype->booktypetitle);?>
                                </option>
                                <?php } ?>
                            </select>                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="booking_sourse" class="col-sm-4 col-form-label"><?php echo display('booking_sourse') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="booking_sourse" autocomplete="off" class="form-control" type="text" value="<?php echo html_escape((!empty($btyinfo->booking_sourse)?$btyinfo->booking_sourse:null)) ?>" placeholder="<?php echo display('booking_sourse') ?>" id="booking_sourse" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="commissionrate" class="col-sm-4 col-form-label"><?php echo display('commission_rate'); ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="commissionrate" autocomplete="off" class="form-control" type="text" value="<?php echo html_escape((!empty($btyinfo->commissionrate)?$btyinfo->commissionrate:null)) ?>" placeholder="<?php echo display('commission_rate'); ?>" id="booking_sourse" value="" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>