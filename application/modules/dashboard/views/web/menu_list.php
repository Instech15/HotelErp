<div class="card">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-header">
                <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="RoleTbl">
                    <thead>
                        <tr>
                            <th><?php echo display('sl_no') ?></th>
                            <th><?php echo display('menu_name') ?></th>
                            <th><?php echo display('menu_url') ?></th>
                            <th><?php echo display('parent_menu') ?></th>
                            <th><?php echo display('status') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($allmenu)){ ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($allmenu as $value) { ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td id="menu_name-<?php echo html_escape($value->menuid);?>">
                                <?php echo html_escape($value->menu_name); ?></td>
                            <td id="menu_slug-<?php echo html_escape($value->menuid);?>">
                                <?php echo html_escape($value->menu_slug); ?></td>
                            <td></td>
                            <td><?php if($value->isactive==1){ echo display("active");}else{ echo display("inactive");} ?></td>
                            <td>
                                <a onclick="editmenu('<?php echo html_escape($value->isactive); ?>','<?php echo html_escape($value->parentid); ?>','<?php echo html_escape($value->menuid); ?>')"
                                    data-toggle="tooltip" data-placement="left" title="Update"
                                    class="btn btn-success btn-sm"><i class="ti-pencil text-white"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php if(!empty($value->sub)){
								foreach($value->sub as $submenu){?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td id="menu_name-<?php echo html_escape($submenu->menuid);?>">
                                <?php echo html_escape($submenu->menu_name); ?></td>
                            <td id="menu_slug-<?php echo html_escape($submenu->menuid);?>">
                                <?php echo html_escape($submenu->menu_slug); ?></td>
                            <td><?php echo html_escape($value->menu_name);?></td>
                            <td><?php if($submenu->isactive==1){ echo display("active");}else{ echo display("inactive");} ?></td>
                            <td>
                                <a onclick="editmenu('<?php echo html_escape($submenu->isactive); ?>',<?php echo html_escape($submenu->parentid); ?>,<?php echo html_escape($submenu->menuid); ?>)"
                                    data-toggle="tooltip" data-placement="left" title="Update"
                                    class="btn btn-success btn-sm"><i class="ti-pencil text-white"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php } }?>
                        <?php  } }  ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<script src="<?php echo MOD_URL.$module;?>/assets/js/menuList.js"></script>