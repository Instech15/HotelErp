<div class="row mb-4">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><?php echo display('financial_year') ?></h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('accounts/accounts/financial_year') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('title') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" name="yearname" id="title" value="" placeholder=""
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" name="start_date" id="start_date" onchange="year()"
                                    value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('from_date') ?>"
                                    class="fin_datepicker form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" name="end_date" onchange="year()" id="end_date"
                                    value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('to_date') ?>"
                                    class="fin_datepicker form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?> <i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="2" checked="checked" id="status">
                                    <?php echo display('active') ?>
                                </label>
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="0" id="status">
                                    <?php echo display('inactive') ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="submit"
                                class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                            <span id="finsubmit"
                                class="btn btn-success w-md m-b-5" hidden><?php echo display('update') ?></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="" id="finid">
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <?php if($this->permission->method('room_reservation','create')->access()): ?>
            <div class="card-header">
                <h4><?php echo "Financial Year list"; ?></h4>
            </div>
            <div class="row">
                <!--  table area -->
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" id="exdatatable"
                                class="datatable table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('sl_no') ?></th>
                                        <th><?php echo display('title') ?></th>
                                        <th><?php echo display('from_date') ?></th>
                                        <th><?php echo display('to_date') ?></th>
                                        <th><?php echo display('status') ?></th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($yearlist)) {
                            ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($yearlist as $list) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td id="title_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->title); ?></td>
                                        <td id="start_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->start_date); ?></td>
                                        <td id="end_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->end_date); ?></td>
                                        <td id="status_<?php echo html_escape($list->fiyear_id); ?>"><?php if($list->is_active==1){echo "Ended";}else if($list->is_active==2){echo display("active");}else{echo display("inactive");} ?></td>
                                        <?php if($list->is_active!=1){?>
                                        <td class="center">
                                            <?php if ($this->permission->method('accounts', 'update')->access()) : ?>
                                            <a onclick="editfinyear('<?php echo html_escape($list->fiyear_id); ?>')"
                                                class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                                title="Update"><i class="ti-pencil-alt text-white"
                                                    aria-hidden="true"></i></a>
                                            <?php endif;
                                            if ($this->permission->method('accounts', 'delete')->access()) : ?>
                                            <a href="<?php echo base_url("accounts/accounts/finyear_delete/" . html_escape($list->fiyear_id)) ?>"
                                                onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                                class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                        <?php }else{ ?>
                                            <td colspan="2"></td>
                                        <?php } ?>
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
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/financial_year.js"></script>