<div class="card">
    <?php if ($this->permission->method('room_setting', 'create')->access()) : ?>
    <div class="card-header">
        <h4><?php echo display('room_list') ?> <small class="float-right">
                <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i
                        class="ti-plus" aria-hidden="true"></i>
                    <?php echo display('add_new') ?></button>&nbsp;<a
                    href="<?php echo base_url("room_setting/assign-room") ?>"
                    class="btn btn-primary btn-md mb-2"><?php echo display('assign_room') ?></a>&nbsp;<a
                    href="<?php echo base_url("room_setting/assign-room-offer") ?>"
                    class="btn btn-primary btn-md mb-2"><?php echo display('assign_roomoffer') ?></a>&nbsp;<a
                    href="<?php echo base_url("room_setting/assign-room-facilities") ?>"
                    class="btn btn-primary btn-md mb-2"><?php echo display('assign_facilities') ?></a></small></h4>
    </div>
    <?php endif; ?>
    <div id="add0" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('add_new'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <?php echo form_open('room_setting/room_details/create'); ?>
                                    <?php echo form_hidden('roomid', (!empty($intinfo->roomid) ? $intinfo->roomid : null)) ?>
                                    <div class="form-group row">
                                        <label for="roomtype"
                                            class="col-sm-4 col-form-label"><?php echo display('room_name') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="roomtype" autocomplete="off" class="form-control" type="text"
                                                placeholder="<?php echo display('room_name') ?>" id="roomtype" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="capacity"
                                            class="col-sm-4 col-form-label"><?php echo display('capacity') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="capacity" autocomplete="off" class="form-control" type="number"
                                                placeholder="<?php echo display('capacity') ?>" id="capacity" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="capacity"
                                            class="col-sm-4 col-form-label"><?php echo display("extra_capability") ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">

                                            <select name="exbedcapability" class="selectpicker form-control"
                                                data-live-search="true" id="capabiliity">
                                                <option value="1"><?php echo display('yes');?></option>
                                                <option value="0"><?php echo display('no');?></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="defaultrate"
                                            class="col-sm-4 col-form-label"><?php echo display('defaultrate') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="defaultrate" autocomplete="off" class="form-control"
                                                type="number" placeholder="<?php echo display('defaultrate') ?>"
                                                id="defaultrate" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bedcharge"
                                            class="col-sm-4 col-form-label"><?php echo display("bed_charge") ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="bedcharge" autocomplete="off" class="form-control"
                                                type="number" placeholder="<?php echo display("bed_charge") ?>"
                                                id="bedcharge" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="personcharge"
                                            class="col-sm-4 col-form-label"><?php echo display('person_charge') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input name="personcharge" autocomplete="off" class="form-control"
                                                type="number" placeholder="<?php echo display('person_charge') ?>"
                                                id="personcharge" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="roomsize"
                                            class="col-sm-4 col-form-label"><?php echo display('roomsize') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input name="roomsize" autocomplete="off" class="form-control" type="number"
                                                placeholder="<?php echo display('roomsize') ?>" id="roomsize" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_dropdown('size_unit', $allsizes, '', 'class="selectpicker form-control" data-live-search="true" id="size_unit"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bedsno"
                                            class="col-sm-4 col-form-label"><?php echo display('bedsno') ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <select name="bedsno" class="selectpicker form-control"
                                                data-live-search="true" id="bedsno">
                                                <option value="" selected="selected">
                                                    <?php echo display('select_bed_no') ?></option>
                                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_dropdown('bedstype', $allbeds, '', 'class="selectpicker form-control" data-live-search="true" id="bedstype"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number_of_star"
                                            class="col-sm-4 col-form-label"><?php echo display('review') ?> </label>
                                        <div class="col-sm-8">
                                            <input name="number_of_star" class="form-control" type="number"
                                                placeholder="<?php echo display('number_of_star') ?>"
                                                id="number_of_star" onkeyup="starcheck()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="roomdescription"
                                            class="col-sm-4 col-form-label"><?php echo display('roomdescription') ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <textarea name="roomdescription" cols="35" rows="3"
                                                placeholder="<?php echo display('roomdescription') ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="reservecondition"
                                            class="col-sm-4 col-form-label"><?php echo display('reserve_condition') ?>
                                            <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <textarea name="reservecondition" cols="35" rows="3"
                                                placeholder="<?php echo display('reserve_condition') ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="reset"
                                            class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                        <button type="submit"
                                            class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
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
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><?php echo display('update'); ?></strong>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body editinfo">

                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
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
                                <th><?php echo display('room_name') ?></th>
                                <th><?php echo display('defaultrate') ?></th>
                                <th><?php echo display("bed_charge") ?></th>
                                <th><?php echo display('person_charge') ?></th>
                                <th><?php echo display('capacity') ?></th>
                                <th><?php echo display("extra_capability") ?></th>
                                <th><?php echo display('room_size') ?></th>
                                <th><?php echo display('bedsno') ?></th>
                                <th><?php echo display('bedstype') ?></th>
                                <th><?php echo display('review') ?></th>
                                <th><?php echo display('action') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($rateplanlist)) {
                            ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($rateplanlist as $rateplan) { ?>
                            <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                <td><?php echo $sl; ?></td>
                                <td><?php echo html_escape($rateplan->roomtype); ?></td>
                                <td><?php echo html_escape($rateplan->rate); ?></td>
                                <td><?php echo html_escape($rateplan->bedcharge); ?></td>
                                <td><?php echo html_escape($rateplan->personcharge); ?></td>
                                <td><?php echo html_escape($rateplan->capacity); ?></td>
                                <td><?php if( html_escape($rateplan->exbedcapability)==1){echo display("yes");}else{echo display("no");} ?>
                                </td>
                                <td><?php echo html_escape($rateplan->roomsize . " " . $rateplan->roommesurementitle); ?>
                                </td>
                                <td><?php echo html_escape($rateplan->bedsno); ?></td>
                                <td><?php echo html_escape($rateplan->bedstypetitle); ?></td>
                                <td><?php for ($i = 1; $i <= $rateplan->number_of_star; $i++) {
                                                echo "<span class='ti-star star_colour'></span>";
                                            } ?>
                                </td>
                                <td class="center">
                                    <?php if ($this->permission->method('room_setting', 'update')->access()) : ?>
                                    <input name="url" type="hidden"
                                        id="url_<?php echo html_escape($rateplan->roomid); ?>"
                                        value="<?php echo base_url("room_setting/room_details/updateintfrm") ?>" />
                                    <a onclick="editinforoom('<?php echo html_escape($rateplan->roomid); ?>')"
                                        class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                        title="Update"><i class="ti-pencil-alt text-white" aria-hidden="true"></i></a>
                                    <?php endif;
                                            if ($this->permission->method('room_setting', 'delete')->access()) : ?>
                                    <a href="<?php echo base_url("room_setting/room-delete/" . html_escape($rateplan->roomid)) ?>"
                                        onclick="return confirm('<?php echo display("are_you_sure") ?>')"
                                        class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right"
                                        title="Delete "><i class="ti-trash"></i></a>
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
<script src="<?php echo MOD_URL . $module; ?>/assets/js/star.js"></script>