<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">

            <div class="card-body">
                <?php echo form_open('room_setting/room_details/create');?>
                <?php echo form_hidden('roomid', (!empty($intinfo->roomid)?$intinfo->roomid:null)) ?>

                <div class="form-group row">
                    <label for="roomtype" class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="roomtype" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display('room_name') ?>" id="roomtype"
                            value="<?php echo html_escape((!empty($intinfo->roomtype)?$intinfo->roomtype:null)) ?>"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="capacity" class="col-sm-4 col-form-label"><?php echo display('capacity') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="capacity" autocomplete="off" class="form-control" type="number"
                            placeholder="<?php echo display('capacity') ?>" id="capacity"
                            value="<?php echo html_escape((!empty($intinfo->capacity)?$intinfo->capacity:null)) ?>"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="capacity" class="col-sm-4 col-form-label"><?php echo display("extra_capability") ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">

                            <select name="exbedcapability" class="selectpicker form-control" data-live-search="true" id="capabiliity">
                            
                            
                            <option value="1" <?php if($intinfo->exbedcapability == 1){ echo "selected"; }?>><?php echo display('yes');?></option>
                            <option value="0" <?php if($intinfo->exbedcapability == 0){ echo "selected"; }?>><?php echo display('no');?></option>
                            
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="defaultrate" class="col-sm-4 col-form-label"><?php echo display('defaultrate') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="defaultrate" autocomplete="off" class="form-control" type="text"
                            placeholder="<?php echo display('defaultrate') ?>" id="defaultrate"
                            value="<?php echo html_escape((!empty($intinfo->rate)?$intinfo->rate:null)) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bedcharge" class="col-sm-4 col-form-label"><?php echo display("bed_charge") ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="bedcharge" autocomplete="off" class="form-control" type="number"
                            placeholder="<?php echo display('bed_charge') ?>" id="bedcharge" value="<?php echo html_escape((!empty($intinfo->bedcharge)?$intinfo->bedcharge:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="personcharge" class="col-sm-4 col-form-label"><?php echo display('person_charge') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="personcharge" autocomplete="off" class="form-control" type="number"
                            placeholder="<?php echo display('person_charge') ?>" id="personcharge" value="<?php echo html_escape((!empty($intinfo->personcharge)?$intinfo->personcharge:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="roomsize" class="col-sm-4 col-form-label"><?php echo display('roomsize') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input name="roomsize" autocomplete="off" class="form-control" type="number"
                            placeholder="<?php echo display('roomsize') ?>" id="roomsize"
                            value="<?php echo html_escape((!empty($intinfo->roomsize)?$intinfo->roomsize:null)) ?>"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('size_unit',$allsizes,$allsizes=$intinfo->roomsizemesurement, 'class="selectpicker form-control" data-live-search="true" id="size_unit"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bedsno" class="col-sm-4 col-form-label"><?php echo display('bedsno') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <select name="bedsno" class="selectpicker form-control" data-live-search="true" id="bedsno">
                            <option value="" selected="selected"><?php echo display('select_bed_no') ?></option>
                            <?php for($i=1;$i<=10;$i++){?>
                            <option value="<?php echo $i;?>" <?php if($i==$intinfo->bedsno){ echo "selected";}?>>
                                <?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('bedstype',$allbeds,$allbeds=$intinfo->bedstype, 'class="selectpicker form-control" data-live-search="true" id="bedstype"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number_of_star" class="col-sm-4 col-form-label"><?php echo display('review') ?> </label>
                    <div class="col-sm-8">
                        <input name="number_of_star" class="form-control" type="number" id="nos" onkeyup="starcheck()"
                            value="<?php echo html_escape((!empty($intinfo->number_of_star)?$intinfo->number_of_star:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="roomdescription"
                        class="col-sm-4 col-form-label"><?php echo display('roomdescription') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea name="roomdescription" cols="35" rows="4"
                            placeholder="<?php echo display('roomdescription') ?>"><?php echo html_escape((!empty($intinfo->roomdescription)?$intinfo->roomdescription:null)) ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reservecondition"
                        class="col-sm-4 col-form-label"><?php echo display('reserve_condition') ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea name="reservecondition" cols="35" rows="3"
                            placeholder="<?php echo display('reserve_condition') ?>"><?php echo html_escape((!empty($intinfo->reservecondition)?$intinfo->reservecondition:null)) ?></textarea>
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/star.js"></script>