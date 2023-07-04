

<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 

            <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('can_id') ?></th>
                            <th><?php echo display('first_name') ?></th>
                             <th><?php echo display('email') ?></th>
                            <th><?php echo display('phone') ?></th>
                             <th><?php echo display('degree_name') ?></th>
                            <th><?php echo display('university_name') ?></th>
                           <th><?php echo display('cgp') ?></th>
                            <th><?php echo display('action') ?></th>
                            
                           
                        </tr>
                        
                    </thead>
                
                    <tbody>

                        <?php if (!empty($all_data)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($all_data as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->can_id); ?></td>
                                    <td><?php echo html_escape($que->first_name); ?></td>
                                    <td><?php echo html_escape($que->email); ?></td>
                                    <td><?php echo html_escape($que->phone); ?></td>
                                    <td><?php echo html_escape($que->degree_name); ?></td>
                                    <td><?php echo html_escape($que->university_name); ?></td>
                                    <td><?php echo html_escape($que->cgp); ?></td>
                                      <td>
                                      <a href="<?php echo base_url("hrm/Candidate/cv/".html_escape($que->can_id));?>" class="btn btn-primary"> Profile</a>
                                    </td>
                                    
                                    
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

        <script src="<?php echo MOD_URL.$module;?>/assets/js/canDetails.js"></script>