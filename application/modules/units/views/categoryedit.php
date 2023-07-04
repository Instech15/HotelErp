<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">

            <div class="panel-body">
                <?php echo form_open('units/category/create') ?>
                <?php echo form_hidden('category_id', (!empty($intinfo->category_id)?$intinfo->category_id:null)) ?>
                <div class="form-group row">
                    <label for="category_name" class="col-sm-4 col-form-label"><?php echo display('category_name') ?>
                        <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input name="category_name" class="form-control" type="text"
                            placeholder="<?php echo display('category_name') ?>" id="tablename"
                            value="<?php echo html_escape((!empty($intinfo->categoryname)?$intinfo->categoryname:null)) ?>"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label"><?php echo display('status') ?><span
                            class="text-danger">*</span></label>
                    <div class="col-sm-8 customesl">
                        <select name="status" id="status" class="form-control">
                            <option value="" selected="selected"><?php echo display('select_option') ?></option>
                            <option value="1" <?php if(!empty($intinfo)){if($intinfo->status==1){echo "Selected";}} ?>>
                                <?php echo display('active') ?></option>
                            <option value="0" <?php if(!empty($intinfo)){if($intinfo->status==0){echo "Selected";}} ?>>
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