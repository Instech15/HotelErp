    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h4><?php echo display('candidate_selection') ?><small class="float-right"> <?php if ($this->permission->method('hrm', 'create')->access()) : ?>
                                <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                                    <?php echo display('add_selection') ?></button>
                            <?php endif; ?>
                            <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
                                <a href="<?php echo base_url(); ?>hrm/manage-selection" class="btn btn-primary mb-2"><?php echo display('manage_selection') ?></a>
                            <?php endif; ?></small></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?php echo display('Sl') ?></th>
                                    <th><?php echo display('name') ?></th>
                                    <th><?php echo display('can_id') ?></th>
                                    <th><?php echo display('employee_id') ?></th>
                                    <th><?php echo display('pos_id') ?></th>
                                    <th><?php echo display('selection_terms') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($selection)) { ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($selection as $que) { ?>
                                        <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                            <td><?php echo html_escape($que->can_id); ?></td>
                                            <td><?php echo html_escape($que->employee_id); ?></td>
                                            <td><?php echo html_escape($que->pos_id); ?></td>
                                            <td><?php echo html_escape($que->selection_terms); ?></td>


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
                    <center><strong><?php echo display('create_candidate_selection') ?></strong></center>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-headder">

                                </div>
                                <div class="card-body">

                                    <?php echo form_open('hrm/candidate-selection') ?>
                                    <div class="form-group row">
                                        <label for="can_id" class="col-sm-3 col-form-label"><?php echo display('name') ?> <span class="text-danger">*</span></label>


                                        <div class="col-sm-9">
                                            <?php echo form_dropdown('can_id', $dropdownselection, null, ' class="form-control" onchange="SelectToLoad(this.value)" id="c_id"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pos_id" class="col-sm-3 col-form-label"><?php echo display('pos_id') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pos_name" value="">
                                            <input type="hidden" class="form-control" name="pos_id" value="">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="selection_terms" class="col-sm-3 col-form-label"><?php echo display('selection') ?> <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea name="selection_terms" class="form-control" placeholder="<?php echo display('selection_terms') ?>" id="selection_terms"></textarea>
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



                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>


    <script src="<?php echo MOD_URL . $module; ?>/assets/js/selectionForm.js"></script>