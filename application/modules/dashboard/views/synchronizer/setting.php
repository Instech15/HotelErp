<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open("dashboard/data_synchronizer/form") ?>

                    <div class="form-group row">
                        <label for="hostname" class="col-sm-3 col-form-label"><?php echo display('hostname') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="hostname" class="form-control" type="text" placeholder="www.example.com / 192.168.1.1" id="hostname" value="<?php echo html_escape((!empty($ftp->hostname)?$ftp->hostname:null)) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label"><?php echo display('username') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="username" class="form-control" type="text" placeholder="<?php echo display('username') ?>" id="username"  value="<?php echo html_escape((!empty($ftp->username)?$ftp->username:null)) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password"  value="<?php echo html_escape((!empty($ftp->password)?$ftp->password:null)) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="port" class="col-sm-3 col-form-label"><?php echo display('ftp_port') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="port" class="form-control" type="text" placeholder="Default Port 21" id="port" value="<?php echo html_escape((!empty($ftp->port)?$ftp->port:21)) ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="debug" class="col-sm-3 col-form-label"><?php echo display('ftp_debug') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <?php echo form_dropdown('debug', array('false'=>'FALSE', 'true'=>'TRUE'), (!empty($ftp->debug)?$ftp->debug:null), 'class="form-control" id="debug"' ) ?> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="project_root" class="col-sm-3 col-form-label"><?php echo display('project_root') ?> <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input name="project_root" class="form-control" type="text" placeholder="./public_html/your_project_name/" id="project_root" value="<?php echo html_escape((!empty($ftp->project_root)?$ftp->project_root:null)) ?>">
                        </div>
                    </div>
         
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>

 