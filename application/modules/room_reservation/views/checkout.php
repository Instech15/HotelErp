
<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">
<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/checkoutview.css">
<div class="form-group row">
    <div class="invalid-feedback" id="cmsg" hidden></div>
    <label class="col-3 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-form-label text-right font-weight-600"><?php echo display("room_no") ?> :</label>
    <div class="col-6 col-sm-6 col-md-6 col-lg-5 col-xl-4">
        <div class="SumoSelect" tabindex="0" role="button" aria-expanded="false">
            <select multiple="multiple" class="testselect2 SumoUnder" tabindex="-1" id="chroomno">
                <?php foreach($checkinrooms as $rooms){ ?>
                <option value="<?php echo html_escape($rooms->bookedid); ?>"><?php echo html_escape($rooms->room_no)." - "; ?> <?php echo html_escape($rooms->firstname); ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-3 col-sm-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
        <button type="button" disabled onclick="checkoutinfo()" class="btn btn-success" id="go"><?php echo display("go") ?></button>
    </div>
</div>
<div id="checkoutdetail">
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/custom.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/checkout.js"></script>