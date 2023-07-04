<div class="row">
    <div class="col-sm-12 col-md-12">
       <div class="card">
           <div class="card-header">
                    <h4><?php echo display('language_list') ?></h4> 
            </div>

            <div class="card-body">

                <!-- language -->  
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td colspan="3">
                            <?php echo form_open('dashboard/language/addlanguage', ' class="form-inline" ') ?> 
                                    <div class="form-group">
                                        <label class="sr-only" for="addLanguage"> <?php echo display('language_name') ?></label>
                                        <input name="language" type="text" class="form-control" id="addLanguage" placeholder="<?php echo display('language_name') ?>">
                                    </div>
                                      
                                    <button type="submit" class="btn btn-primary"><?php echo display('save') ?></button>
                                    <?php echo form_close(); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fa fa-th-list"></i></th>
                            <th><?php echo display('language') ?></th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php if (!empty($languages)) {?>
                            <?php $sl = 1 ?>
                            <?php foreach ($languages as $key => $language) {?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($language) ?></td>
                                <td><a href="<?php echo base_url("edit-phrase/".html_escape($key)) ?>" class="btn btn-primary"><i class="ti-pencil-alt text-white"></i></a>  
                                </td> 
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody> 
                </table>  
 
            </div>
        </div>
    </div>
</div>

