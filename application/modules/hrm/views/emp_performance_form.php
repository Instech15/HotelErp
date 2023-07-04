<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('emp_performance') ?><small class="float-right"><button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_performance') ?></button>
                        <a href="<?php echo base_url(); ?>hrm/manage-employee-perfomance" class="btn btn-primary mb-2"><?php echo display('manage_performance') ?></a></small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('Sl') ?></th>
                                <th><?php echo display('manage_performance') ?></th>
                                <th><?php echo display('employee_id') ?></th>
                                <th><?php echo display('note') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('note_by') ?></th>
                                <th><?php echo display('number_of_star') ?></th>
                                <th><?php echo display('status') ?></th>
                                <th><?php echo display('updated_by') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($emp_perform)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($emp_perform as $que) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                        <td><?php echo html_escape($que->employee_id); ?></td>
                                        <td><?php echo html_escape($que->note); ?></td>
                                        <td><?php echo html_escape($que->date); ?></td>
                                        <td><?php echo html_escape($que->note_by); ?></td>
                                        <td><?php
                                            for ($i = 1; $i <= $que->number_of_star; $i++) {
                                                echo "<span class='ti-star c_color'></span>";
                                            }

                                            ?>

                                        </td>
                                        <td><?php echo html_escape($que->status); ?></td>
                                        <td><?php echo html_escape($que->updated_by); ?></td>

                                    </tr>
                                    <?php $sl++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table> <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('add_employee_performance') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <?php echo form_open_multipart('hrm/employee-perfomance') ?>

                                <div class="form-group row">
                                    <label for="employee_id" class="col-sm-4 col-form-label"><?php echo display('employee_name') ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown('employee_id', $employee, null, 'class="form-control" id="employee_id"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo "Joining Date" ?> </label>
                                    <div class="col-sm-8">
                                        <input name="date" class="datepickers form-control" type="text" placeholder="<?php echo display('date') ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="note" class="col-sm-4 col-form-label"><?php echo display('note') ?> </label>
                                    <div class="col-sm-8">
                                        <textarea name="note" class="form-control" placeholder="<?php echo display('note') ?>" id="note"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="number_of_star" class="col-sm-4 col-form-label"><?php echo display('number_of_star') ?> </label>
                                    <div class="col-sm-8">
                                        <input name="number_of_star" class="form-control" type="text" placeholder="<?php echo display('number_of_star') ?>" id="number_of_star" onkeyup="starcheck()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="status" class="form-control" placeholder="<?php echo display('status') ?>" id="status">
                                    </div>
                                </div>
                                <div class="form-group row">

                                </div>

                                <div class="form-group text-right">
                                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit" class="btn btn-success w-md m-b-5" id="sbmt" data-toggle="modal" data-target="#myModal"><?php echo display('ad') ?></button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL . $module; ?>/assets/js/empPerformanceForm.js"></script>