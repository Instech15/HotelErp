<div class="row">
        <div class="col-md-12">
            <div  class="card panel-form">
                <div class="row">
                <div class="col-md-12">
                <div class="card-header"><h4><?php echo display('sms_template') ?></h4></div>
                </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="portlet-body form">
                            <?php  
                                echo form_open_multipart('dashboard/smsetting/save_sms_template', array('class' => 'form-horizontal','method'=>'post','id' => 'MyForm','role'=>'form'));  
                            ?>
                                
                            <div class="form-body">
                               <input type="hidden" name="id" id="id" value=""/>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><?php echo display('template_name');?> : </label>
                                        <div class="col-md-8">
                                            <input type="text" id="template_name" class="form-control" value="" required="1" name="template_name" placeholder="<?php echo display('template_name');?>">
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><?php echo display('type');?> : </label>
                                        <div class="col-md-8">
                                            <?php echo form_dropdown('type', array('' => 'Select Option','Cancel' => 'Cancel', 'Neworder' =>'New Order',  'CompleteOrder' => 'Complete Order',  'Processing' => 'Processing'), null, array('class'=>'form-control dont-select-me', 'id'=>'type', 'required'=>'required')) ?> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><?php echo display('sms_template');?> : </label>
                                        <div class="col-md-8">
                                             <textarea name="message" id="message" value="" class="form-control" required="1" rows="6"></textarea>
                                        </div>
                                    </div> 
                                </div>

                                   <div class="form-group ">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-success sav_btn"><?php echo display('submit');?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                           <p class="b_radious_b_p_t_transform_b_shadow">
                               <?php echo display('sms_template_warning');?>
                           </p>
                        </div>
                    </div>
                </div>
            </div>  
         </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
            <div class="card-header"><h4><?php echo display('template_list') ?></h4></div>
                <div class="card-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="center">
                                <th class="all"> <?php echo display('set_default');?> </th>
                                <th class="all"><?php echo display('template_name');?></th>
                                <th class="all"><?php echo display('type');?></th>
                                <th class="all"><?php echo display('sms_template');?> </th>
                                <th class="all"><?php echo display('action');?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($template as $value) {?>
                            <tr>
                                <td> 
                                    <a class="btn btn-info" href="<?php echo base_url(); ?>dashboard/smsetting/set_default_template/<?php echo html_escape($value->id) . '/' . html_escape($value->default_status); ?>"><span class="<?php if($value->default_status==1){ echo "ti-check";}else{ echo "ti-close";}?>"></span></a>
                                </td>
                                <td id="t_<?php echo html_escape($value->id);?>"><?php echo html_escape($value->template_name); ?></td>
                                <td id="ts_<?php echo html_escape($value->type); ?>"><?php echo html_escape($value->type); ?></td>
                                <td id="td_<?php echo html_escape($value->id);?>"><?php echo html_escape($value->message); ?></td>
                                
                                <td width="70">
                                    <a data-id="<?php echo html_escape($value->id);?>" class="edit btn btn-xs btn-success">
                                    <i class="ti-pencil text-white"></i> </a>
                                    <a href="javascript:void(0)" onclick="smstemplatedelete('<?php echo html_escape($value->id); ?>')" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display("are_you_sure") ?>')" data-toggle="tooltip" data-placement="right" title="Delete "><i class="ti-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/smsTemplate.js"></script>