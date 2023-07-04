<div class="row">
    <!--  table area -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title) ? $title : null)) ?><small class="float-right"><?php if ($this->permission->method('hrm', 'create')->access()) : ?>
                            <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                                <?php echo display('add_new_dept') ?></button>
                        <?php endif; ?>
                        <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
                            <a href="<?php echo base_url(); ?>hrm/manage-department" class="btn btn-primary mb-2"><?php echo display('manage_dept') ?></a>
                        <?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('department_name') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mang)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($mang as $row) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($row->department_name); ?></td>

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
                <center><strong>
                        <h4><?php echo display('department_form') ?></h4>
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
                                <?php echo form_open('hrm/department'); ?>

                                <div class="form-group row">

                                    <label for="department_name" class="col-sm-3 col-form-label">
                                        <?php echo display('name') ?><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="department_name" class=" form-control" placeholder="<?php echo display('department_name') ?>">
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
            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>