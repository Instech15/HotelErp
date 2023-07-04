<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('attendance_list') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover example">
                        <thead>
                            <tr>
                                <th><?php echo display('Sl') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('date') ?></th>
                                <th><?php echo display('checkin') ?></th>
                                <th><?php echo display('checkout') ?></th>
                                <th><?php echo display('stay') ?></th>
                                <th><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($addressbook)) { ?>

                                <?php $sl = 1; ?>
                                <?php foreach ($addressbook as $row) : ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo html_escape($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td><?php echo html_escape($row['date']); ?></td>
                                        <td><?php echo html_escape($row['sign_in']); ?></td>
                                        <td><?php echo html_escape($row['sign_out']); ?></td>
                                        <td><?php echo html_escape($row['staytime']); ?></td>
                                        <td class="center">

                                            <?php if ($this->permission->method('hrm', 'update')->access()) : ?>

                                                <a href="<?php echo html_escape(base_url("hrm/attendance-update/" . $row['att_id'])) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>

                                            <?php endif; ?>

                                            <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                                <a href="<?php echo html_escape(base_url("hrm/attendance-delete/" . $row['att_id'])) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-close" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $sl++; ?>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>