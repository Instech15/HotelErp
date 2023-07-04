<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">
<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/poolprint.css">
<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/checkoutview.css">
<div class="form-group row">
    <div class="invalid-feedback" id="cmsg" hidden></div>
    <label
        class="col-3 col-sm-3 col-md-3 col-lg-2 col-xl-2 col-form-label text-right font-weight-600"><?php echo display("room_no") ?>
        :</label>
    <div class="col-6 col-sm-6 col-md-6 col-lg-5 col-xl-4">
        <div class="SumoSelect" tabindex="0" role="button" aria-expanded="false">
            <select multiple="multiple" class="testselect2 SumoUnder" tabindex="-1" id="chroomno">
                <?php foreach($checkinrooms as $rooms){ ?>
                <option value="<?php echo html_escape($rooms->bookedid); ?>"
                    <?php if($bookingdata[0]->bookedid==$rooms->bookedid){ echo "Selected";} ?>>
                    <?php echo html_escape($rooms->room_no)." - "; ?> <?php echo html_escape($rooms->firstname); ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-3 col-sm-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
        <button type="button" disabled onclick="checkoutinfo()" class="btn btn-success"
            id="go"><?php echo display("go") ?></button>
    </div>
</div>
<div id="checkoutdetail">
    <div class="row">
        <div class="col-lg-12 col-xl-6 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("customer_details") ?></h6>
                </div>
                <div class="card-body" id="custdetails">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="150"><?php echo display("name") ?></th>
                                <td><strong id="inname"><?php echo html_escape($bookingdata[0]->firstname) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("room_no") ?></th>
                                <td><strong><?php echo html_escape($bookingdata[0]->room_no) ?></strong></td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("booking_no") ?>.</th>
                                <td><strong
                                        id="inbknumber"><?php echo html_escape($bookingdata[0]->booking_number) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("email_id") ?></th>
                                <td><strong id="inemail"><?php echo html_escape($bookingdata[0]->email) ?></strong></td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("mobile_no") ?></th>
                                <td><strong
                                        id="inmobile"><?php echo html_escape($bookingdata[0]->cust_phone) ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("address") ?></th>
                                <td><strong><?php echo html_escape($bookingdata[0]->address) ?></strong></td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("time_format") ?></th>
                                <td><strong>24hrs</strong></td>
                            </tr>
                            <?php $bookingts = $this->db->select("booking_type,booking_sourse")->from("tbl_booking_type_info")->where("btypeinfoid",$bookingdata[0]->booking_source)->get()->row(); ?>
                            <?php if(!empty($bookingts)){ ?>
                            <tr>
                                <th class="pl-0"><?php echo display("booking_type") ?></th>
                                <td>
                                    <div class="form-floating with-icon">
                                        <input type="text" class="form-control" readonly
                                            placeholder="<?php echo display("bopkig_type") ?>"
                                            value="<?php echo html_escape($bookingts->booking_type) ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("booking_source") ?></th>
                                <td>
                                    <div class="form-floating with-icon">
                                        <input type="text" class="form-control" readonly
                                            placeholder="<?php echo display("booking_source") ?>"
                                            value="<?php echo html_escape($bookingts->booking_sourse) ?>">
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("set_default_customer") ?></h6>
                </div>
                <div class="card-body">
                    <?php 
                for($j=0; $j<count($bookingdata); $j++){
                ?>
                    <div class="customer-radio custom-control custom-radio pl-0 rounded bg-white border mb-2">
                        <input type="radio" id="custom_radio_<?php echo $j;?>"
                            <?php if(count($bookingdata)>1){ ?>onclick="userselect(<?php echo $j;?>)" <?php } ?>
                            name="customer-radio" class="custom-control-input" <?php if($j==0){echo "checked";} ?>
                            value="<?php echo html_escape($bookingdata[$j]->bookedid)?>">
                        <label class="custom-control-label d-flex align-items-center justify-content-between py-2 pr-3"
                            for="custom_radio_<?php echo $j;?>">
                            <span>
                                <span
                                    class="text-muted fs-12"><?php echo html_escape($bookingdata[$j]->room_no)." - "; ?>
                                    <?php echo html_escape($bookingdata[$j]->booking_number)?></span>
                                <span
                                    class="d-block"><?php echo html_escape($bookingdata[$j]->checkindate)." - "; ?><?php echo html_escape($bookingdata[$j]->checkoutdate)?></span>
                            </span>
                        </label>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 d-flex">
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead>
                        <tr class="tr-background">
                            <th><?php echo display("room_no") ?></th>
                            <th><?php echo display("date") ?></th>
                            <th class="text-center"><?php echo display("room_rent_details") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $allroomrent = 0; $allroomrentandtax = 0;
                    $bedcharge = 0; $personcharge = 0; $childcharge = 0; $allbpccharge = 0; $advanceamount = 0;
                    $alladvanceamount = 0; $bookedid=""; $poolbillamt = 0; $poolbillpaidamt = 0;
                    $allcomplementarycharge = 0; $restbill = 0; $hallbill=0; $poolid=""; $orderid = "";$hallid ="";$parkingbill=0;$parkingid=""; $promocode=0;
                    for($l=0; $l<count($bookingdata);$l++){

                    ?>
                        <tr>
                            <td class="rtype">
                                <strong class="d-block"><?php echo html_escape($bookingdata[$l]->room_no) ?></strong>
                                <?php 
                            $rtype=""; $alltotal = 0; $alltax = 0; $allsubtotal = 0; $singlepid=""; $singleorder="";$singlehall="";$singleparking="";
                            $roomtype = explode(",",$bookingdata[$l]->roomid);
                            for($s=0;$s<count($roomtype);$s++){
                                $sroomtype = $this->db->select("roomtype")->from("roomdetails")->where("roomid",$roomtype[$s])->get()->row();
                                $rtype .= $sroomtype->roomtype.",";
                            }
                            ?>
                                <span><?php echo trim($rtype,","); ?></span>
                            </td>
                            <td>
                                <div>
                                    <?php $indate = html_escape($bookingdata[$l]->checkindate);
                             $cindate = new DateTime($indate);
                             echo $cindate->format('jS M h:i')." to"; ?><br>
                                    <?php $outdate = html_escape($bookingdata[$l]->checkoutdate);
                             $coutdate = new DateTime($outdate);
                             echo $coutdate->format('jS M h:i');
                             $issue = html_escape($bookingdata[0]->checkindate);
                             $issuedate = new DateTime($issue);
                             $invissue = $issuedate->format('l, F j, Y');
                            ?>
                                </div>
                                <hr class="my-1">
                                <div class="text-muted"><?php echo display("adults") ?> :
                                    <?php echo html_escape($bookingdata[$l]->nuofpeople) ?>
                                </div>
                                <hr class="my-1">
                                <div class="text-muted"><?php echo display("children") ?> :
                                    <?php echo html_escape($bookingdata[$l]->children) ?>
                                </div>
                            </td>
                            <td>
                                <table class="table table-bordered table-sm mb-0 tr-background">
                                    <thead>
                                        <tr>
                                            <th><?php echo $l+1; ?> #</th>
                                            <th><?php echo display("from_date") ?></th>
                                            <th><?php echo display("to_date") ?></th>
                                            <th><?php echo display("nod") ?></th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("rent_day") ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("rent")." ".display("discount"); ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("dis_day") ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("amt_aft_dis") ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("tot_rent") ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("tax") ?>
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                            <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).") "; } ?><?php echo display("tot_amt") ?>.
                                                <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                    $bookedid .= $bookingdata[$l]->bookedid.",";
                                    $roomcount = explode(",", $bookingdata[$l]->room_no);
                                    $ratecount = explode(",", $bookingdata[$l]->roomrate);
                                    $complementaryprice = explode(",", $bookingdata[$l]->complementaryprice);
                                    $extra_facility_days = explode(",", $bookingdata[$l]->extra_facility_days);
                                    $exbed = explode(",", $bookingdata[$l]->extrabed);
                                    $experson = explode(",", $bookingdata[$l]->extraperson);
                                    $exchild = explode(",", $bookingdata[$l]->extrachild);
                                    $offer = explode(",", $bookingdata[$l]->offer_discount);
                                    $complementarycharge = 0;
                                    for($n=0;$n<count($roomcount);$n++){
                                    ?>
                                        <tr>
                                            <td><?php echo $n+1; ?></td>
                                            <td><?php echo html_escape($bookingdata[$l]->checkindate); ?></td>
                                            <td><?php echo html_escape($bookingdata[$l]->checkoutdate); ?></td>
                                            <td id="nod"><?php 
                                        $start = strtotime($bookingdata[$l]->checkindate);
                                        $end = strtotime($bookingdata[$l]->checkoutdate);
                                        $datediff = $end - $start;
                                        echo $days = ceil($datediff / (60 * 60 * 24));
                                        ?></td>
                                            <td><?php echo html_escape($ratecount[$n]); ?></td>
                                            <td><?php echo html_escape($offer[$n]); ?></td>
                                            <td><?php echo $dis = ($ratecount[$n]*$bookingdata[$l]->disrate)/100; ?>
                                            </td>
                                            <td><?php echo $totalamount = $ratecount[$n] - $dis; ?>
                                            </td>
                                            <td><?php echo $total = $totalamount*$days - $offer[$n]; ?></td>
                                            <?php $allsingle=0; ?>
                                            <td>
                                                <?php foreach($taxsetting as $tax){ ?>
                                                <?php echo "($tax->taxname".html_escape($tax->rate)."% )"; echo $singletax = ($tax->rate*$total)/100; $allsingle += $singletax; ?><br>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php echo $subtotal = $total+$allsingle; ?>
                                            </td>
                                        </tr>
                                        <?php
                                             $alltotal += $total;
                                             $alltax += $allsingle;
                                             $allsubtotal +=$subtotal;
                                             $complementarycharge += $complementaryprice[$n];
                                            for($m=0; $m<$exbed[$n];$m++){
                                                $bedcharge += $bookingdata[$l]->bedcharge*$extra_facility_days[$m];
                                            }
                                            for($m1=0; $m1<$experson[$n];$m1++){
                                                $personcharge += $bookingdata[$l]->personcharge*$extra_facility_days[$m1];
                                            }
                                            for($m2=0; $m2<$exchild[$n];$m2++){
                                                $childcharge += ($bookingdata[$l]->personcharge/2)*$extra_facility_days[$m2];
                                            }
                                            }
                                            if(!empty($bookingdata[$l]->promocode)){
                                                $pdiscount = $this->db->select("discount")->from("promocode")->where("promocode", $bookingdata[$l]->promocode)->get()->row();
                                                $promocode += $pdiscount->discount;
                                            } 
                                            $allroomrent += $alltotal;
                                            $allroomrentandtax += $allsubtotal;
                                            $allcomplementarycharge += $complementarycharge;
                                            $allbpccharge += ($bedcharge+$personcharge+$childcharge);
                                            $alladvanceamount +=$bookingdata[$l]->advance_amount;
                                            if(!empty($poolbill)){
                                                for($pc=0; $pc<count($poolbill[$l]); $pc++){
                                                    if($poolbill[$l][$pc]->status==1){$poolbillpaidamt += $poolbill[$l][$pc]->total_amount;}
                                                    else{$poolbillamt += $poolbill[$l][$pc]->total_amount;$singlepid .= $poolbill[$l][$pc]->pbookingid.",";}
                                                }
                                            }
                                            if(!empty($restaurantbill)){
                                                for($rb=0; $rb<count($restaurantbill[$l]); $rb++){
                                                    $restbill += $restaurantbill[$l][$rb]->bill_amount;
                                                    $singleorder .= $restaurantbill[$l][$rb]->order_id.",";
                                                }
                                            }
                                            if(!empty($hallroombill)){
                                                for($hb=0; $hb<count($hallroombill[$l]); $hb++){
                                                    $hallbill += $hallroombill[$l][$hb]->totalamount;
                                                    $singlehall .= $hallroombill[$l][$hb]->hbid.",";
                                                }
                                            }
                                            if(!empty($carParkingBill)){
                                                for($cb=0; $cb<count($carParkingBill[$l]); $cb++){
                                                    $parkingbill += $carParkingBill[$l][$cb]->total_price;
                                                    $singleparking .= $carParkingBill[$l][$cb]->bookParking_id.",";
                                                }
                                            }
                                            ?>
                                        <tr>
                                            <td colspan="8"></td>
                                            <td><?php echo html_escape($alltotal); ?></td>
                                            <td id="total_tax"><?php echo html_escape($alltax); ?></td>
                                            <td><?php echo html_escape($allsubtotal); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <?php $orderid .= $singleorder.","; $poolid .= $singlepid.","; $hallid .= $singlehall.",";$parkingid .= $singleparking.","; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-4 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("billing_details") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("room_rent_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="allroomrent"><?php echo html_escape($allroomrent); ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php echo display("discount_max") ?>
                                    <div class="d-flex align-items-center white-space-nowrap mb-1">
                                        <input type="number" min="0" disabled id="percent"
                                            class="form-control form-control-xs" autocomplete="off">
                                        <div class="ml-1 mr-3">(%) (<?php echo display("or") ?>)</div>
                                    </div>
                                    <div class="d-flex align-items-center white-space-nowrap">
                                        <input type="number" min="0" disabled id="amount"
                                            class="form-control form-control-xs" autocomplete="off">
                                        <div class="ml-1 mr-3">(<?php echo display("amnt") ?>)</div>
                                    </div>
                                </th>
                                <td>
                                    <div class="form-floating d-inline-block">
                                        <select class="form-select" id="disreason">
                                            <option value="" selected="">No Discount</option>
                                            <option value="1">Offer</option>
                                            <option value="2">Reduction</option>
                                            <option value="3">MD Guest</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("discount_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="disamount">0</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <?php if($promocode>0){ ?>
                            <tr>
                                <th class="pl-0">
                                    <?php echo display("promocode")." "; ?><?php echo display("discount") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="disamount"><?php echo html_escape($promocode); ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th class="pl-0"><?php echo display("service_charge_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="scharge"><?php echo $scharge = ($allroomrent*$setting->servicecharge)/100; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("total_room_rent_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="totalroomrentamount"><?php echo $allroomrent+=$scharge; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("total_room_rent_amt_with_tax") ?></th>
                                <td hidden>
                                    <strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="oldallroomrentandtax"><?php echo $allroomrentandtax+=$scharge; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="allroomrentandtax"><?php echo $allroomrentandtax; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("complementary_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="allcomplementarycharge"><?php echo $allcomplementarycharge *= $days; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("extra_bpc_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="allbpccharge"><?php echo html_escape($allbpccharge); ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("advance_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="alladvanceamount"><?php echo html_escape($alladvanceamount); ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("payable_rent_amt") ?>.</th>
                                <td><strong>
                                        <?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="payableamount"><?php echo $payableamount = $allroomrentandtax+$allcomplementarycharge+$allbpccharge-$alladvanceamount-$promocode; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("additional_charges") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("additional_charges") ?></th>
                                <td>
                                    <input type="number" min="0" id="additionalcharge"
                                        class="form-control form-control-sm" value="0" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("additional_charge_comments") ?></th>
                                <td>
                                    <textarea class="form-control"
                                        placeholder="<?php echo display("additional_charge_comments") ?>"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("payment_details") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("net_payable_amt") ?></th>
                                <td><strong>
                                        <?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="netpayableamount"><?php echo html_escape($payableamount); ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("credit_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="creditamt">0.00</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("special_discount_amt") ?></th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="complemetaryamt">0.00</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("payable_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="payableamt"><?php echo $payableamount+$poolbillamt+$restbill+$hallbill+$parkingbill; ?></span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button hidden type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#currencyConverterModal">
                            <i class="fas fa-euro-sign"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"> <?php echo display("room_posted_bill") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo display("bill_type") ?></th>
                                <th><?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?><?php echo display("total") ?>
                                    <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <th class="text-right"><?php echo display("action") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if((!empty($poolbill))){ ?>
                            <tr>
                                <td><?php echo display("swimming_pool") ?></td>
                                <td id="poolbill"><?php echo html_escape($poolbillamt); ?></td>
                                <td class="text-right"><button type="button" id="poolprint" onclick="podataprintflist()"
                                        class="btn btn-success btn-sm"><i class="fas fa-print"></i></button></td>
                            </tr>
                            <?php } ?>
                            <?php if(!empty($restaurantbill)){ ?>
                            <tr>
                                <td><?php echo display("restaurant") ?></td>
                                <td id="restbill"><?php echo html_escape($restbill); ?></td>
                                <td class="text-right"><button type="button" id="orderprint" onclick="restaurantBill()"
                                        class="btn btn-success btn-sm"><i class="fas fa-print"></i></button></td>
                            </tr>
                            <?php } ?>
                            <?php if(!empty($hallroombill)){ ?>
                            <tr>
                                <td><?php echo display("hall_room") ?></td>
                                <td id="hallbill"><?php echo html_escape($hallbill); ?></td>
                                <td class="text-right"><button type="button" id="hallprint" onclick="hallRoomBill()"
                                        class="btn btn-success btn-sm"><i class="fas fa-print"></i></button></td>
                            </tr>
                            <?php } ?>
                            <?php if(!empty($carParkingBill)){ ?>
                            <tr>
                                <td><?php echo display("car_parking") ?></td>
                                <td id="parkingbill"><?php echo html_escape($parkingbill); ?></td>
                                <td class="text-right"><button type="button" id="parkingprint"
                                        onclick="carParkingBill()" class="btn btn-success btn-sm"><i
                                            class="fas fa-print"></i></button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("credit") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("type") ?></th>
                                <td>
                                    <div class="form-floating">
                                        <select class="form-select" id="credit">
                                            <option selected value="">No Credit</option>
                                            <option value="admin">Admin</option>
                                            <option value="regular">Regular Customer</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    <?php echo display("credit_amt") ?>.<?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td>
                                    <input type="number" min="0" id="creditamount" disabled
                                        class="form-control form-control-sm">
                                    <div class="invalid-feedback" id="crmsg" hidden></div>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("remarks") ?></th>
                                <td>
                                    <textarea class="form-control" placeholder="<?php echo display("remarks") ?>"
                                        id="floatingTextarea"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("bill_settlement") ?></h6>
                </div>
                <div class="card-body" hidden>
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    <?php echo display("cash") ?>
                                    <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td><input type="number" id="old_cash" min="0" class="form-control form-control-sm">
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    <?php echo display("card") ?>
                                    <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td><input type="number" id="card" min="0" class="form-control form-control-sm"></td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    <?php echo display("cheque") ?>
                                    <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td><input type="number" id="cheque" min="0" class="form-control form-control-sm"></td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                    <?php echo display("online") ?>
                                    <?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td><input type="number" id="online" min="0" class="form-control form-control-sm"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table class="table table-borderless payment mb-0 ">
                        <thead>
                            <tr>
                                <th class="pl-0"><?php echo display("payment_mode") ?></th>
                                <th><?php echo display("amnt") ?></th>
                                <th class="text-right pr-0"><?php echo display("action") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-0 pl-0">
                                    <div class="form-floating with-icon">
                                        <select class="selectpicker form-select" data-live-search="true"
                                            data-width="100%" onchange="paymode(0)" id="paymentmode_0">
                                            <option value="" selected>Choose <?php echo display("payment_mode") ?>
                                            </option>
                                            <?php foreach($paymentdetails as $ptype){ ?>
                                            <option value="<?php echo html_escape($ptype->payment_method) ?>">
                                                <?php echo html_escape($ptype->payment_method) ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="paymentmode"><?php echo display("payment_mode") ?></label>
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="row mt-2" id="modedetails_0" hidden>
                                        <div class="col">
                                            <input type="text" class="form-control form-control-sm" id="cardno_0"
                                                placeholder="Card Number" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control form-control-sm" id="recdate_0"
                                                placeholder="Date">
                                            <select class="selectpicker form-select" data-live-search="true"
                                                data-width="100%" id="bankname_0">
                                                <option value="" selected>Choose <?php echo display("bank_name") ?>
                                                </option>
                                                <?php foreach($banklist as $list){ ?>
                                                <option value="<?php echo html_escape($list->HeadName); ?>">
                                                    <?php echo html_escape($list->HeadName);?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <th class="border-0"><input type="number" id="cash_0" disabled class="form-control"
                                        placeholder="Amount" value=""></th>
                                <td class="border-0 pr-0 text-right">
                                    <button type="button" onclick="delrow(0)" id="del0"
                                        class="btn btn-danger-soft del0"><i class="far fa-times-circle"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right py-2">
                        <button type="button" class="btn btn-warning btn-sm" id="multipayment"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 d-flex">
            <div class="card flex-fill w-100 mb-4">
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("special_discount") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("type") ?></th>
                                <td>
                                    <div class="form-floating">
                                        <select class="form-select" id="complementary">
                                            <option selected value="">No Discount</option>
                                            <option value="mdsfriend">MD's Friend</option>
                                            <option value="friend">Friend</option>
                                            <option value="regular">Regular Customer</option>
                                            <option value="ncorder">NC Order</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0">
                                    <?php if($currency->position==1){ echo "(".html_escape($currency->curr_icon).")"; } ?><?php echo display("discount_amt") ?>.<?php if($currency->position==2){ echo "(".html_escape($currency->curr_icon).")"; } ?>
                                </th>
                                <td><input type="number" min="0" id="complementaryamount" disabled
                                        class="form-control form-control-sm"></td>
                                <div class="invalid-feedback" id="crmsg1" hidden></div>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("remarks") ?></th>
                                <td>
                                    <textarea class="form-control" placeholder="<?php echo display("remarks") ?>"
                                        id="floatingTextarea"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header py-3">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("balance_details") ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0" width="180"><?php echo display("remain_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="balance">0.00</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("collected_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="collectedamt">0.00</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th class="pl-0"><?php echo display("change_amt") ?>.</th>
                                <td><strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><span
                                            id="refunddamt">0.00</span><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-lg-flex align-items-center justify-content-between">
        <div class="">
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="roomRent" hidden></label>
            </div>
            <small></small>
        </div>
        <div class="mt-3 mt-lg-0">
            <button type="button" id="print_invoice"
                class="btn btn-success btn-lg print-btn"><?php echo display("print") ?></button>
            <input type="hidden" id="bookedid" value="<?php echo trim($bookedid,","); ?>">
            <button type="button" disabled id="checkout" onclick="checkout()"
                class="btn btn-info btn-lg"><?php echo display("checkout") ?></button>
        </div>
    </div>
    <div id="smpooldetails">


    </div>
    <div id="restdetails">


    </div>
    <div id="halldetails">


    </div>
    <div id="parkingdetails">


    </div>
    <input type="hidden" id="orderid" value="<?php echo html_escape(trim($orderid,",,")); ?>">
    <input type="hidden" id="poolid" value="<?php echo html_escape(trim($poolid,",,")); ?>">
    <input type="hidden" id="hallid" value="<?php echo html_escape(trim($hallid,",,")); ?>">
    <input type="hidden" id="parkingid" value="<?php echo html_escape(trim($parkingid,",,")); ?>">

    <div id="printArea" hidden>
        <!--Print button-->
        <div class="invoice-wrap print-content invp-1">
            <div class="invp-2"><span id="ipaid" class="color-red"><?php echo display("unpaid") ?></span></div>
            <div class="invp-3">
                <img src="<?php echo base_url($invoicelogo->invoice_logo) ?>" alt="..." class="invp-img">
                <h2 class="invp-4">
                    <?php echo html_escape($setting->title); ?></h2>
                <p class="invp-5"><?php echo display("address") ?>: <?php echo html_escape($setting->address); ?></p>
                <p class="invp-5" id="invbknumber"></p>
                <p class="invp-6"><?php echo display("issue_date") ?>: <?php echo html_escape($invissue); ?></p>
            </div>
            <div class="invp-7">
                <div>
                    <p class="invp-8">
                        <?php echo display("invoiced_from") ?></p>
                    <strong class="invp-9"><?php echo html_escape($setting->title); ?></strong><br>
                    <span
                        class="invp-10"><?php echo display("mobile") ?>:&nbsp;</span><?php echo html_escape($setting->phone); ?>
                    <br>
                    <span
                        class="invp-10"><?php echo display("email") ?>:&nbsp;</span><?php echo html_escape($setting->email); ?><br>
                    <span
                        class="invp-10"><?php echo display("website") ?>:&nbsp;</span><?php echo trim(base_url(),"/"); ?><br>
                </div>
                <div class="invp-11">
                    <p class="invp-8">
                        <?php echo display("invoiced_to") ?></p>
                    <div>
                        <address class="invp-12">
                            <strong class="invp-9"><?php echo display("details_of_the_guest") ?> </strong><br>
                            <span class="invp-10"><?php echo display("guests_name") ?>:&nbsp;</span><span
                                id="invname"></span><br>
                            <span class="invp-10" id="invmobiletitle"><?php echo display("mobile") ?>:&nbsp;</span><span
                                id="invmobile"></span>
                            <br>
                            <span class="invp-10" id="invemailtitle"><?php echo display("email") ?>:&nbsp;</span><span
                                id="invemail"></span>
                        </address>
                    </div>
                </div>
            </div>
            <!-- Order Details -->
            <table class="invp-13">
                <thead>
                    <tr>
                        <th class="invp-14"><?php echo display("room_no") ?>.</th>
                        <th class="invp-14"><?php echo display("date") ?></th>
                        <th class="invp-15"><?php echo display("room_rent_details") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $allinvat = 0;?>
                    <?php for($inl=0; $inl<count($bookingdata);$inl++){ ?>
                    <?php
                        $adu = explode(",", $bookingdata[$inl]->nuofpeople);
                        $chi = explode(",", $bookingdata[$inl]->children);
                        $rno = explode(",", $bookingdata[$inl]->room_no);
                        $inrrent = explode(",", $bookingdata[$inl]->roomrate);
                        $offer = explode(",", $bookingdata[$inl]->offer_discount);
                        for($inr=0;$inr<count($rno);$inr++){
                        ?>
                    <tr>
                        <td class="invp-14">
                            <strong class="d-block"><?php echo html_escape($rno[$inr]); ?></strong>
                            <?php echo display("adults") ?>. :
                            <?php echo html_escape($adu[$inr]); ?><?php if(!empty($chi[$inr])){ ?>,
                            <?php echo display("child") ?> :
                            <?php echo html_escape($chi[$inr]); }?>
                        </td>
                        <td class="invp-14">
                            <div>
                                <?php $inldate = html_escape($bookingdata[$inl]->checkindate);
                             $cinldate = new DateTime($inldate);
                             echo $cinldate->format('jS M h:i')." to"; ?><br>
                                <?php $outldate = html_escape($bookingdata[$inl]->checkoutdate);
                             $coutldate = new DateTime($outdate);
                             echo $coutldate->format('jS M h:i');
                             ?>
                            </div>
                        </td>
                        <td class="invp-16">
                            <table class="invp-17">
                                <thead>
                                    <tr>
                                        <th class="1nvp-18"><?php echo display("nod") ?></th>
                                        <th class="1nvp-18"><?php echo display("rent") ?></th>
                                        <th class="1nvp-18"><?php echo display("rent")." ".display("discount"); ?></th>
                                        <th class="1nvp-18"><?php echo display("dis_day") ?></th>
                                        <th class="1nvp-18"><?php echo display("aft_dis") ?></th>
                                        <th class="1nvp-18"><?php echo display("tot_rent") ?></th>
                                        <?php foreach($taxsetting as $tax){ ?>
                                        <th class="1nvp-18"><?php echo html_escape($tax->taxname); ?></th>
                                        <?php } ?>
                                        <th class="1nvp-18"><?php echo display("tot_amt") ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="invp-19">
                                            <?php
                                            $instart = strtotime($bookingdata[$inl]->checkindate);
                                            $inend = strtotime($bookingdata[$inl]->checkoutdate);
                                            $indatediff = $inend - $instart;
                                            echo $indays = ceil($indatediff / (60 * 60 * 24));
                                             ?>
                                        </td>
                                        <td class="invp-20">
                                            <?php echo html_escape($inrrent[$inr]); ?>
                                        </td>
                                        <td class="invp-20">
                                            <?php echo html_escape($offer[$inr]); ?>
                                        </td>
                                        <td class="invp-20">
                                            <?php echo $totalDis = ($ratecount[$inr]*$bookingdata[$inl]->disrate)/100; ?>
                                        </td>
                                        <td class="invp-20">
                                            <?php echo $intotalamount = $inrrent[$inr] - $totalDis; ?>
                                        </td>
                                        <td class="invp-20">
                                            <?php  echo $intotal = $intotalamount*$indays - $offer[$inr]; ?>
                                        </td>
                                        <?php $invat = 0; $singlevat=0; ?>
                                        <?php foreach($taxsetting as $tax){ ?>
                                        <td class="invp-20">
                                            <?php  echo $invat = ($tax->rate*$intotal)/100; $singlevat+=$invat; ?>
                                        </td>
                                        <?php } ?>
                                        <?php $allinvat+=$singlevat; ?>
                                        <td class="invp-21">
                                            <?php echo $insubtotal = $intotal+$singlevat; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /Order Details -->
            <!-- Table Total -->
            <div class="invp-22">
                <table border="1px" class="paymentdetails invp-23">
                    <tbody>
                        <tr id="paymentmethod_0">
                            <th class="res-padding" id="pmode_0"><?php echo display("payment_mode") ?></th>
                            <th class="res-allign-padding" id="pamount_0"><?php echo display("amnt") ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invp-22">
                <table border="0" cellpadding="0" cellspacing="0" align="center" class="invp-24">
                    <tbody>
                        <tr>
                            <td class="invp-25">
                                <?php echo display("sub_total") ?>
                            </td>
                            <td class="invp-26" width="80">
                                <?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo $allroomrentandtax-$allinvat; ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="invp-27">
                                <small><?php echo display("tax") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($allinvat); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td class=" invp-27">
                                <small><?php echo display("service_charge") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($scharge); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></small>
                            </td>
                        </tr>
                        <?php if($allcomplementarycharge>0) { ?>
                        <tr>
                            <td class=" invp-27">
                                <small><?php echo display("complementary_amt") ?>.</small>
                            </td>
                            <td class=" invp-27">
                                <small><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($allcomplementarycharge); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></small>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if($allbpccharge>0) { ?>
                        <tr>
                            <td class=" invp-27">
                                <small><?php echo display("extra_bpc_amt") ?>.</small>
                            </td>
                            <td class=" invp-27">
                                <small><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($allbpccharge); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></small>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr id="poolamttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("swimming_pool") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="poolamt"></small>
                            </td>
                        </tr>
                        <tr id="restbillamttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("restaurant") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="restbillamt"></small>
                            </td>
                        </tr>
                        <tr id="hallbillamttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("hall_room") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="hallbillamt"></small>
                            </td>
                        </tr>
                        <tr id="parkingbillamttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("car_parking") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="parkingbillamt"></small>
                            </td>
                        </tr>
                        <tr id="invadc" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("additional_charges") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="inadcamt"></small>
                            </td>
                        </tr>
                        <tr id="invdis" hidden>
                            <td class=" invp-27">
                                <small id="indistitle"></small>
                            </td>
                            <td class=" invp-27">
                                <small id="indisamt"></small>
                            </td>
                        </tr>
                        <tr id="invcredit" hidden>
                            <td class=" invp-27">
                                <small id="creditreason"></small>
                            </td>
                            <td class=" invp-27">
                                <small id="increditamt"></small>
                            </td>
                        </tr>
                        <tr id="invsdis" hidden>
                            <td class=" invp-27">
                                <small id="invsdistitle"><?php echo display("special_discount") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="insdis"></small>
                            </td>
                        </tr>
                        <?php if($alladvanceamount>0) { ?>
                        <tr>
                            <td class=" invp-27">
                                <small><?php echo display("advance_amount") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($alladvanceamount); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></small>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr id="paidamounttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("paid_amount") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="paidamount"></small>
                            </td>
                        </tr>
                        <tr id="changeamounttitle" hidden>
                            <td class=" invp-27">
                                <small><?php echo display("cng_amount") ?></small>
                            </td>
                            <td class=" invp-27">
                                <small id="changeamount"></small>
                            </td>
                        </tr>
                        <tr>
                            <td class="invp-28">
                                <strong><?php echo display("grand_total_inctax") ?></strong>
                            </td>
                            <td class="invp-28">
                                <strong
                                    id="inpayableamt"><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php  echo $payableamount+$poolbillamt+$restbill+$hallbill+$parkingbill; ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="invp-29">&nbsp;</div>
            <!-- /Table Total -->
            <!--Terms and conditions-->
            <?php $tandc = $this->db->select('*')->from('tbl_widget')->where('widgetid',21)->get()->row(); ?>
            <div class="invp-30">
                <div class="invp-31">
                    <?php echo html_escape($tandc->widget_title); ?></div>
                <ul class="invp-32">
                    <?php $list = explode(".", trim($tandc->widget_desc,"."));
                        for($z=0; $z<count($list); $z++){
                    ?>
                    <li class="invp-33"><?php echo html_escape($list[$z]); ?></li>
                    <?php } ?>
                </ul>
            </div>
            <!--/Terms and conditions-->
            <!--Signatory-->
            <div class="invp-34">
                <div class="invp-35"><?php echo display("guest_signature") ?></div>
                <div class="invp-35"><?php echo display("authorized_signature") ?></div>
            </div>
            <!--/Signatory-->
        </div>
    </div>
    <div id="paymentinfo" hidden>
        <option value="" selected>Choose <?php echo display("payment_mode") ?></option>
        <?php foreach($paymentdetails as $ptype){ ?>
        <option value="<?php echo html_escape($ptype->payment_method) ?>">
            <?php echo html_escape($ptype->payment_method) ?></option>
        <?php } ?>
    </div>
    <div id="bankinfo" hidden>
        <option value="" selected>Choose <?php echo display("bank_name") ?></option>
        <?php foreach($banklist as $list){ ?>
        <option value="<?php echo html_escape($list->HeadName); ?>">
            <?php echo html_escape($list->HeadName);?></option>
        <?php } ?>
    </div>
    <input type="hidden" id="finyear" value="<?php echo financial_year(); ?>">
    <script src="<?php echo MOD_URL.$module;?>/assets/js/custom.js"></script>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/checkoutreservation.js"></script>