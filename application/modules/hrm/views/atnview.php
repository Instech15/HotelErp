<div class="form-group text-right">

</div>


<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?php echo display('checkin') ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo form_open('hrm/Home/create_atten') ?>
                                <div class="form-group row">
                                    <label for="employee_id" class="col-sm-4 col-form-label"><?php echo display('emp_id') ?> <span class="text-danger">*</span></label>
                                    <div class="col-sm-8 mb-2">
                                        <?php if ($this->session->userdata('isAdmin') == 1 || $this->session->userdata('supervisor') == 1) { ?>
                                            <?php echo form_dropdown('employee_id', $dropdownatn, null, 'class="form-control basic-single "  id="employee_id"') ?>
                                        <?php } else { ?>
                                            <input type="text" name="employee_name" class="form-control" value="<?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?>" readonly>
                                            <input type="hidden" name="employee_id" id="employee_id" class="form-control" value="<?php echo $this->session->userdata('employee_id'); ?>">
                                        <?php } ?>
                                    </div>
                                    <label for="employee_id" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8"><button type="submit" class="btn btn-danger w-md m-b-5" data-dismiss="modal">&times; <?php echo display('cancel') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('sign_in') ?></button>
                                    </div>
                                    <div class="form-group text-center">

                                    </div>
                                    <?php echo form_close() ?>

                                </div>
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
<!--  signout modal start -->
<div id="signout" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong>
                    <center> <?php echo display('checkout') ?></center>
                </strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <?php echo form_open('hrm/Home/checkout') ?>

                                <input name="att_id" id="att_id" type="hidden" value="">

                                <div class="form-group row">

                                    <div class="col-sm-9">
                                        <input name="sign_in" class=" form-control" type="hidden" value="" id="sign_in" readonly="readonly">
                                    </div>
                                </div>


                                <center> <span id="clock" class="f_size_color_margin"></span></center>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">&times;
                                        <?php echo display('cancel') ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo display('confirm') ?><?php echo display('confirm_clock') ?></button>
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
<!-- signout modal end -->
<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('attendance_list') ?><small class="float-right"><?php if ($this->permission->method('hrm', 'create')->access()) : ?>
                            <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal">
                                <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo display('single_checkin') ?></button>
                            <?php if ($this->session->userdata('isAdmin') == 1 || $this->session->userdata('supervisor') == 1) { ?>
                                <button type="button" class="btn btn-primary d_none btn-md " data-target="#add1" data-toggle="modal">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <?php echo display('bulk_checkin') ?></button>
                            <?php } ?>
                        <?php endif; ?>
                        <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
                            <a href="<?php echo base_url(); ?>hrm/manage-attendance-list" class="btn btn-primary mb-2"><?php echo display('manage_attendance') ?></a>
                        <?php endif; ?> </small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('id') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('checkin') ?></th>
                                <th><?php echo display('checkout') ?></th>
                                <th><?php echo display('stay') ?></th>
                                <?php if ($this->permission->method('attendance', 'update')->access()) : ?>
                                    <th><?php echo display('action') ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($addressbook)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($addressbook as $row) : ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td><?php echo html_escape($row['employee_id']); ?></td>
                                        <td><?php echo html_escape($row['date']); ?></td>
                                        <td><?php echo html_escape($row['sign_in']); ?></td>
                                        <td><?php echo html_escape($row['sign_out']); ?></td>
                                        <td><?php echo html_escape($row['staytime']); ?></td>
                                        <?php if ($this->permission->method('attendance', 'update')->access()) : ?>
                                            <td>
                                                <?php if ($row['staytime'] == '') {
                                                    $id = $row["att_id"];
                                                ?>
                                                    <a href='#' class='btn btn-success' onclick='signoutmodal(<?php echo html_escape($id); ?>,"<?php echo html_escape($row['sign_in']); ?>")'><i class='fa fa-clock-o' aria-hidden='true'></i>
                                                        <?php echo display('checkout') ?></a>
                                                <?php  } else {
                                                    echo display('checked_out');
                                                }

                                                ?>

                                            </td>
                                        <?php endif; ?>
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

    <div id="add1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_attendance') ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container mt_50px">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-error"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success') == TRUE) : ?>
                            <div class="form-control alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>
                        <h5>You can export test.csv file Example-</h5>
                        <h6>employee_id,date,sign_in,sign_out,staytime</h6>
                        <h6>EY2T1OWA,2018-10-07,12:14:50 pm,05:07:31 pm,04:59:38</h6>
                        <h5><?php echo display('import_attendance') ?> <span class="c_green"><img src="<?php echo base_url('assets/img/user/user.png') ?>" height="100px" width="100px"></span><?php echo display('upload_csv') ?></h5>
                        <form method="post" action="<?php echo site_url() ?>hrm/Home/importcsv" enctype="multipart/form-data">
                            <?php echo form_open_multipart('hrm/Home/importcsv', array('class' => 'form-vertical', 'id' => 'validate', 'name' => 'insert_attendance')) ?>
                            <input type="file" name="userfile" id="userfile"><br><br>
                            <input type="submit" name="submit" value="UPLOAD" class="btn btn-primary">
                            <?php echo form_close() ?>



                    </div>

                </div>

            </div>
        </div>
    </div>
    <input type="hidden" id="timezone" value="<?php echo html_escape(date_default_timezone_get()) ?>">
    <!-- Start Modal -->
    <script src="<?php echo MOD_URL . $module; ?>/assets/js/atnview.js"></script>