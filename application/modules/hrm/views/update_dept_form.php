 <div class="row">
     <div class="col-sm-12 col-md-12">
         <div class="card">
             <div class="card-header">
                 <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
             </div>
             <div class="card-body">

                 <?php echo form_open('hrm/department-update/'. $data->dept_id) ?>


                 <input name="dept_id" type="hidden" value="<?php echo html_escape($data->dept_id) ?>">
                 <div class="form-group row">

                     <label for="department_name" class="col-sm-3 col-form-label">
                         <?php echo display('department_name') ?><span class="text-danger">*</span></label>
                     <div class="col-sm-6">
                         <input type="text" name="department_name" class=" form-control"
                             value="<?php echo html_escape($data->department_name) ?>">

                     </div>

                 </div>
                 <div class="form-group row text-right">

                     <label for="department_name" class="col-sm-3 col-form-label">
                         </label>
                     <div class="col-sm-6">
                     <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>


                     </div>

                 </div>

                 <?php echo form_close() ?>


             </div>
         </div>
     </div>
 </div>