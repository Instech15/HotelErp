<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
        		<div class="card-header"><h4><?php echo display('loan_details') ?></h4></div> 
            <div class="card-body">
             <div class="form-group text-center c_f_size_f_weight_family_varient">
             
    </div>
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('Date') ?></th>
                            <th><?php echo display('installment_amount') ?></th>
                            <th><?php echo display('payment') ?></th>
                            <th><?php echo display('received_by') ?></th>
                            <th><?php echo display('installment_no') ?></th>
                            <th><?php echo display('notes') ?></th>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($abc)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($abc as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->date); ?></td>
                                    <td><?php echo html_escape($que->installment_amount); ?></td>
                                    <td><?php echo html_escape($que->payment); ?></td>
                                    
                                    <td><?php echo html_escape($que->received_by); ?></td>
                                    <td><?php echo html_escape($que->installment_no); ?></td>
                                    <td><?php echo html_escape($que->notes); ?></td>
                                    

                                
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  
               <!-- /.table-responsive -->
            </div>
        </div>
    </div>
</div>