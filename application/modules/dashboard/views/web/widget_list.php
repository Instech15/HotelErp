<div class="card">
 <div class="row">
    <div class="col-sm-12 col-md-12">
            <div class="card-header">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div>
            <div class="card-body">
            <div class="form-group text-right display_none" id="area">
            <div id="updatecontent">
 					<?php echo form_open('dashboard/web_setting/createwidget',array('id'=>'widgeturl')) ?>
                        <div class="form-group row">
                            <label for="widgetname" class="col-sm-4 col-form-label"><?php echo display('widget_name') ?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input name="widgetname" id="widgetname" class="form-control" type="text" placeholder="<?php echo display('widget_name') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('widget_title') ?></label>
                            <div class="col-sm-8">
                                <input name="widgettitle" id="widgettitle" class="form-control" type="text" placeholder="<?php echo display('widget_title') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="widgettitle" class="col-sm-4 col-form-label"><?php echo display('widget_desc') ?></label>
                            <div class="col-sm-8">
                            	 <textarea name="widgetdesc" id="widgetdesc" class="form-control tinymce"  placeholder="<?php echo display('widget_desc') ?>"  rows="7"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group text-right" id="upbtn">
                            <button type="submit" class="btn btn-success w-md m-b-5" id="btnchnage"><?php echo display('Ad') ?></button>
                        </div>
                       </div> 
                    <?php echo form_close() ?>
                    </div>
                    <table class="table table-bordered table-hover" id="exdatatable">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('widget_name') ?></th>
                                <th><?php echo display('widget_title') ?></th>
                                <th><?php echo display('widget_desc') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($widget_list)){ ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($widget_list as $value) { 
							
							?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo html_escape($value->widget_name); ?></td>
                                <td><?php echo html_escape($value->widget_title); ?></td>
                                <td><?php echo htmlspecialchars_decode($value->widget_desc); ?></td>
                                <td>
                                    <a href="#top" onclick='editwidget(<?php echo html_escape($value->widgetid); ?>)'  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="ti-pencil text-white" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php } } ?>
							
					
                            
                        </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>

<script src="<?php echo MOD_URL.$module;?>/assets/js/widgetList.js"></script>





 