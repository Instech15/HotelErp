<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('loan_installment')?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo form_open('hrm/loan-installment') ?>


                                <div class="form-group row">
                                    <label for="employee_id"
                                        class="col-sm-4 col-form-label"><?php echo display('employee_name') ?> <span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-8">

                                        <?php echo form_dropdown('employee_id',$gndloan,(!empty($example->employee_id)?$example->employee_id:null), 'class="form-control"  id="employee_id" onchange="SelectToLoad(this.value)"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="loan_id"
                                        class="col-sm-4 col-form-label"><?php echo display('loan_id') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="loan_id" class="form-control"
                                            onchange="SelectToname(this.value),SelectAuto(this.value)"
                                            id="loan_id"></select>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="installment_amount"
                                        class="col-sm-4 col-form-label"><?php echo display('installment_amount') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="installment_amount" class="form-control" placeholder="<?php 
                                 echo display('installment_amount') ?>" id="installment_amount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment"
                                        class="col-sm-4 col-form-label"><?php echo display('payment') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input name="payment" class="form-control" type="text"
                                            placeholder="<?php echo display('payment') ?>" id="payment">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('date') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="date" class="datepickers form-control"
                                            placeholder="<?php echo display('date') ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="received_by"
                                        class="col-sm-4 col-form-label"><?php echo display('received_by') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <?php echo form_dropdown('received_by',$gndloan,null, 'class="form-control"  id="received_by"') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="installment_no"
                                        class="col-sm-4 col-form-label"><?php echo display('installment_no') ?> <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="installment_no" class="form-control"
                                            placeholder="<?php echo display('installment_no') ?>" id="installment_no"
                                            value="1">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="notes" class="col-sm-4 col-form-label"><?php echo display('notes') ?>
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea name="notes" class="form-control"
                                            placeholder="<?php echo display('notes') ?>" id="notes"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">

                                <div class="form-group text-right">
                                    <button type="reset"
                                        class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                    <button type="submit"
                                        class="btn btn-success w-md m-b-5"><?php echo display('paid') ?></button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <div class="modal-footer">

        </div>

    </div>

</div>

<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('loan_installment') ?><small class="float-right">
                        <?php if($this->permission->method('hrm','create')->access()): ?>
                        <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0"
                            data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                            <?php echo display('add_installment')?></button>
                        <?php endif; ?>
                        <?php if($this->permission->method('hrm','read')->access()): ?>
                        <a href="<?php echo base_url();?>hrm/manage-loan-installment"
                            class="btn btn-primary mb-2"><?php echo display('manage_installment')?></a>
                        <?php endif; ?></small></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable"
                        class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('Sl') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('employee_id') ?></th>
                                <th><?php echo display('loan_id') ?></th>
                                <th><?php echo display('installment_amount') ?></th>
                                <th><?php echo display('payment') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('received_by') ?></th>
                                <th><?php echo display('installment_no') ?></th>
                                <th><?php echo display('notes') ?></th>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($loanss)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($loanss as $que) { ?>
                            <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                                <td><?php echo html_escape($que->employee_id); ?></td>
                                <td><?php echo html_escape($que->loan_id); ?></td>
                                <td><?php echo html_escape($que->installment_amount); ?>$</td>
                                <td><?php echo html_escape($que->payment); ?>$</td>
                                <td><?php echo html_escape($que->date); ?></td>
                                <td><?php echo html_escape($que->receiver); ?></td>
                                <td><?php echo html_escape($que->installment_no); ?></td>
                                <td><?php echo html_escape($que->notes); ?></td>


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

<script src="<?php echo MOD_URL.$module;?>/assets/js/installmentForm.js"></script>