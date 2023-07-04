<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong> position list</strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php echo form_open('hrm/employees/create_position') ?>
                        <div class="form-group row">
                            <label for="position_name" class="col-sm-3 col-form-label"><?php echo display('position_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input name="position_name" class="form-control" type="text" placeholder="<?php echo display('position_name') ?>" id="position_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position_details" class="col-sm-3 col-form-label"><?php echo display('position_details') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="position_details" class="form-control" placeholder="<?php echo display('position_details') ?>" id="position_details"></textarea>
                            </div>
                        </div>




                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                        </div>
                        <?php echo form_close() ?>

                    </div>
                </div>
            </div>



        </div>

        <div class="modal-footer">

        </div>

    </div>

</div>


<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('position_list_detail') ?><small class="float-right"><button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_designation') ?></button>
                        <a href="<?php echo base_url(); ?>hrm/manage-position" class="btn btn-primary mb-2"><?php echo display('manage') ?></a></small></h4>
            </div>
            <div class="card-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('position_name') ?></th>
                            <th><?php echo display('position_details') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($position)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($position as $que) { ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->position_name); ?></td>
                                    <td><?php echo html_escape($que->position_details); ?></td>


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