    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-heading">
                </div>
                <div class="card-body">

                <?php echo form_open_multipart('hrm/manage-selection/'. (!empty($data->can_sel_id)?$data->can_sel_id:null)) ?>              

                    <input name="can_sel_id" type="hidden" value="<?php echo html_escape((!empty($data->can_sel_id)?$data->can_sel_id:null)) ?>">
                 
                        <div class="form-group row">
                            <label for="can_id" class="col-sm-3 col-form-label"><?php echo display('candidate_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                 <?php echo form_dropdown('can_id', $dropdownselection,(!empty($data->can_id)?$data->can_id:null), ' class="form-control" onchange="SelectToLoad(this.value)" id="c_id"') ?>
                                 <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="<?php echo html_escape((!empty($data->employee_id)?$data->employee_id:null))?>">
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="pos_id" class="col-sm-3 col-form-label"><?php echo display('pos_id') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                 <input type="text" name="pos_name" class="form-control" id="pos_name" value="<?php echo html_escape((!empty($data->position_name)?$data->position_name:null))?>">
                                <input type="hidden" name="pos_id" class="form-control" id="pos_id" value="<?php echo html_escape((!empty($data->pos_id)?$data->pos_id:null))?>">
                            </div>
                        </div> 
                       <div class="form-group row">
                            <label for="selection_terms" class="col-sm-3 col-form-label"><?php echo display('selection_terms') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="selection_terms" class="form-control" id="selection_terms" value="<?php echo html_escape((!empty($data->selection_terms)?$data->selection_terms:null))?>">
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/selectionForm.js"></script>