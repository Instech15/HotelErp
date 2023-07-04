<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
             <div class="card-header"><h4><?php echo display('sunscribe_list') ?></h4></div>
            <div class="card-body">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('email') ?></th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($subscribe)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($subscribe as $single) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($single->email); ?></td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                
                
            </div>
        </div>
        
    </div>
</div>