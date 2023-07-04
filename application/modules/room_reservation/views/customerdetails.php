<table class="table table-sm table-borderless mb-0">
    <tbody>
        <tr>
            <th class="pl-0" width="150"><?php echo display("name") ?></th>
            <td><strong id="inname"><?php echo html_escape($bookingdata->firstname) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("room_no") ?>.</th>
            <td><strong><?php echo html_escape($bookingdata->room_no) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("booking_no") ?>.</th>
            <td><strong id="inbknumber"><?php echo html_escape($bookingdata->booking_number) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("email_id") ?></th>
            <td><strong id="inemail"><?php echo html_escape($bookingdata->email) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("mobile_no") ?></th>
            <td><strong id="inmobile"><?php echo html_escape($bookingdata->cust_phone) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("address") ?></th>
            <td><strong><?php echo html_escape($bookingdata->address) ?></strong></td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("time_format") ?></th>
            <td><strong>24hrs</strong></td>
        </tr>
        <?php $bookingts = $this->db->select("booking_type,booking_sourse")->from("tbl_booking_type_info")->where("btypeinfoid",$bookingdata->booking_source)->get()->row(); ?>
        <?php if(!empty($bookingts)){ ?>
        <tr>
            <th class="pl-0"><?php echo display("booking_type") ?></th>
            <td>
                <div class="form-floating with-icon">
                    <input type="text" class="form-control" readonly placeholder="<?php echo display("booking_type") ?>"
                        value="<?php echo html_escape($bookingts->booking_type) ?>">
                </div>
            </td>
        </tr>
        <tr>
            <th class="pl-0"><?php echo display("booking_source") ?></th>
            <td>
                <div class="form-floating with-icon">
                    <input type="text" class="form-control" readonly placeholder="<?php echo display("booking_source") ?>"
                        value="<?php echo html_escape($bookingts->booking_sourse) ?>">
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>