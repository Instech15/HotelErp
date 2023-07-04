<div class="card">
    <div class="card-header">
        <h4><?php echo display('can_basicinfo_list') ?></h4>
    </div>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row">
                <!--  table area -->
                <div class="col-sm-12">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('Sl') ?></th>
                                        <th><?php echo display('name') ?></th>
                                        <th><?php echo display('can_id') ?></th>
                                        <th><?php echo display('picture') ?></th>
                                        <th><?php echo display('email') ?></th>
                                        <th><?php echo display('ssn') ?></th>
                                        <th><?php echo display('phone') ?></th>
                                        <th><?php echo display('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($caninfo)) { ?>
                                        <?php $sl = 1; ?>
                                        <?php foreach ($caninfo as $que) { ?>
                                            <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                                <td><?php echo html_escape($que->can_id); ?></td>
                                                <td>
                                                    <?php echo "<img src='" . base_url() . (!empty($que->picture) ? $que->picture : 'assets/img/hrm/manage_candidate.png') . "' width=60px; height=60px; class=img-circle>"; ?>
                                                </td>
                                                <td><?php echo html_escape($que->email); ?></td>
                                                <td><?php echo html_escape($que->ssn); ?></td>
                                                <td><?php echo html_escape($que->phone); ?></td>
                                                <td class="center">
                                                    <?php if ($this->permission->method('hrm', 'update')->access()) : ?>
                                                        <a href="<?php echo base_url("hrm/Candidate/update_canifo_form/$que->can_id") ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                                    <?php endif; ?>

                                                    <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                                        <a href="<?php echo base_url("hrm/Candidate/delete_canInfo/" . html_escape($que->can_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
                                                    <?php endif; ?>
                                                    <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
                                                        <a href="<?php echo base_url("hrm/Candidate/cv/" . html_escape($que->can_id)); ?>" class="btn  btn-xs btn-primary"> <i class="ti-eye"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php $sl++; ?>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>