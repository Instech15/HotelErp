<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                <?php echo form_open_multipart('dashboard/rating/create') ?>
                     <?php echo form_hidden('ratingid', (!empty($intinfo->ratingid)?$intinfo->ratingid:null)) ?>
                    <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label"><?php echo display('title')?> <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                <input name="title" class="form-control" type="text" placeholder="<?php echo display('title') ?>" id="title" value="<?php echo html_escape((!empty($intinfo->title)?$intinfo->title:null)) ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tokenrate" class="col-sm-4 col-form-label"><?php echo  display('reviewtxt'); ?></label>
                            <div class="col-sm-8">
                                <textarea name="reviewtxt" cols="46" rows="3" id="reviewtxt" placeholder="<?php echo  display('reviewtxt'); ?>"><?php echo html_escape((!empty($intinfo->reviewtxt)?$intinfo->reviewtxt:null)) ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="rating" class="col-sm-4 col-form-label"><?php echo  display('rating'); ?></label>
                        <div class="col-sm-8">
                            <input name="rating" class="form-control" type="text"  placeholder="<?php echo  display('rating'); ?>" id="offerstartdate"  value="<?php echo html_escape((!empty($intinfo->rating)?$intinfo->rating:null)) ?>" required>
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
    