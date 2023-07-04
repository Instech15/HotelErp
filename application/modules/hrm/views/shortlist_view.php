<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('manage_shortlist') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('can_id') ?></th>
                                <th><?php echo display('job_adv_id') ?></th>
                                <th><?php echo display('date_of_shortlist') ?></th>
                                <th><?php echo display('interview_date') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($shortlist)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($shortlist as $que) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                        <td><?php echo html_escape($que->can_id); ?></td>
                                        <td><?php echo html_escape($que->position_name); ?></td>
                                        <td><?php echo html_escape($que->date_of_shortlist); ?></td>
                                        <td><?php echo html_escape($que->interview_date); ?></td>


                                        <td class="center">
                                            <a href="<?php echo base_url("hrm/shortlist-update/" . html_escape($que->can_short_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                            <a href="<?php echo base_url("hrm/shortlist-delete/" . html_escape($que->can_short_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
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