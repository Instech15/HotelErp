<div class="card">
 <div class="row">
    <div class="col-sm-12 col-md-12">
            <div class="card-header">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?><small class="float-right"><a href="<?php echo base_url()?>dashboard/web_setting/bannersetting" class="btn btn-success"><i class="ti-plus"></i> <?php echo display('banner_list')?></a></small></h4>
            </div>
            <div class="card-body">
            <?php echo form_open('dashboard/web_setting/createtype',array('id'=>'typeurl')) ?>
                        <div class="form-group row">
                            <label for="suppliername" class="col-sm-4 col-form-label"><?php echo display('bannertype') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="bannertype" id="bannertype" class="form-control" type="text" placeholder="Add <?php echo display('bannertype') ?>">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success w-md m-b-5" id="btnchnage"><?php echo display('Ad') ?></button>
                        </div>
                    <?php echo form_close() ?>
                    <table class="table table-bordered table-hover" id="RoleTbl">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('title') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($ballertype_list)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($ballertype_list as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo html_escape($value->STypeName); ?></td>
                                <td>
                                    <a onclick="edittype('<?php echo html_escape($value->STypeName); ?>',<?php echo html_escape($value->stype_id); ?>)"  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>

<script src="<?php echo MOD_URL.$module;?>/assets/js/bannerType.js"></script>





 