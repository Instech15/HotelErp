<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">

                <?php echo form_open('units/products/create'); ?>

                <?php echo form_hidden('id', (!empty($intinfo->id)?$intinfo->id:null)) ?>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('unit_name') ?><span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8 customesl">
                        <?php echo form_dropdown('unitid',$unitdropdown,$unitdropdown=$intinfo->uom_id, 'class="selectpicker form-control" data-live-search="true" id="unitid"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label"><?php echo display('category_name') ?><span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8 customesl">
                        <?php echo form_dropdown('category_id',$categorydropdown,$categorydropdown=$intinfo->category_id, 'class="selectpicker form-control" data-live-search="true" id="categorytid"') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit_name" class="col-sm-4 col-form-label"><?php echo display('ingredient_name') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="ingredientname" class="form-control" type="text"
                            placeholder="<?php echo display('ingredient_name') ?>" id="unitname"
                            value="<?php echo html_escape((!empty($intinfo->product_name)?$intinfo->product_name:null)) ?>">
                    </div>
                </div>
                <?php if($hkchcek){ ?>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display("laundry_item"); ?> <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8 customesl">
                        <select name="reuseable" class="form-control">
                            <option value="" selected="selected"><?php echo display('select_option') ?>
                            </option>
                            <option value="1"
                                <?php if(!empty($intinfo)){if($intinfo->reuseable==1){echo "Selected";}} ?>>
                                <?php echo display('yes') ?></option>
                            <option value="0"
                                <?php if(!empty($intinfo)){if($intinfo->reuseable==0){echo "Selected";}} ?>>
                                <?php echo display('no') ?></option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="" selected="selected"><?php echo display('select_option') ?></option>
                            <option value="1"
                                <?php if(!empty($intinfo)){if($intinfo->is_active==1){echo "Selected";}} ?>>
                                <?php echo display('active') ?></option>
                            <option value="0"
                                <?php if(!empty($intinfo)){if($intinfo->is_active==0){echo "Selected";}} ?>>
                                <?php echo display('inactive') ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>