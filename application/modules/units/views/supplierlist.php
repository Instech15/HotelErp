<div class="card">
    <?php if($this->permission->method('units','create')->access()): ?>
    <div class="card-header">
        <h4><?php echo display('supplier_add')?> <small class="float-right"><button type="button"
                    class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i class="ti-plus"
                        aria-hidden="true"></i>
                    <?php echo display('supplier_add')?></button> </small></h4>
    </div>
    <?php endif; ?>

    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('supplier_add');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card-body">
                                <?php echo form_open('units/supplierlist/create') ?>
                                <?php echo form_hidden('supid', (!empty($intinfo->supid)?$intinfo->supid:null)) ?>
                                <div class="form-group row">
                                    <label for="suppliername"
                                        class="col-sm-4 col-form-label"><?php echo display('supplier_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="suppliername" class="form-control" type="text"
                                            placeholder="Add <?php echo display('supplier_name') ?>" id="suppliername"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label"><?php echo display('email') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="email" class="form-control" type="text"
                                            placeholder="Add <?php echo display('email') ?>" id="email" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('mobile') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="mobile" class="form-control" type="number"
                                            placeholder="Add <?php echo display('mobile') ?>" id="mobile" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                        class="col-sm-4 col-form-label"><?php echo display('address') ?></label>
                                    <div class="col-sm-8">
                                        <textarea name="address" class="form-control" cols="50" rows="3"
                                            placeholder="Add <?php echo display('address') ?>" id="address"></textarea>
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
                    <strong><?php echo display('supplier_edit');?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">

                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>
    <div id="payment" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display("supplier_payment");?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body paymentinfo">

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
                <div class="table-responsive">
                    <table width="100%" id="exdatatable"
                        class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('Sl') ?></th>
                                <th><?php echo display('supplier_name') ?></th>
                                <th><?php echo display('email') ?></th>
                                <th><?php echo display('mobile') ?></th>
                                <th><?php echo display('address') ?></th>
                                <th><?php echo display('amount') ?></th>
                                <th><?php echo display('due_amount') ?></th>
                                <th><?php echo display('paid_amount') ?></th>
                                <th><?php echo display('action') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($supplierlist)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($supplierlist as $supplier) { ?>
                            <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape($supplier->supName); ?></td>
                                <td><?php echo html_escape($supplier->supEmail); ?></td>
                                <td><?php echo html_escape($supplier->supMobile); ?></td>
                                <td><?php echo html_escape($supplier->supAddress); ?></td>
                                <td><?php echo html_escape($supplier->total_amount); ?></td>
                                <td><?php echo html_escape($supplier->due_amount); ?></td>
                                <td><?php echo html_escape($supplier->paid_amount); ?></td>
                                <td class="center">
                                    <?php if($this->permission->method('units','update')->access()): ?>
                                        <input name="url" type="hidden"
                                            id="url_<?php echo html_escape($supplier->supid); ?>"
                                            value="<?php echo base_url("units/supplierlist/updateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo html_escape($supplier->supid); ?>')"
                                            class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                            title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                    <?php endif; 
                                    if($this->permission->method('units','update')->access()): ?>
                                        <input name="url" type="hidden"
                                            id="urls_<?php echo html_escape($supplier->supid); ?>"
                                            value="<?php echo base_url("units/supplierlist/updatepaymentfrm") ?>" />
                                        <a onclick="payinfo('<?php echo html_escape($supplier->supid); ?>')"
                                            class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left"
                                            title="Pay"><i class="ti-money text-white" aria-hidden="true"></i></a>
                                    <?php endif; 
									if($this->permission->method('units','delete')->access()): ?>
                                        <a href="<?php echo base_url("units/supplier-delete/".html_escape($supplier->supid)) ?>"
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
</div>