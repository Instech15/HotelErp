<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('add_rating');?></strong>
            </div>
            <div class="modal-body">
           
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">

                    <?php echo form_open_multipart('dashboard/rating/create') ?>
                    <?php echo form_hidden('ratingid', (!empty($intinfo->ratingid)?$intinfo->ratingid:null)) ?>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label"><?php echo display('title')?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tokenrate" class="col-sm-4 col-form-label"><?php echo  display('name'); ?></label>
                            <div class="col-sm-8">
                                <input name="name" class="form-control" type="text" placeholder="<?php echo  display('name'); ?>" id="name" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="review" class="col-sm-4 col-form-label"><?php echo  display('reviewtxt'); ?></label>
                        <div class="col-sm-8">
                            <input name="review" class="form-control" type="text"  placeholder="<?php echo  display('reviewtxt'); ?>" id="offerstartdate"  value="" required>
                        </div>
                    </div>
                        <div class="form-group row">
                        <label for="rating" class="col-sm-4 col-form-label"><?php echo  display('rating'); ?> </label>
                        <div class="col-sm-8">
                            <input name="rating" class="form-control datepickers" type="text"  placeholder="<?php echo  display('rating'); ?>" id="offerendate"  value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8 customesl">
                            <select name="status"  class="form-control">
                                <option value=""><?php echo display('select_option') ?></option>
                                <option value="1" selected="selected"><?php echo display('active') ?></option>
                                <option value="0"><?php echo display('inactive') ?></option>
                              </select>
                        </div>
                    </div>
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><?php echo display('rating_edit');?></strong>
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

        <div class="card card-default thumbnail"> 

            <div class="card-body">
                <table width="100%" class="datatable table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('title') ?></th>
                            <th><?php echo display('name') ?></th>
                            <th><?php echo display('reviewtxt') ?></th>
                            <th><?php echo display('rating') ?></th>
                            <th><?php echo display('email') ?></th>
                            <th><?php echo display('action') ?></th> 
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ratinglist)) { 
						
						?>
                            <?php $sl =  $pagenum+1; ?>
                            <?php foreach ($ratinglist as $rating) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($rating->title); ?></td>
                                    <td><?php echo html_escape($rating->name); ?></td>
                                    <td><?php echo html_escape($rating->reviewtxt); ?></td>
                                    <td><?php echo html_escape($rating->rating); ?></td>
                                    <td><?php echo html_escape($rating->email); ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('dashboard','update')->access()): ?>
                                    <input name="url" type="hidden" id="url_<?php echo html_escape($rating->ratingid); ?>" value="<?php echo base_url("dashboard/rating/updateintfrm") ?>" />
                                        <a onclick="editinfo('<?php echo html_escape($rating->ratingid); ?>')" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                         <?php endif; 
										 if($this->permission->method('setting','delete')->access()): ?>
                                        <a href="<?php echo base_url("dashboard/rating/delete/".html_escape($rating->ratingid)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                         <?php endif; ?>
                                    </td>
                                    
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                <div class="text-right"><?php echo htmlspecialchars_decode(!empty($links)?$links:null);?></div>
                
            </div>
        </div>
        
    </div>
</div>

     
