<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
                    <div class="card-header">
                    <h4> 
                        <?php echo display('voucher_approval')?>
                    </h4>
            </div>
            <div class="card-body">
 
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('voucher_no') ?></th>
                                <th><?php echo display('remark') ?></th>
                                <th><?php echo display('debit') ?></th>
                                <th><?php echo display('credit') ?></th>
                                <th><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($aprrove)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($aprrove as $approve) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo html_escape($approve->VNo); ?></td>
                                <td><?php echo html_escape($approve->Narration); ?></td>
                                <td><?php echo html_escape($approve->totaldebit); ?></td>
                                <td><?php echo html_escape($approve->totalcredit); ?></td>
                                <td>

                                <a href="<?php echo base_url("accounts/accounts/isactive/".html_escape($approve->VNo)."/active") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-placement="right" title="Approved"><?php echo display('approved')?></a>
                                <a href="<?php echo base_url("accounts/accounts/voucher_update/".html_escape($approve->VNo)) ?>" class="btn btn-info btn-sm" title="Update"><i class="ti-pencil text-white"></i></a>
                                
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</div>

 