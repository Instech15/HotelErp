<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            
            <div class="panel-body">
                <?php echo form_open('room_setting/floor-plan-create'); ?>
                <?php echo form_hidden('floorplanid', (!empty($intinfo->floorName)?$intinfo->floorName:null)) ?>
                <div class="form-group row">
                    <label for="floor_name" class="col-sm-4 col-form-label"><?php echo display('floor_name') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8 customesl pl-0">
                        <?php echo form_dropdown('floor_name',$allfloor,$allfloor=$intinfo->floorName, 'class="selectpicker form-control" data-live-search="true" id="floor_nameedit" required') ?>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="num_of_room" class="col-sm-4 col-form-label"><?php echo display('start_roomno') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8 pl-0">
                        <input name="startno" autocomplete="off" class="form-control" min="1" type="number" placeholder="<?php echo display('start_roomno') ?>" id="startnoedit" value="<?php echo html_escape((!empty($intinfo->startno)?$intinfo->startno:null)) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="num_of_room" class="col-sm-4 col-form-label"><?php echo display('num_of_room') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8 pl-0">
                        <input name="num_of_room" autocomplete="off" class="form-control" min="1" type="number" placeholder="<?php echo display('num_of_room') ?>" id="num_of_roomedit" value="<?php echo html_escape((!empty($intinfo->noofroom)?$intinfo->noofroom:null)) ?>">
                    </div>
                </div>
                
                <div class="form-group row" id="roomnoedit">
                    <label for="room_no" class="col-sm-4 col-form-label"><?php echo display('room_no') ?> <span class="text-danger">*</span></label>
                    <div class="col-sm-8 row allrom">
                        <?php
                        $room_no = $intinfo->startno; 
                         for($i=1;$i<=$intinfo->noofroom;$i++){
                                                        if($i<10){
                                                            $i="0".$i;
                                                            }
                                                        else{
                                                            $i=$i;
                                                            }
                        ?>
                        <div class="col-sm-4 pl-0"><input name="room_no[]" autocomplete="off" class="form-control padding_m_bottom" type="text" id="room_no" value="<?php echo html_escape($room_no++);?>"></div>
                        <?php } ?>
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