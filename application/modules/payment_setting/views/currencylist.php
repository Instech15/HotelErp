<div class="card">
    <?php if($this->permission->method('payment_setting','create')->access()): ?>

    <div class="card-header">
        <h4>
            <?php echo display('currency_list') ?>
            <small class="float-right">
                <?php if($this->permission->method('payment_setting','create')->access()): ?>
                <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?php echo display('add_new')?></button><?php endif; ?>
            </small>
        </h4>
    </div>
    <?php endif; ?>

    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('currency_add');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card-body">
                                <?php echo form_open('payment_setting/paymentmethod/currency_create') ?>
                                <?php echo form_hidden('currency_id', (!empty($intinfo->currency_id)?$intinfo->currency_id:null)) ?>
                                <div class="form-group row">
                                    <label for="currency"
                                        class="col-sm-4 col-form-label"><?php echo display('currency_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input required name="currency_name" class="form-control" type="text"
                                            placeholder="<?php echo display('currency_name') ?>" id="currency_name"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="currency_details"
                                        class="col-sm-4 col-form-label"><?php echo display('details') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input required name="currency_details" class="form-control" type="text"
                                            placeholder="<?php echo display('details') ?>" id="currency_details"
                                            value="">
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
                    <strong><?php echo display('update')." ".display("currency");?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">

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
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('currency_name') ?></th>
                            <th><?php echo display('details') ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($currencylist)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($currencylist as $list) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($list->currency_name); ?></td>
                            <td><?php echo html_escape($list->currency_details); ?></td>
                            <td class="center">
                                <?php if($this->permission->method('currency_setting','update')->access()): ?>
                                <input name="url" type="hidden" id="url_<?php echo html_escape($list->id); ?>"
                                    value="<?php echo base_url("payment_setting/paymentmethod/update_currency_frm") ?>" />
                                <a onclick="editinfo('<?php echo html_escape($list->id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                <?php endif; 
								if($this->permission->method('currency_setting','delete')->access()): ?>
                                    <a href="<?php echo base_url("payment_setting/paymentmethod/currency_delete/".html_escape($list->id)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a> 
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