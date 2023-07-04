<div class="card">
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="card-header">
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div> 
                <div class="row">
                    <div class="col-sm-12">
                            <div class="card-body"> 
                                <div class="card-content-summary">
                                    <h4 class="m-t-0 t_center"><?php echo html_escape($user->fullname) ?> (<?php echo html_escape($user->user_level) ?>)</h4> 
                                 	<p class="t_center"><img src="<?php echo base_url((!empty($user->image)?$user->image:'assets/img/user/user.png')) ?>" alt="User Image" heigt="200" ></p>
                                    <p><?php echo html_escape($user->about) ?></p>
                                </div>
                            </div> 
                            <div class="card-body"> 
                                <dl class="dl-horizontal">
                                    <dt><?php echo display('email') ?> </dt> <dd><?php echo html_escape($user->email) ?></dd>
                                    <dt><?php echo display('ip_address') ?> </dt> <dd><?php echo html_escape($user->ip_address) ?></dd>
                                    <dt><?php echo display('last_login') ?> </dt> <dd><?php echo html_escape($user->last_login) ?></dd>
                                    <dt><?php echo display('last_logout') ?> </dt> <dd><?php echo html_escape($user->last_logout) ?></dd>
                                </dl> 
                            </div> 
                    </div>
                </div>
        </div>
    </div>
</div>
</div> 