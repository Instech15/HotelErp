<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('manage_interview') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo display('sl') ?></th>
                                <th><?php echo display('name') ?>
                                <th><?php echo display('can_id') ?></th>
                                <th><?php echo display('job_adv_id') ?></th>
                                <th><?php echo display('interview_date') ?></th>
                                <th><?php echo display('interviewer_id') ?></th>
                                <th><?php echo display('interview_marks') ?></th>
                                <th><?php echo display('written_total_marks') ?></th>
                                <th><?php echo display('mcq_total_marks') ?></th>
                                <th><?php echo display('total_marks') ?></th>
                                <th><?php echo display('recommandation') ?></th>
                                <th><?php echo display('selection') ?></th>
                                <th><?php echo display('details') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($interview)) { ?>
                                <?php $sl = 1; ?>
                                <?php foreach ($interview as $que) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                        <td><?php echo html_escape($que->can_id); ?></td>
                                        <td><?php echo html_escape($que->position_name); ?></td>
                                        <td><?php echo html_escape($que->interview_date); ?></td>
                                        <td><?php echo html_escape($que->interviewer_id); ?></td>
                                        <td><?php echo html_escape($que->interview_marks); ?></td>
                                        <td><?php echo html_escape($que->written_total_marks); ?></td>
                                        <td><?php echo html_escape($que->mcq_total_marks); ?></td>
                                        <td><?php echo html_escape($que->total_marks); ?></td>
                                        <td><?php echo html_escape($que->recommandation); ?></td>
                                        <td><?php echo html_escape($que->selection); ?></td>
                                        <td><?php echo html_escape($que->details); ?></td>

                                        <td class="center">
                                            <?php if ($this->permission->method('hrm', 'update')->access()) : ?>
                                                <a href="<?php echo html_escape(base_url("hrm/interview-update/$que->can_int_id")) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                            <?php endif; ?>

                                            <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                                <a href="<?php echo html_escape(base_url("hrm/interview-delete/$que->can_int_id")) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
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