<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">
<div id="reservation">
    <div class="card mb-4">
        <div class="card-header py-2 ">
            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('check_in_details') ?><span id="msg"
                    class="red-message"></span><small class="float-right"><a href="#" id="view_checin"
                        class="btn btn-primary btn-sm"><i class="ti-plus" aria-hidden="true"></i>
                        <?php echo display('booking_list')?></a></small></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('checkin') ?><span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" name="datefilter" class="form-control datefilter" id="datefilter1"
                                placeholder="mm/dd/yyyy --:-- --"
                                value="<?php echo html_escape($bookingdata->checkindate); ?>" />
                            <label class="fas fa-calendar-alt"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('checkout') ?> <span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" name="datefilter" class="form-control datefilter" id="datefilter2"
                                placeholder="mm/dd/yyyy --:-- --"
                                value="<?php echo html_escape($bookingdata->checkoutdate); ?>" />
                            <label class="fas fa-calendar-alt"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('arrival_from') ?></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="arrival_from"
                                placeholder="<?php echo display('arrival_from') ?>"
                                value="<?php echo html_escape($bookingdata->arival_from); ?>">
                            <label class="fas fa-plane-arrival"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('booking_type') ?></label>
                        <div class="icon-addon addon-md input-left-icon">
                            <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                                onchange="getbsource()" id="booking_type">
                                <option value="" selected>Choose <?php echo display('booking_type') ?></option>
                                <?php foreach($bookingtype as $btype){ ?>
                                <option <?php if($btype->booktypeid==$bookingdata->booking_type){ echo 'selected';} ?>
                                    value="<?php echo html_escape($btype->booktypeid); ?>">
                                    <?php echo html_escape($btype->booktypetitle);?></option>
                                <?php } ?>
                            </select>
                            <label class="fas fa-hotel"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1">Choose <?php echo display('booking_reference') ?></label>
                        <div class="icon-addon addon-md input-left-icon">
                            <select class="selectpicker form-select" data-live-search="true" data-width="100%" disabled
                                id="booking_source">
                                <option value="" selected>Choose <?php echo display('booking_reference') ?></option>
                                <?php foreach($bookingsource as $btype){ ?>
                                <option
                                    <?php if($btype->btypeinfoid==$bookingdata->booking_source){ echo 'selected';} ?>
                                    value="<?php echo html_escape($btype->btypeinfoid); ?>">
                                    <?php echo html_escape($btype->booking_sourse);?></option>
                                <?php } ?>
                            </select>
                            <label class="fas fa-hotel"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('booking_reference_no') ?></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="bsorurce_no"
                                placeholder="<?php echo display('booking_reference_no') ?>."
                                value="<?php echo html_escape($bookingdata->booking_source_no); ?>">
                            <label class="fas fa-sort-numeric-up-alt"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('purpose_of_visit') ?></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="pof_visit"
                                placeholder="<?php echo display('purpose_of_visit') ?>"
                                value="<?php echo html_escape($bookingdata->purpose); ?>">
                            <label class="fas fa-eye"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display('remarks') ?></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="booking_remarks"
                                placeholder="<?php echo display('remarks') ?>"
                                value="<?php echo html_escape($bookingdata->remarks); ?>">
                            <label class="fas fa-comment-dots"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('room_detail') ?></h6>
        </div>
        <input type="hidden" id="bookingid" value="<?php echo html_escape($bookingdata->bookedid); ?>">
        <?php $roomtype = explode(",",$bookingdata->roomid);
        $roomno = explode(",",$bookingdata->room_no);
        $nofpeople = explode(",",$bookingdata->nuofpeople);
        $children = explode(",",$bookingdata->children);
        $extracheckin = explode(",",$bookingdata->extracheckin);
        $extracheckout = explode(",",$bookingdata->extracheckout);
        $roomrate = explode(",",$bookingdata->roomrate);
        $totalamount = 0;
        $taxPercent = 0;
        $scharge = 0;
        for($tm=0; $tm<count($roomrate); $tm++){
            $totalamount+=$roomrate[$tm];
        }
        $taxPercent = 0;
        if(!empty($taxsetting)){
            foreach($taxsetting as $tax){
                $taxPercent += $tax->rate;
            }
        }
        if($taxPercent>0){
            $taxPercent = round(($totalamount*$taxPercent)/100);
        }
        if($setting->servicecharge>0){
            $scharge = round(($totalamount*$setting->servicecharge)/100);
        }
        $bcharge = round($totalamount);
        $totalamount = round($totalamount+$taxPercent+$scharge);
        $totaldatediff = strtotime($bookingdata->checkoutdate) - strtotime($bookingdata->checkindate);
        $totaldays = ceil($totaldatediff / (60 * 60 * 24));
        $extrabed = explode(",",$bookingdata->extrabed);
        $extraperson = explode(",",$bookingdata->extraperson);
        $extrachild = explode(",",$bookingdata->extrachild);
        $compname = explode(",",$bookingdata->complementary);
        $compprice = explode(",",$bookingdata->complementaryprice);
        $offer = explode(",",$bookingdata->offer_discount);
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered white-space-nowrap mb-0 room-list">
                    <?php for($r=-1; $r<count($roomtype)-1; $r++) { ?>
                    <tbody>
                        <tr>
                            <th colspan="2"><?php echo display('room_info') ?></th>
                            <th><?php echo display('action') ?></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1"><?php echo display('roomtype') ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <select class="selectpicker form-select" data-live-search="true"
                                                            data-width="100%" onchange="getroomnos(<?php echo $r; ?>)"
                                                            id="room_type<?php echo $r;?>">
                                                            <option value="" selected>Choose
                                                                <?php echo display('roomtype') ?></option>
                                                            <?php foreach($roomdetails as $btype){ ?>
                                                            <option
                                                                <?php if($btype->roomid==$roomtype[$r+1]){echo 'selected';} ?>
                                                                value="<?php echo html_escape($btype->roomid); ?>">
                                                                <?php echo html_escape($btype->roomtype);?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label class="fas fa-sort-amount-down"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label class="font-weight-600 mb-1"><?php echo display('room_no') ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <select name=roomno[] class="selectpicker form-select"
                                                            data-live-search="true" data-width="100%"
                                                            onchange="getcapcitys(<?php echo $r; ?>)" disabled
                                                            id="roomno<?php echo $r; ?>">
                                                            <option value="" selected>Choose
                                                                <?php echo display('room_no') ?></option>
                                                            <option value="<?php echo html_escape($roomno[$r+1]);?>"
                                                                selected><?php echo html_escape($roomno[$r+1]);?>
                                                            </option>
                                                        </select>
                                                        <label class="fas fa-sort-numeric-down"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1">#<?php echo display('adults') ?></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <input type="number" min="1" disabled class="form-control"
                                                            id="adults<?php echo $r; ?>"
                                                            value="<?php echo html_escape($nofpeople[$r+1]);?>"
                                                            placeholder="<?php echo display('adults') ?>">
                                                        <label class="fas fa-restroom"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1">#<?php echo display('children') ?></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <input type="number" disabled min="0" class="form-control"
                                                            id="children<?php echo $r; ?>"
                                                            placeholder="<?php echo display('children') ?>"
                                                            value="<?php echo html_escape($children[$r+1]);?>">
                                                        <label class="fas fa-child"></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3" class="text-center">
                                <button type="button" onclick="rdel(<?php echo $r; ?>)"
                                    class="btn btn-danger btn-sm rdel<?php echo $r; ?>"><i
                                        class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><?php echo display('occupant_info') ?></span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle no-caret" type="button"
                                            <?php if($r!=-1){echo 'hidden ';} ?>id="custdetailbtn<?php echo $r; ?>"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal"><?php echo display('new_customer') ?></a>
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal2"><?php echo display('old_customer') ?></a>
                                        </div>
                                    </div>
                                </div>

            </div>
            </th>
            <th><?php echo display('rent_info') ?></th>
            </tr>
            <tr>
                <td>
                    <table class="table table-borderless customerdetail<?php echo $r; ?>">
                        <thead>
                            <tr>
                                <th class="pl-0" width="20"><?php echo display('sl') ?></th>
                                <th><?php echo display('name') ?></th>
                                <th><?php echo display('mobile_no') ?>.</th>
                                <th class="text-right pr-0"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="border-0 pl-0">
                                    <div class="custom-control custom-radio"><input type="radio"
                                            <?php if($r==-1) echo 'checked'; ?> onclick="getradio(<?php echo 0; ?>)"
                                            id="pri<?php echo 0; ?>" name="customRadio"
                                            class="custom-control-input"><label class="custom-control-label"
                                            for="pri<?php echo 0; ?>"></label>
                                    </div>
                                </th>
                                <td class="border-0" id="userid<?php echo 0; ?>" hidden>
                                    <?php echo html_escape($custdata[0]->customerid); ?></td>
                                <td class="border-0" id="username<?php echo 0; ?>">
                                    <?php echo html_escape($custdata[0]->firstname); ?></td>
                                <td class="border-0" id="usermobile<?php echo 0; ?>">
                                    <?php echo html_escape($custdata[0]->cust_phone); ?></td>
                                <td class="border-0 pr-0 text-right">
                                    <button type="button" onclick="custdel(<?php echo 0; ?>)"
                                        class="btn btn-danger-soft btn-xs custdelete<?php echo 0; ?>"
                                        id="custdel<?php echo 0; ?>"><i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                                        $customer = explode(",",$bookingdata->full_guest_name);
                                        for($c=0;$c<count($guestdata);$c++){
                                        ?>
                            <tr>
                                <?php if(empty($guestdata[$c]->customerid)){ ?>
                                <th class="border-0 pl-0">
                                    <div class="custom-control custom-radio"><input type="radio"
                                            onclick="getradio(<?php echo $c+1; ?>)" id="pri<?php echo $c+1; ?>"
                                            name="customRadio" class="custom-control-input"><label
                                            class="custom-control-label" for="pri<?php echo $c+1; ?>"></label>
                                    </div>
                                </th>
                                <td class="border-0" id="username<?php echo $c+1; ?>">
                                    <?php echo html_escape($guestdata[$c]->guestname); ?></td>
                                <td class="border-0" id="usermobile<?php echo $c+1; ?>">
                                    <?php echo html_escape($guestdata[$c]->mobile); ?></td>
                                <td class="border-0 pr-0 text-right">
                                    <button type="button" onclick="custdel(<?php echo $c+1; ?>)"
                                        class="btn btn-danger-soft btn-xs custdelete<?php echo $c+1; ?>"
                                        id="custdel<?php echo $c+1; ?>"><i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                                <?php }else{ ?>
                                <?php $oldcustomer = $this->db->select("customerid,firstname,cust_phone")->from("customerinfo")->where("customerid",$guestdata[$c]->customerid)->get()->row(); ?>
                                <th class="border-0 pl-0">
                                    <div class="custom-control custom-radio"><input type="radio"
                                            onclick="getradio(<?php echo $c+1; ?>)" id="pri<?php echo $c+1; ?>"
                                            name="customRadio" class="custom-control-input"><label
                                            class="custom-control-label" for="pri<?php echo $c+1; ?>"></label>
                                    </div>
                                </th>
                                <td class="border-0" id="userid<?php echo $c+1; ?>" hidden>
                                    <?php echo html_escape($oldcustomer->customerid); ?></td>
                                <td class="border-0" id="username<?php echo $c+1; ?>">
                                    <?php echo html_escape($oldcustomer->firstname); ?></td>
                                <td class="border-0" id="usermobile<?php echo $c+1; ?>">
                                    <?php echo html_escape($oldcustomer->cust_phone); ?></td>
                                <td class="border-0 pr-0 text-right">
                                    <button type="button" onclick="custdel(<?php echo $c+1; ?>)"
                                        class="btn btn-danger-soft btn-xs custdelete<?php echo $c+1; ?>"
                                        id="custdel<?php echo $c+1; ?>"><i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="table table-borderless mb-0 order-list">
                        <tbody>
                            <tr>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1"><?php echo display('checkin') ?></label>
                                        <div class="icon-addon addon-md">
                                            <input type="text" disabled class="form-control form-control datefilter3"
                                                id="from_date1<?php echo $r; ?>" placeholder="mm/dd/yyyy"
                                                value="<?php echo html_escape($extracheckin[$r+1]);?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1"><?php echo display('checkout') ?></label>
                                        <div class="icon-addon addon-md">
                                            <input type="text" disabled class="form-control form-control datefilter4"
                                                id="to_date1<?php echo $r; ?>" placeholder="mm/dd/yyyy"
                                                value="<?php echo html_escape($extracheckout[$r+1]);?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1"><?php echo display('rent') ?>
                                        </label>
                                        <div class="icon-addon addon-md">
                                            <input type="number" disabled class="form-control form-control"
                                                id="rent<?php echo $r; ?>"
                                                value="<?php echo html_escape($roomrate[$r+1]*$totaldays);?>">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1">
                                        </label>
                                        <div class="d-flex"><span class="p-2"><del class="text-danger"
                                                    id="offer_price<?php echo $r; ?>"><?php echo (!empty($offer[$r+1]) ? html_escape(number_format($offer[$r+1], 2, '.', ',')) : ''); ?>
</del></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="p-0">
                    <table class="table table-borderless mb-0 bg-light">
                        <tbody>
                            <tr>
                                <td class="border-0">
                                    <input type="text" class="form-control ex-room datefilter3"
                                        id="from_date2<?php echo $r; ?>" placeholder="yyyy/mm/dd"
                                        value="<?php echo html_escape($extracheckin[$r+1]);?>">
                                </td>
                                <td class="border-0">
                                    <input type="text" class="form-control ex-room datefilter4"
                                        id="to_date2<?php echo $r; ?>" placeholder="yyyy/mm/dd"
                                        value="<?php echo html_escape($extracheckout[$r+1]);?>">
                                </td>
                                <?php 
                                                $price = $this->db->select("bedcharge,personcharge")->from("roomdetails")->where("roomid",$roomtype[$r+1])->get()->row();
                                            ?>
                                <td class="border-0">
                                    <input type="number" min="0" onchange="bedprices(<?php echo $r; ?>)"
                                        class="form-control ex-room" id="bed<?php echo $r; ?>"
                                        value="<?php echo (!empty($extrabed[$r+1])?html_escape($extrabed[$r+1]):"");?>"
                                        placeholder="<?php echo display('bed') ?>">
                                </td>
                                <td class="border-0">
                                    <input type="number" disabled class="form-control ex-room"
                                        id="amount1<?php echo $r; ?>"
                                        value="<?php echo (!empty($extrabed[$r+1]*$price->bedcharge)?html_escape($extrabed[$r+1]*$price->bedcharge):"");?>"
                                        placeholder="<?php echo display('amnt') ?>">
                                </td>
                                <td class="border-0">
                                    <input type="number" min="0" onchange="personprices(<?php echo $r; ?>)"
                                        class="form-control ex-room" id="person<?php echo $r; ?>"
                                        value="<?php echo (!empty($extraperson[$r+1])?html_escape($extraperson[$r+1]):"");?>"
                                        placeholder="<?php echo display('person') ?>">
                                </td>
                                <td class="border-0">
                                    <input type="number" disabled class="form-control ex-room"
                                        id="amount2<?php echo $r; ?>"
                                        value="<?php echo (!empty($extraperson[$r+1]*$price->personcharge)?html_escape($extraperson[$r+1]*$price->personcharge):"");?>"
                                        placeholder="<?php echo display('amnt') ?>">
                                </td>
                                <td class="border-0">
                                    <input type="number" min="0" onchange="childprices(<?php echo $r; ?>)"
                                        class="form-control ex-room" id="child1<?php echo $r; ?>"
                                        value="<?php echo (!empty($extrachild[$r+1])?html_escape($extrachild[$r+1]):"");?>"
                                        placeholder="<?php echo display('child') ?>">
                                </td>
                                <td class="border-0">
                                    <input type="number" disabled class="form-control ex-room"
                                        id="amount3<?php echo $r; ?>"
                                        value="<?php echo (!empty(round($extraperson[$r+1]*$price->personcharge/2))?html_escape(round($extraperson[$r+1]*$price->personcharge/2)):"");?>"
                                        placeholder="<?php echo display('amnt') ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="p-0">
                    <?php
                                $rtype = $this->db->select("roomtype")->from("roomdetails")->where("roomid",$roomtype[$r+1])->get()->row();
                                $complementarylist = $this->db->select("*")->from("tbl_complementary")->where("roomtype",$rtype->roomtype)->get()->result();
                                ?>
                    <table class="table table-borderless mb-0 bg-light">
                        <tbody>
                            <tr>
                                <td class="border-0">
                                    <select onmouseenter="getcomplementprice(<?php echo $r; ?>)" disabled
                                        name="complementary" class="selectpicker form-select" data-live-search="true"
                                        data-width="100%" id="complementary<?php echo $r; ?>">
                                        <option value="0" selected>Choose <?php echo display('complementary') ?>
                                        </option>
                                        <?php foreach($complementarylist as $rtype){ ?>

                                        <option
                                            <?php if(preg_replace('/[ \t]+/', '', preg_replace('/[\r\n]+/', "\n", $rtype->complementaryname))==preg_replace('/[ \t]+/', '', preg_replace('/[\r\n]+/', "\n", $compname[$r+1])) && preg_replace('/[ \t]+/', '', preg_replace('/[\r\n]+/', "\n", $rtype->rate))==preg_replace('/[ \t]+/', '', preg_replace('/[\r\n]+/', "\n", $compprice[$r+1]))){echo 'selected';} ?>
                                            value="<?php echo html_escape(round($rtype->rate)); ?>">
                                            <?php echo html_escape($rtype->complementaryname);?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="row">
                                        <span class="ml-4"
                                            id="compamount<?php echo $r; ?>"><?php if($compprice[$r+1]!=0){ echo html_escape($compprice[$r+1]);} ?></span>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <input type="number" disabled class="form-control form-control"
                                        id="nofroom<?php echo $r; ?>"
                                        value="<?php if($r!=-1){echo '';}else{echo html_escape(count($roomtype));} ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="text-center res-v-allign"><button type="button"
                        <?php if($r!=count($roomtype)-2){echo 'hidden';} ?>
                        class="btn btn-primary btn-sm newroom<?php echo $r; ?>" onclick="room(<?php echo $r; ?>)"
                        id="newroom<?php echo $r; ?>"><i class="fas fa-plus"></i></button></td>
            </tr>
            </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header py-3">
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('payment_details') ?> <span id="msg2"
                        class="red-message"></span>
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('discount_reason') ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" class="form-control" id="discountreason"
                                    value="<?php echo html_escape($bookingdata->discountreason); ?>"
                                    placeholder="<?php echo display('discount_reason') ?>">
                                <label class="fas fa-tags"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <div class="form-group mb-0">
                                    <label class="font-weight-600 mb-1"><?php echo display('discount_max') ?></label>
                                    <div class="icon-addon addon-md">
                                        <input type="number" disabled
                                            value="<?php 
    $discountPercentage = round(($bookingdata->discountamount * 100) / $totalamount);
    if ($discountPercentage > 0) {
        echo html_escape(number_format($discountPercentage, 2, '.', ','));
    }
?>
"
                                            class="form-control" id="discountrate"
                                            placeholder="<?php echo display('discount_max') ?>">
                                        <label class="fas fa-tags"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex align-items-center">
                                    <div class="ml-1">
                                        <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    </div>
                                    <input type="number" disabled class="form-control form-control" id="discountamount"
                                        value="<?php echo html_escape(round($bookingdata->discountamount)); ?>">
                                    <div class="ml-1">
                                        <?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('commission') ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" disabled class="form-control" id="commissionrate"
                                    value="<?php echo html_escape(round($bookingdata->commissionpersent)); ?>"
                                    placeholder="Commission rate">
                                <label class="fas fa-percent"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('commission_amt') ?>.</label>
                            <div class="icon-addon addon-md">
                                <i
                                    class=""><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?></i>
                                <input type="text" disabled class="form-control" id="commissionamount"
                                    value="<?php echo html_escape(round($bookingdata->commissionamount)); ?>"
                                    placeholder="<?php echo display('commission_amt') ?>">
                                <i
                                    class=""><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header py-3">
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo "Billing Details"; ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-0"><?php echo "Booking Charge" ?></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            
                            <label class="font-weight-600 mb-0" id="booking_charge"><?php echo number_format(round($bcharge),2,'.',','); ?></label>
                            
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-0"><?php echo "Tax" ?></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            
                            <label class="font-weight-600 mb-0" id="tax_charge"><?php echo number_format(round($taxPercent), 2,'.',','); ?></label>
                            
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-0"><?php echo "Service Charge" ?></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            
                            <label class="font-weight-600 mb-0" id="service_charge"><?php echo number_format(round($scharge), 2, '.', ','); ?></label>
                            
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-0"><b><?php echo "Total" ?></b></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            
                            <label class="font-weight-600 mb-0" id="total_charge"><?php echo html_escape(number_format(round($totalamount * $totaldays), 2, '.', ',')); ?></label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header py-3">
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('advance_details') ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('payment_mode') ?></label>
                            <div class="icon-addon addon-md input-left-icon">
                                <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                                    id="paymentmode">
                                    <option value="" selected>Choose <?php echo display('payment_mode') ?></option>
                                    <?php foreach($paymentdetails as $ptype){ ?>
                                    <option
                                        <?php if($ptype->payment_method==$bookingdata->payment_method){echo 'selected';} ?>
                                        value="<?php echo html_escape($ptype->payment_method) ?>">
                                        <?php echo html_escape($ptype->payment_method) ?></option>
                                    <?php } ?>
                                </select>
                                <label class="fas fa-credit-card"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('total_amount') ?></label>
                            <div class="icon-addon addon-md">
                                <i
                                    class=""><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?></i>
                                <input type="text" disabled class="form-control" id="totalamount"
                                    value="<?php echo html_escape(round($totalamount * $totaldays)); ?>
" placeholder="Total amount">
                                <i
                                    class=""><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3" id="carddiv" hidden>
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('account_number') ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" disabled class="form-control" id="cardno"
                                    value="<?php if($bookingdata->payment_method=="Bank Payment"){echo "Bank";} ?>"
                                    placeholder="Account number">
                                <label class="fas fa-credit-card"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3" id="bankdiv" hidden>
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('bank_name') ?></label>
                            <div class="icon-addon addon-md">
                                <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                                    id="bankname">
                                    <option value="bank" selected>Choose <?php echo display('bank_name') ?></option>
                                    <?php foreach($banklist as $list){ ?>
                                    <option value="<?php echo html_escape($list->HeadName); ?>">
                                        <?php echo html_escape($list->HeadName);?></option>
                                    <?php } ?>
                                </select>
                                <label class="fa fa-university"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('advance_remarks') ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" class="form-control" id="advanceremarks" disabled
                                    value="<?php echo html_escape($bookingdata->advance_remarks); ?>"
                                    placeholder="<?php echo display('advance_remarks') ?>">
                                <label class="fas fa-comments"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display('advance_amount') ?></label>
                            <div class="icon-addon addon-md">
                                <i
                                    class=""><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?></i>
                                <input type="number" disabled class="form-control" id="advanceamount"
                                    value="<?php echo html_escape(round($bookingdata->advance_amount)); ?>
"
                                    placeholder="<?php echo display('advance_amount') ?>">
                                <i
                                    class=""><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mt-3">
    <button type="button" class="btn btn-primary w-100p" onclick="newBooking()"
        id="bookingsave"><?php echo display("update") ?></button>
</div>
<!-- Occupant Details Modal -->
<div class="modal custom-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo display("occupant_details") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("guest_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><?php echo display("country_code") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="code"
                                                    placeholder="<?php echo display("country_code") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="mobileNo"><?php echo display("mobile_no") ?>.</label>
                                            <div class="icon-addon addon-md">
                                                <input type="number" class="form-control" id="mobileNo"
                                                    placeholder="<?php echo display("mobile_no") ?>.">
                                                <label class="fas fa-mobile"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><?php echo display("title") ?></label>
                                            <div class="icon-addon addon-md">
                                                <select class="form-select" id="title">
                                                    <option selected value="Mr">Mr</option>
                                                    <option value="Ms">Ms</option>
                                                    <option value="Mrs">Mrs.</option>
                                                    <option value="Dr">Dr</option>
                                                    <option value="Engineer">Engineer</option>
                                                </select>
                                                <label class="fas fa-meh"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="firstname"><?php echo display("first_name") ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="firstname"
                                                    placeholder="<?php echo display("first_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="lastname"><?php echo display("last_name") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="lastname"
                                                    placeholder="<?php echo display("last_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="fathername"><?php echo display("father_name") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="fathername"
                                                    placeholder="<?php echo display("father_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center mb-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="customRadioInline"
                                                class="custom-control-input" value="male">
                                            <label class="custom-control-label"
                                                for="male"><?php echo display("male") ?></label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="customRadioInline"
                                                class="custom-control-input" value="female">
                                            <label class="custom-control-label"
                                                for="female"><?php echo display("female") ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="occupation"><?php echo display("occupation") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="occupation"
                                                    placeholder="<?php echo display("occupation") ?>">
                                                <label class="fas fa-anchor"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="dob"><?php echo display("dob") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" autocomplete="off" name="datefilter2"
                                                    class="form-control datefilter2" id="dob" placeholder="mm/dd/yyyy"
                                                    value="" />
                                                <label class="fas fa-calendar-alt"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="anniversary"><?php echo display("anniversary") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" name="datefilter2" autocomplete="off"
                                                    class="form-control datefilter2" id="anniversary"
                                                    placeholder="mm/dd/yyyy" value="" />
                                                <label class="fas fa-calendar-alt"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="nationality"><?php echo display("nationality") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" name="datefilter2" class="form-control"
                                                    id="nationality" placeholder="<?php echo display("nationality") ?>"
                                                    value="" />
                                                <label class="fas fa-flag-usa"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="vip" value="vip" class="custom-control-input"
                                                id="vip">
                                            <label class="custom-control-label"
                                                for="vip"><?php echo display("vip") ?>?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("contact_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="contacttype"><?php echo display("contact_type") ?></label>
                                            <div class="icon-addon addon-md">
                                                <select class="form-select" id="contacttype">
                                                    <option selected value="">Choose
                                                        <?php echo display("contact_type") ?>
                                                    </option>
                                                    <option value="Home">Home</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Official">Official</option>
                                                    <option value="Business">Business</option>
                                                </select>
                                                <label class="fas fa-address-book"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="email"><?php echo display("email") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@email.com">
                                                <label class="fas fa-envelope"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("country") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="country" class="form-control" id="country"
                                                    placeholder="<?php echo display("country") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("state") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="state" class="form-control" id="state"
                                                    placeholder="<?php echo display("state") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("city") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="city" class="form-control" id="city"
                                                    placeholder="<?php echo display("city") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="zipcode"><?php echo display("zipcode") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="number" class="form-control" id="zipcode"
                                                    placeholder="<?php echo display("zipcode") ?>">
                                                <label class="fas fa-code-branch"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating with-icon">
                                            <textarea class="form-control"
                                                placeholder="<?php echo display("address") ?>" id="address"></textarea>
                                            <label for="address"><?php echo display("address") ?></label>
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4 mb-md-0">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("photo_id_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="pitype"><?php echo display("photo_id_type") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="pitype"
                                                    placeholder="<?php echo display("photo_id_type") ?>">
                                                <label class="fas fa-images"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="pid"><?php echo display("photo_id") ?> # <span
                                                    class="text-danger">*</span></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="pid"
                                                    placeholder="<?php echo display("photo_id") ?>">
                                                <label class="fas fa-images"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label><?php echo display("photo_id_upload") ?></label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgfront" onchange="fileValueOne(this)">
                                            <input type="hidden" id="imgffront">
                                            <label for="imgfront" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("front_side") ?></span>
                                                    <img id="image-preview"
                                                        src="<?php echo base_url()?>/assets/img/proof_icon.png" alt="">
                                                    <span id="filename"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgback" onchange="fileValuesTwo(this)">
                                            <input type="hidden" id="imgbback">
                                            <label for="imgback" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("back_side") ?></span>
                                                    <img id="image-preview2"
                                                        src="<?php echo base_url()?>assets/img/proof_icon.png" alt="">
                                                    <span id="filename2"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating with-icon">
                                            <textarea class="form-control" placeholder="Remarks"
                                                id="comments"></textarea>
                                            <i class="far fa-comment-dots"></i>
                                            <label for="comments"><?php echo display("comments") ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("guest_image") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgguest" onchange="fileValuesThree(this)">
                                            <input type="hidden" id="imggguest">
                                            <label for="imgguest" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("occupant_image") ?></span>
                                                    <img id="image-preview3"
                                                        src="<?php echo base_url()?>/assets/img/user.png" alt="">
                                                    <span id="filename3"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal"><?php echo display("close") ?></button>
                <button type="button" disabled class="btn btn-primary"
                    id="addcustomer"><?php echo display("ad") ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo display("old_customer") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-floating with-icon mb-3">
                    <input type="number" class="form-control" id="existmobile"
                        placeholder="<?php echo display("mobile_no") ?>" value="">
                    <label><?php echo display("mobile_no") ?></label>
                    <i class="fas fa-mobile"></i>
                </div>
                <ul id="searchResult"></ul>
                <div class="clear"></div>
                <div class="form-floating with-icon">
                    <input type="text" class="form-control" id="existname"
                        placeholder="<?php echo display("customer_name") ?>" disabled value="">
                    <input type="hidden" class="form-control" id="existcustid" placeholder="Customer Name" disabled
                        value="">
                    <label><?php echo display("customer") ?></label>
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="modal-footer py-2 px-4">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo display("close") ?></button>
                <button type="button" disabled id="addoldcustomer"
                    class="btn btn-primary"><?php echo display("ad") ?></button>
            </div>
        </div>
    </div>
</div>
</div>
<div id="roomtlist" hidden>
    <?php foreach($roomdetails as $btype){ ?>
    <option value="<?php echo html_escape($btype->roomid); ?>"><?php echo html_escape($btype->roomtype);?></option>
    <?php } ?>
</div>
<input type="hidden" id="alluser"><input type="hidden" id="allmobile"><input type="hidden" id="allemail"><input
    type="hidden" id="allpitype"><input type="hidden" id="alluserid">
<input type="hidden" id="alllastname"><input type="hidden" id="allgender"><input type="hidden" id="allfather"><input
    type="hidden" id="allpid">
<input type="hidden" id="alloccupation"><input type="hidden" id="alldob"><input type="hidden" id="allanniversary"><input
    type="hidden" id="allimgfront">
<input type="hidden" id="allnationality"><input type="hidden" id="allvip"><input type="hidden" id="allcomments"><input
    type="hidden" id="allimgback">
<input type="hidden" id="allimgguest"><input type="hidden" id="allcontacttype"><input type="hidden" id="allstate"><input
    type="hidden" id="allcity">
<input type="hidden" id="allzipcode"><input type="hidden" id="alladdress"><input type="hidden" id="allcountry">
<input type="hidden" id="intime"
    value="<?php echo date("Y-m-d"); ?> <?php echo html_escape($inouttime->checkintime); ?>">
<input type="hidden" id="outtime"
    value="<?php echo date("Y-m-d"); ?> <?php echo html_escape($inouttime->checkouttime); ?>">
<input type="hidden" id="finyear" value="<?php echo financial_year(); ?>"><input type="hidden" id="findate"
    value="<?php echo maxfindate(); ?>">
    <?php 
    $taxPercent = 0;
    if(!empty($taxsetting)){
        foreach($taxsetting as $tax){
            $taxPercent += $tax->rate;
        }
    }
    ?>
<input type="hidden" id="tax_percent" value="<?php echo $taxPercent; ?>">
<input type="hidden" id="service_percent" value="<?php echo $setting->servicecharge; ?>">
<script src="<?php echo MOD_URL.$module;?>/assets/js/editreservation.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/customedit.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/bookingedit.js"></script>