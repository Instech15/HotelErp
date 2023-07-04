<div class="card">
    <?php if($this->permission->method('purchase','create')->access()): ?>

    <div class="card-header"><h4><?php echo display('invoice_return_list')?><small class="float-right"><a
                href="<?php echo base_url("purchase/purchase-return")?>" class="btn btn-primary btn-md"><i
                    class="ti-plus" aria-hidden="true"></i>
                <?php echo display('add_return') ?></a></small></h4></div>
    <?php endif; ?>

    <div class="row">
        <!--  table area -->
        <div class="col-sm-12">

            <div class="card-body">
                <div class="table-responsive">
                <table width="100%" id="exdatatable" class="datatable2 table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('invoice_no') ?></th>
                            <th><?php echo display('supplier_name') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('price') ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($invoicelist)) { ?>
                        <?php $sl = $pagenum+1; ?>
                        <?php foreach ($invoicelist as $items) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($items->po_no); ?></td>
                            <td><?php echo html_escape($items->supName); ?></td>
                            <td><?php html_escape($originalDate = $items->return_date);
									echo $newDate = date("d-M-Y", strtotime($originalDate));
									 ?></td>
                            <td><?php if($currency->position==1){echo html_escape($currency->curr_icon);}?>
                                <?php echo html_escape($items->totalamount); ?>
                                <?php if($currency->position==2){echo html_escape($currency->curr_icon);}?></td>
                            <td class="center">
                                <?php if($this->permission->method('purchase','read')->access()): ?>
                                <a href="<?php echo base_url("purchase/returned-list/".html_escape($items->preturn_id)) ?>"
                                    class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right"
                                    title="View"><i class="ti-eye" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>

                        </tr>
                        <?php $sl++; ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table> <!-- /.table-responsive -->
            </div>
            </div>
        </div>
    </div>
</div>