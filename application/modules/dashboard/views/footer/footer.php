<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><?php echo display("terms_and_privacy") ?></h6>    
            </div>
            <div class="card-body">
                <!-- language -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="5%"><i class="fa fa-th-list"></i></th>
                                <th width="25%"><?php echo display('title'); ?></th>
                                <th width="25%"><?php echo display('name'); ?></th>
                                <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($team_title)) { ?>
                            <?php $sl = 1 ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($team_title->widget_name); ?></td>
                                <td><?php echo html_escape($team_title->widget_title); ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                        onclick="footertitle_edit('<?php echo html_escape($team_title->widgetid); ?>')"
                                        class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            <?php $sl = 2 ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($team_title1->widget_name); ?></td>
                                <td><?php echo html_escape($team_title1->widget_title); ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                        onclick="footertitle_edit('<?php echo html_escape($team_title1->widgetid); ?>')"
                                        class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
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
                <div class="modal fade" id="footer_info" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal_ttl"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" id="footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h6><?php echo display("social_link") ?></h6>    
            </div>
            <div class="card-body">
                <!-- language -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="5%"><i class="fa fa-th-list"></i></th>
                                <th width="25%"><?php echo display("name"); ?></th>
                                <th width="25%"><?php echo display("link_url"); ?></th>
                                <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($social)) { ?>
                            <?php $sl = 1 ?>
                                <?php foreach($social as $links){ ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($links->title); ?></td>
                                <td><?php echo html_escape($links->link1); ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                        onclick="social_edit('<?php echo html_escape($links->slid); ?>')"
                                        class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($social)) { ?>
                            <tr>
                                <th colspan="6" class="text-center text-danger">
                                    <?php echo display('record_not_found'); ?></th>
                            </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="footer_info" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal_ttl"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" id="footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="card-header">
                <h6><?php echo display("pages_title") ?></h6>    
            </div>
            <div class="card-body">
                <!-- language -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" language_list>
                        <thead>
                            <tr>
                                <th width="5%"><i class="fa fa-th-list"></i></th>
                                <th width="13%"><?php echo display("home"); ?></th>
                                <th width="13%"><?php echo display("about_us"); ?></th>
                                <th width="13%"><?php echo display("contact_us"); ?></th>
                                <th width="13%"><?php echo display("gallery"); ?></th>
                                <th width="13%"><?php echo display("room_list"); ?></th>
                                <th width="13%"><?php echo display("room_detail"); ?></th>
                                <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pagetitle)) { ?>
                            <?php $sl = 1 ?>
                                <?php foreach($pagetitle as $links){ ?>
                            <tr>
                                <td><?php echo $sl++ ?></td>
                                <td><?php echo html_escape($links->home); ?></td>
                                <td><?php echo html_escape($links->aboutus); ?></td>
                                <td><?php echo html_escape($links->contactus); ?></td>
                                <td><?php echo html_escape($links->gallery); ?></td>
                                <td><?php echo html_escape($links->roomlist); ?></td>
                                <td><?php echo html_escape($links->roomdetails); ?></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"
                                        onclick="page_title_edit('<?php echo html_escape($links->pageid ); ?>')"
                                        class="btn btn-primary custom_btn"><i class="ti-pencil-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <?php if (empty($pagetitle)) { ?>
                            <tr>
                                <th colspan="6" class="text-center text-danger">
                                    <?php echo display('record_not_found'); ?></th>
                            </tr>
                            <?php } ?>
                        </tfoot>
                    </table>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="footer_info" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title modal_ttl"></h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" id="footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>