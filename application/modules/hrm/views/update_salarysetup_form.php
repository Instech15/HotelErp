       <div class="row">
           <div class="col-sm-12 col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                   </div>
                   <div class="card-body">
                       <?php echo form_open('hrm/salary-type-update/'. (!empty($data->salary_type_id)?$data->salary_type_id:null)) ?>

                       <input name="salary_type_id" type="hidden"
                           value="<?php echo html_escape((!empty($data->salary_type_id)?$data->salary_type_id:null)) ?>">
                       <div class="form-group row">
                           <label for="emp_sal_name"
                               class="col-sm-3 col-form-label"><?php echo display('emp_sal_name') ?> <span
                                   class="text-danger">*</span></label>
                           <div class="col-sm-6">
                               <input name="sal_name" class="form-control" type="text" id="emp_sal_name"
                                   value="<?php echo html_escape((!empty($data->sal_name)?$data->sal_name:null))?>">
                           </div>
                       </div>
                       <div class="form-group row">
                           <label for="emp_sal_type"
                               class="col-sm-3 col-form-label"><?php echo display('emp_sal_type') ?> </label>
                           <div class="col-sm-6">
                               <select name="emp_sal_type" class="form-control"
                                   placeholder="<?php echo display('salary_benefits_type') ?>" id="emp_sal_type">
                                   <option value="1"<?php echo ($data->emp_sal_type==1)?'selected':null; ?>>Add</option>
                                   <option value="0"<?php echo ($data->emp_sal_type==0)?'selected':null; ?>>Deduct</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-group row text-right">
                           <label for="emp_sal_type" class="col-sm-3 col-form-label"></label>
                           <div class="col-sm-6">
                               <button type="submit"
                                   class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>

                           </div>
                       </div>
                       <?php echo form_close() ?>
                   </div>
               </div>
           </div>
       </div>