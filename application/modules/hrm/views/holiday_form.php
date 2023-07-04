<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('holiday') ?><small
                        class="float-right"><?php if($this->permission->method('hrm','create')->access()): ?>
                        <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add" data-toggle="modal"><i
                                class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_more_holiday')?></button>
                        <?php endif; ?>
                        <?php if($this->permission->method('hrm','read')->access()): ?>
                        <a href="<?php echo base_url();?>hrm/manage-holiday"
                            class="btn btn-primary mb-2"><?php echo display('manage_holiday')?></a>
                        <?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('holiday_name') ?></th>
                            <th><?php echo display('start_date') ?></th>
                            <th><?php echo display('end_date') ?></th>
                            <th><?php echo display('no_of_days') ?></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($holiday)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($holiday as $que) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($que->holiday_name); ?></td>
                            <td><?php echo html_escape($que->start_date); ?></td>
                            <td><?php echo html_escape($que->end_date); ?></td>
                            <td><?php echo html_escape($que->no_of_days); ?></td>
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

<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong>
                    <?PHP  echo display('add_more_holiday') ?>
                </strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('hrm/Leave/create_holiday') ?>
                                <div class="form-group row">
                                    <label for="holiday_name"
                                        class="col-sm-4 col-form-label"><?php echo display('holiday_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="holiday_name" class="form-control" type="text"
                                            placeholder="<?php echo display('holiday_name') ?>" id="holiday_name"
                                            autocomplete="off" required>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date"
                                        class="col-sm-4 col-form-label"><?php echo display('start_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="start_date" class="datepickerwithoutprevdate form-control"
                                            type="text" placeholder="<?php
                                 echo display('start_date') ?>" id="start_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="end_date"
                                        class="col-sm-4 col-form-label"><?php echo display('end_date') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="end_date" class="datepickerwithoutprevdates form-control"
                                            type="text" placeholder="<?php  
                                 echo display('end_date') ?>" id="end_date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_of_days"
                                        class="col-sm-4 col-form-label"><?php echo display('no_of_days') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="no_of_days" class="form-control" type="number"
                                            placeholder="<?php echo display('no_of_days') ?>" id="no_of_days">
                                    </div>
                                </div>





                                <div class="form-group text-right">
                                    <button type="reset"
                                        class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('set') ?></button>
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
<script src="<?php echo MOD_URL.$module;?>/assets/js/calculation.js"></script>