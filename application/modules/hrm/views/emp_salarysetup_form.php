  
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
            <div class="card-header">
                        <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                    </div>
                <div class="card-body">

                <?php echo form_open('hrm/Employees/create_salary_setup') ?>
                        <div class="form-group row">
                            <label for="emp_sal_name" class="col-sm-3 col-form-label"><?php echo display('emp_sal_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="emp_sal_name" class="form-control" type="text" placeholder="<?php echo display('emp_sal_name') ?>" id="emp_sal_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emp_sal_type" class="col-sm-3 col-form-label"><?php echo display('emp_sal_type') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="emp_sal_type" class="form-control"  placeholder="<?php echo display('emp_sal_type') ?>" id="emp_sal_type" >
                           <option value="Add"><?php echo display('ad') ?></option>
                           <option value="Deduct"><?php echo display('deduct') ?></option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>
     