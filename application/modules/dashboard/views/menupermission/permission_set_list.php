<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                 <div class="btn-group pull-right"> 
                     <a href="<?php echo base_url()?>dashboard/Permission_setup" class="btn btn-success"><i class="fa fa-plus"></i> Add Menu Item</a>
                    </div>
                    <h4><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
                </div>
            <div class="card-body">
 
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('menu_title')?></th>
                                <th><?php echo display('page_url')?></th>
                                <th><?php echo display('module')?></th>
                                <th><?php echo display('parent_menu')?></th>
                                <th><?php echo display('status') ?></th>
                                <th width="100"><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($menu_item_list)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($menu_item_list as $value) { 
                                $parent = $this->db->select('menu_title')->where('menu_id',$value->parent_menu)->get('sec_menu_item')->row();
                            ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                               <td><?php echo html_escape($value->menu_title); ?></td>
                                <td><?php echo html_escape($value->page_url); ?></td>
                                <td><?php echo html_escape($value->module); ?></td>
                                <td><?php echo html_escape(@$parent->menu_title); ?></td>
                                <td><?php echo ((html_escape($value->is_report)==1)?'Is Report':'Not Report'); ?></td>
                                <td>
                                    <a href="<?php echo base_url("dashboard/Permission_setup/edit/".html_escape($value->menu_id)) ?>" class="btn btn-info btn-sm"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url("dashboard/Permission_setup/delete/".html_escape($value->menu_id)) ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm"><i class="ti-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                    <?php echo htmlspecialchars_decode(!empty($links)?$links:null);?>
                </div>
            </div> 
        </div>
    </div>
</div>

 