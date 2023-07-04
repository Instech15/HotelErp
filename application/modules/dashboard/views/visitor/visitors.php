<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><?php echo display("visitors_count"); ?></h6>
            </div>
            <div class="card-body">
                <!-- language -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="5%"><i class="fa fa-th-list"></i></th>
                                <th width="35%"><?php echo display("number"); ?></th>
                                <th width="25%"><?php echo display('description'); ?></th>
                                <th width="35%"><?php echo display("increment"); ?></th>
                                <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($team_title)) { ?>
                            <?php $sl = 1 ?>
                            <?php foreach($team_title as $value){ ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($value->title); ?></td>
                                <td><?php echo html_escape($value->subtitle); ?></td>
                                <td><?php echo html_escape($value->link1); ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                        onclick="visitors_edit('<?php echo html_escape($value->slid); ?>')"
                                        class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($team_title)) { ?>
                            <tr>
                                <th colspan="6" class="text-center text-danger">
                                    <?php echo display('record_not_found'); ?></th>
                            </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="visitor_info" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal_ttl"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" id="visitor">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>