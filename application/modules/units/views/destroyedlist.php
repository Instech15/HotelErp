<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display("add_ingredient");?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('units/products/descreate') ?>
                                <?php echo form_hidden('id', (!empty($intinfo->id)?$intinfo->id:null)) ?>
                                <div class="form-group row">
                                    <label for="category"
                                        class="col-sm-4 col-form-label"><?php echo display('category_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <?php 
                                            if(empty($category)){$category = array('' => '--Select--');}
                                            echo form_dropdown('category_id',$categorydropdown,'',' id="category_id" class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit_name"
                                        class="col-sm-4 col-form-label"><?php echo display('ingredient_name'); ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="product_id" id="product" class="form-control" required>
                                            <option value="" selected="selected"><?php echo display('select_option') ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity"
                                        class="col-sm-4 col-form-label"><?php echo display('quantity') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" id="quantity" min="1" class="form-control" placeholder="Quantity" name="quantity" value="" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="queue"
                                        class="col-sm-4 col-form-label"><?php echo display("product_queue") ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <select name="queue" class="form-control" id="queue" required>
                                            <option value="" selected="selected"><?php echo display('select_option') ?>
                                            </option>
                                            <option value="ready"><?php echo "Ready"; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="chargediv">
                                    <label for="charge"
                                        class="col-sm-4 col-form-label"><?php echo "Charge"; ?></label>
                                    <div class="col-sm-8">
                                        <input type="number" id="charge" min="0" class="form-control" placeholder="charge" name="charge" value=""/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comments"
                                        class="col-sm-4 col-form-label"><?php echo display('comments'); ?></label>
                                    <div class="col-sm-8">
                                        <textarea col="3" name="comments" placeholder="Comments" class="form-control"></textarea>
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
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('update_ingredient');?></strong>
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

        <div class="card">
            <div class="card-header">
                <h4><?php echo display("destroyed_product_list"); ?><small
                        class="float-right"><?php if($this->permission->method('units','create')->access()): ?>
                        <button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"><i
                                class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_ingredient')?></button>
                        <?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('ingredient_name') ?></th>
                            <th><?php echo display('category_name') ?></th>
                            <th><?php echo display('quantity') ?></th>
                            <th><?php echo display('comments') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reuselist)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($reuselist as $ingredient) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($ingredient->product_name); ?></td>
                            <td><?php echo html_escape($ingredient->categoryname); ?></td>
                            <td><?php echo html_escape($ingredient->quantity); ?></td>
                            <td><?php echo html_escape($ingredient->comment); ?></td>

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
<script src="<?php echo MOD_URL . $module; ?>/assets/js/destroyed_list.js"></script>