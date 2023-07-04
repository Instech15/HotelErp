<div class="form-group text-right">

    <?php 
$add0 =array(
    'type' => 'button',
    'class' => "btn btn-primary btn-md mb-2",
    'data-target' => "#add0",
    'data-toggle' => "modal",
    'value' => 'Date Wise Report',
    'style'=>'align="center";'
);
$add =array(
    'type' => 'button',
    'class' => "btn btn-primary btn-md mb-2",
    'data-target' => "#add",
    'data-toggle' => "modal",
    'value' => 'Employee Wise Report',
    'style'=>'align="center";'
);
$add3 =array(
    'type' => 'button',
    'class' => "btn btn-primary btn-md mb-2",
    'data-target' => "#add2",
    'data-toggle' => "modal",
    'value' => 'Date and Intime Report',
    'style'=>'align="center";'
);



?>
</div>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('report_view') ?><small class="float-right">
                        <?php  echo form_input($add0); 
echo form_input($add); 
echo form_input($add3); ?>
                    </small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable"
                        class="datatable table table-striped table-bordered table-hover example">
                        <thead>
                            <tr>
                                <th><?php echo display('Sl') ?></th>
                                <th><?php echo display('candidate_name') ?></th>
                                <th><?php echo display('id') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('sign_in') ?></th>
                                <th><?php echo display('sign_out') ?></th>
                                <th><?php echo display('stay') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($addressbook)){ ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($addressbook as $row): ?>
                            <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape($row['first_name'].' '.$row['last_name']); ?></td>
                                <td><?php echo html_escape($row['employee_id']); ?></td>
                                <td><?php echo html_escape($row['date']); ?></td>
                                <td><?php echo html_escape($row['sign_in']); ?></td>
                                <td><?php echo html_escape($row['sign_out']); ?></td>
                                <td><?php echo html_escape($row['staytime']); ?></td>

                            </tr>
                            <?php $sl++; ?>
                            <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('emp_wise_report') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('hrm/attend-report-list','name="myForm"') ?>

                                <div class="form-group row">
                                    <label for="employee_id"
                                        class="col-sm-3 col-form-label"><?php echo display('employee_id') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <!-- <input name="employee_id" class="form-control" type="text" placeholder="<?php echo display('employee_id_se') ?>" id="employee_id" required> -->
                                        <?php echo form_dropdown('employee_id',$employelist,null,'class="form-control basic-single width_100"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date"
                                        class="col-sm-3 col-form-label"><?php echo display('start_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="s_date" class="datepickers form-control" type="text"
                                            value="<?php echo date('Y-m-d'); ?>" placeholder="<?php
        
                                 echo display('start_date') ?>" id="a_date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date"
                                        class="col-sm-3 col-form-label"><?php echo display('end_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="e_date" value="<?php echo date('Y-m-d') ?>"
                                            class="datepickers form-control" type="text" placeholder="<?php  
                                 echo display('end_date') ?>" id="b_date" required>
                                    </div>
                                </div>


                                <div class="form-group text-right">
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('request') ?></button>
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



<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('attendance_report') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('hrm/attendance-report-list') ?>

                                <div class="form-group row">
                                    <label for="date"
                                        class="col-sm-3 col-form-label"><?php echo display('start_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="start_date" value="<?php echo date('Y-m-d') ?>"
                                            class="datepickers form-control" type="text" placeholder="<?php
        
                                 echo display('start_date') ?>" id="start_date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date"
                                        class="col-sm-3 col-form-label"><?php echo display('end_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="end_date" value="<?php echo date('Y-m-d') ?>"
                                            class="datepickers form-control" type="text" placeholder="<?php  
                                 echo display('end_date') ?>" id="end_date" required>
                                    </div>
                                </div>


                                <div class="form-group text-right">
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('request') ?></button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div id="add2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('attendance_report') ?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('hrm/date-time-report-list','name="myForm"') ?>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="date" value="<?php echo date('Y-m-d') ?>"
                                            class="datepickers form-control " type="text" placeholder="<?php
        
                                 echo display('date') ?>" id="c_date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_time" class="col-sm-3 col-form-label"><?php echo display('s_time') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="s_time" class="srctimepicker form-control" type="text" placeholder="<?php
        
                                 echo display('s_time') ?>" id="s_time" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="e_time" class="col-sm-3 col-form-label"><?php echo display('e_time') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="e_time" class="srctimepicker form-control" type="text" placeholder="<?php  
                                 echo display('e_time') ?>" id="e_time" required>
                                    </div>
                                </div>


                                <div class="form-group text-right">
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('request') ?></button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/attendanceList.js"></script>