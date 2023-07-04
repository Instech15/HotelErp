<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
      </div>
      <div class="card-body">
        <?php echo form_open('hrm/Home/update_atn_form/'. $data->att_id) ?>
        <input name="att_id" type="hidden" value="<?php echo html_escape($data->att_id) ?>">
        <div class="form-group row">
          <label for="emp_id" class="col-sm-3 col-form-label"><?php echo display('employee_name') ?> <span class="text-danger">*</span></label>
          <div class="col-sm-9">
            <?php echo form_dropdown('employee_id',$dropdownatn,(!empty($data->employee_id)?$data->employee_id:null),'class="form-control" id="employee_id"') ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <span class="text-danger">*</span></label>
          <div class="col-sm-9">
            <input name="date" class="form-control datepickers" type="text" value="<?php echo html_escape($data->date)?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="sign_in" class="col-sm-3 col-form-label"><?php echo display('sign_in') ?> </label>
          <div class="col-sm-9">
            <input name="sign_in" class=" form-control atttimepicker" type="text"  value="<?php echo html_escape($sign_in=$data->sign_in)?>"  id="sign_in">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="sign_out" class="col-sm-3 col-form-label"><?php echo display('sign_out') ?> </label>
          <div class="col-sm-9">
            <input type="text" name="sign_out" class="form-control atttimepicker"   id="" value="<?php echo html_escape($sign_out=$data->sign_out) ;?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="staytime" class="col-sm-3 col-form-label"><?php echo display('staytime') ?> </label>
          <div class="col-sm-9">
            <input type="text" name="staytime" class="form-control"   id="staytime" value="<?php
            $in=new DateTime($sign_in);
            $Out=new DateTime($sign_out);
            $interval=$in->diff($Out);
            $myinit=$interval->format('%H:%I:%S');
            echo $myinit;
            ?>">
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