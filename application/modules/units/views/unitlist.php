<div class="card">
    <?php if($this->permission->method('units','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('unit_measurement_list')?> <small class="float-right"><button type="button"
                    class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i class="ti-plus"
                        aria-hidden="true"></i>
                    <?php echo display('unit_add')?></button> </small></h4>
    </div>

    <?php endif; ?>

    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('unit_add');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card-body">

                                <?php echo form_open('units/unitmeasurement/create') ?>
                                <?php echo form_hidden('id', (!empty($unitinfo->id)?$unitinfo->id:null)) ?>
                                <div class="form-group row">
                                    <label for="unit_name"
                                        class="col-sm-3 col-form-label"><?php echo display('unit_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="unitname" class="form-control" type="text"
                                            placeholder="<?php echo display('unit_name') ?>" id="unitname" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="unit_short_name"
                                        class="col-sm-3 col-form-label"><?php echo display('unit_short_name') ?></label>
                                    <div class="col-sm-9">
                                        <input name="shortname" class="form-control" type="text"
                                            placeholder="<?php echo display('unit_short_name') ?>" id="shortname"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname"
                                        class="col-sm-3 col-form-label"><?php echo display('status') ?></label>
                                    <div class="col-sm-9 customesl">
                                        <select name="status" class="form-control" required>
                                            <option value="" selected="selected"><?php echo display('select_option') ?>
                                            </option>
                                            <option value="1"><?php echo display('active') ?></option>
                                            <option value="0"><?php echo display('inactive') ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="reset"
                                        class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>

    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('unit_update');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editunit">

                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('unit_name') ?></th>
                            <th><?php echo display('unit_short_name') ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($unitlist)) { ?>
                        <?php $sl = $pagenum+1; ?>
                        <?php foreach ($unitlist as $unit) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($unit->uom_name); ?></td>
                            <td><?php echo html_escape($unit->uom_short_code); ?></td>
                            <td class="center">
                                <?php if($this->permission->method('units','update')->access()): ?>
                                <a onclick="editunit('<?php echo html_escape($unit->id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                <?php endif; 
										 if($this->permission->method('units','delete')->access()): ?>
                                <a href="<?php echo base_url("units/unit-delete/".html_escape($unit->id)) ?>"
                                    onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                    class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right"
                                    title="Delete "><i class="ti-trash" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>

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