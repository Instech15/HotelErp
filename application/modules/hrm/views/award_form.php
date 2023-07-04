<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('award_list') ?><small class="float-right"><button type="button" class="btn btn-primary btn-md mb-2" data-target="#add" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_new_award') ?></button> <a href="<?php echo base_url(); ?>hrm/manage-award" class="btn btn-primary mb-2"><?php echo display('manage_award') ?></a></small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                     <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl') ?></th>
                            <th><?php echo display('award_name') ?></th>
                            <th><?php echo display('aw_description') ?></th>
                            <th><?php echo display('awr_gift_item') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('employee_name') ?></th>
                            <th><?php echo display('awarded_by') ?></th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mang)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($mang as $row) { ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($row->award_name); ?></td>
                                    <td><?php $text = $row->aw_description;






                                        $pieces = substr($text, 0, 20);
                                        $ps = substr($pieces, 0, 16) . "...";

                                        $cn = strlen($text);

                                        if ($cn > 20) {
                                            echo $ps;
                                        } else {
                                            echo $text;
                                        }


                                        ?></td>
                                    <td><?php echo html_escape($row->awr_gift_item); ?></td>

                                    <td><?php echo html_escape($row->date); ?></td>
                                    <td><?php echo html_escape($row->first_name . ' ' . $row->last_name); ?></td>
                                    <td><?php echo html_escape($row->awarded_by); ?></td>



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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <center><strong>
                            <h4><?php echo display('award_form') ?></h4>
                        </strong></center>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-heading">

                                </div>
                                <div class="card-body">

                                    <?php echo form_open_multipart('hrm/award-list') ?>

                                    <div class="form-group row">

                                        <label for="award_name" class="col-sm-3 col-form-label">
                                            <?php echo display('award_form') ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="award_name" class=" form-control" autocomplete="off" required>

                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <label for="aw_description" class="col-sm-3 col-form-label">
                                            <?php echo display('aw_description') ?></label>
                                        <div class="col-sm-9">
                                            <textarea name="aw_description" class=" form-control"></textarea>

                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <label for="awr_gift_item" class="col-sm-3 col-form-label">
                                            <?php echo display('awr_gift_item') ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="awr_gift_item" class=" form-control" id="awr_gift_item" autocomplete="off" required>

                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">
                                            <?php echo display('date') ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="date" class="datepickers form-control" required>

                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="employee_id" class="col-sm-3 col-form-label">
                                            <?php echo display('employee_name') ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('employee_id', $dropdown, null, 'class="form-control width_100" required=""') ?>

                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <label for="awarded_by" class="col-sm-3 col-form-label">
                                            <?php echo display('awarded_by') ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="awarded_by" class=" form-control" autocomplete="off" required>

                                        </div>

                                    </div>



                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
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
    <script src="<?php echo MOD_URL . $module; ?>/assets/js/awardForm.js"></script>