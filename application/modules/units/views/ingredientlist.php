<div class="form-group text-right">


</div>
<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('add_ingredient');?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">

                            <div class="card-body">

                                <?php echo form_open('units/products/create') ?>
                                <?php echo form_hidden('id', (!empty($intinfo->id)?$intinfo->id:null)) ?>
                                <div class="form-group row">
                                    <label for="lastname"
                                        class="col-sm-4 col-form-label"><?php echo display('unit_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <?php 
                                            if(empty($categories)){$categories = array('' => '--Select--');}
                                            echo form_dropdown('unitid',$unitdropdown,(!empty($intinfo->id)?$intinfo->id:null),'class="form-control"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category"
                                        class="col-sm-4 col-form-label"><?php echo display('category_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <?php 
                                            if(empty($category)){$category = array('' => '--Select--');}
                                            echo form_dropdown('category_id',$categorydropdown,(!empty($intinfo->category_id)?$intinfo->categoryname:null),'class="form-control"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit_name"
                                        class="col-sm-4 col-form-label"><?php echo display('ingredient_name') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="ingredientname" class="form-control" type="text"
                                            placeholder="<?php echo display('ingredient_name') ?>" id="unitname"
                                            value="">
                                    </div>
                                </div>
                                <?php if($hkchcek){ ?>
                                <div class="form-group row">
                                    <label for="lastname"
                                        class="col-sm-4 col-form-label"><?php echo display("laundry_item"); ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <select name="reuseable" class="form-control">
                                            <option value="" selected="selected"><?php echo display('select_option') ?>
                                            </option>
                                            <option value="1"><?php echo display('yes') ?></option>
                                            <option value="0"><?php echo display('no') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="lastname"
                                        class="col-sm-4 col-form-label"><?php echo display('status') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8 customesl">
                                        <select name="status" class="form-control">
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
                <h4><?php echo display('product_list')?><small
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
                            <th><?php echo display('unit_name') ?></th>
                            <th><?php echo display('available') ?></th>
                            <th><?php echo display('used') ?></th>
                            <th><?php echo display("destroyed"); ?></th>
                            <?php if($hkchcek){ ?>
                                <th><?php echo display("laundry_item"); ?></th>
                            <?php } ?>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ingredientlist)) { ?>
                        <?php $sl = $pagenum+1; ?>
                        <?php foreach ($ingredientlist as $ingredient) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($ingredient->product_name); ?></td>
                            <td><?php echo html_escape($ingredient->categoryname); ?></td>
                            <td><?php echo html_escape($ingredient->uom_name); ?></td>
                            <td><?php if($ingredient->reuseable==1){echo $ingredient->stock+$ingredient->used; }else{echo html_escape($ingredient->stock);} ?></td>
                            <td><?php if($ingredient->reuseable==1){echo "-";}else{echo html_escape($ingredient->used);} ?></td>
                            <td><?php echo html_escape($ingredient->destroyed); ?></td>
                            <?php if($hkchcek){ ?>
                                <td><?php if($ingredient->reuseable==1){echo display("yes");}else{echo display("no");} ?></td>
                            <?php } ?>
                            <td class="center">
                                <?php if($this->permission->method('units','update')->access()): ?>

                                <a onclick="editingredient('<?php echo html_escape($ingredient->id); ?>')"
                                    class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                    title="Update"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                <?php endif; 
										 if($this->permission->method('units','delete')->access()): ?>
                                <a href="<?php echo base_url("units/product-delete/".html_escape($ingredient->id)) ?>"
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