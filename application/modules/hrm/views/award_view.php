<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card">
            <div class="card-header">
                <h4><?php echo display('manage_award') ?><h4>
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('sl') ?></th>
                            <th><?php echo display('award_name') ?></th>
                            <th><?php echo display('aw_description') ?></th>
                            <th><?php echo display('awr_gift_item') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('employee_name') ?></th>
                            <th><?php echo display('awarded_by') ?></th>
                            <th><?php echo display('action') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mang)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($mang as $row) { ?>
                                <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($row->award_name); ?></td>
                                    <td><?php $text = $row->aw_description;






                                        $pieces = substr($text, 0, 20);
                                        $ps = substr($pieces, 0, 16) . "...";

                                        $cn = strlen($text);

                                        if ($cn > 20) {
                                            echo $ps;
                                        } else {
                                            echo $text;
                                        }


                                        ?></td>
                                    <td><?php echo html_escape($row->awr_gift_item); ?></td>

                                    <td><?php echo html_escape($row->date); ?></td>
                                    <td><?php echo html_escape($row->first_name . ' ' . $row->last_name); ?></td>
                                    <td><?php echo html_escape($row->awarded_by); ?></td>

                                    <td class="center">

                                        <?php if ($this->permission->method('hrm', 'update')->access()) : ?>
                                            <a href="<?php echo base_url("hrm/award-update/" . html_escape($row->award_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>
                                        <?php endif; ?>

                                        <?php if ($this->permission->method('hrm', 'delete')->access()) : ?>
                                            <a href="<?php echo base_url("hrm/award-delete/" . html_escape($row->award_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-close"></i></a>
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