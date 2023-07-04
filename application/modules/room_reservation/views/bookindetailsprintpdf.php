<?php
    $firstdate = $bookinfo->checkindate;
    $lastdate = $bookinfo->checkoutdate;
    $datediff = strtotime($lastdate) - strtotime($firstdate);
    $datediff = ceil($datediff/(60*60*24));
    if($bookinfo->bookingstatus==5){
        $creditamt = $this->db->select("credit")->from("tbl_postedbills")->where("bookedid",$bookinfo->bookedid)->get()->row();
    }
?>
<div style="padding: 24px; min-height: 1px; ">
    <table style=" width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse;">
        <tbody>
            <tr>
                <th style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;"><img
                        src="<?php echo getcwd().'/';?><?php echo html_escape(!empty($commominfo->invoice_logo)?$commominfo->invoice_logo: 'assets/img/header-logo.png')?>"
                        alt=""></th>
                <th style=" vertical-align:top; text-align: right; font-size: 22px; font-weight: bold;">
                    <?php echo display('booking_number') ?>
                    #<?php echo html_escape($bookinfo->booking_number);?></th>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;"> </td>
                <td style=" vertical-align:top; text-align: right;"> <?php echo display('booking_date') ?>:
                    <?php echo html_escape($bookinfo->date_time);?></td>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;"> </td>
                <td style=" vertical-align:top; text-align: right; color: #37a000;">
                    <?php echo display('payment_status') ?>:
                    <?php if(!empty($bookinfo->paid_amount)){?>
                    <?php if($bookinfo->bookingstatus==5){if($creditamt->credit>0){echo display("credit");}else{echo display("paid");}}else if($bookinfo->paid_amount < $bookinfo->total_price*$datediff){ echo display("unpaid");}else{ echo display("paid");}?>
                    <?php } else{echo display("unpaid");}?></td>
            </tr>

            <tr>
                <th style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo html_escape($storeinfo->storename);?></th>
                <th style=" vertical-align:top; text-align: right;"><?php echo display('guest_info') ?></th>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo html_escape($storeinfo->address);?>
                </td>
                <td style=" vertical-align:top; text-align: right;">
                    <?php echo html_escape((!empty($customerinfo->firstname)?$customerinfo->firstname.' '.$customerinfo->lastname:'User Deleted'));?>
                </td>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('mobile') ?>:
                    <?php echo html_escape($storeinfo->phone);?> </td>
                <td style=" vertical-align:top; text-align: right;"> <?php echo display('mobile') ?>:
                    <?php echo html_escape(!empty($customerinfo->cust_phone)?$customerinfo->cust_phone:null);?></td>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;"></td>
                <td style=" vertical-align:top; text-align: right;"> <?php echo display('address') ?>
                    :<?php echo html_escape(!empty($customerinfo->address)?$customerinfo->address:null);?></td>
            </tr>
            <tr>
                <th style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('email') ?></th>
                <th style=" vertical-align:top; text-align: right;"> <?php echo display('email') ?></th>
            </tr>
            <tr>
                <td style="width: 50%;  vertical-align: top; text-align: -webkit-match-parent; color: #37a000;">
                    <?php echo html_escape($storeinfo->email);?></td>
                <td style=" vertical-align:top; text-align: right; color: #37a000;">
                    <?php echo html_escape(!empty($customerinfo->email)?$customerinfo->email:null);?></td>
            </tr>
        </tbody>
    </table>
    <table
        style="border: 1px solid #e4e5e7; width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse;">
        <tbody>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('roomtype') ?></th>
                <?php
                    $allroomtype="";
                    $roomid = explode(",",$bookinfo->roomid);
                    for($i=0;$i<count($roomid); $i++){
                        $roomtype = $this->db->select("roomtype")->from("roomdetails")->where("roomid",$roomid[$i])->get()->row();
                        $allroomtype .= $roomtype->roomtype.",";
                    }
                 ?>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align:top;">
                    <?php echo trim($allroomtype,",");?></td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('room_no') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align:top;">
                    <?php echo html_escape(!empty($bookinfo->room_no)?$bookinfo->room_no:null);?></td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('checkin') ?> </th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align:top;">
                    <?php echo html_escape($bookinfo->checkindate);?></td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('checkout') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align:top;">
                    <?php echo html_escape($bookinfo->checkoutdate);?></td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('booking_status') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top;">
                    <?php if($bookinfo->bookingstatus==0){ echo display('pending');}if($bookinfo->bookingstatus==2){ echo display('complete');}if($bookinfo->bookingstatus==1){ echo display("cancel");}if($bookinfo->bookingstatus==4){ echo display("checkin");}if($bookinfo->bookingstatus==5){ echo display("checkout");}?>
                </td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('adults') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top;">
                    <?php echo html_escape($bookinfo->nuofpeople);?></td>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('number_of_rooms') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top;">
                    <?php echo html_escape($bookinfo->total_room);?></td>
                    <?php if($bookinfo->coments=="Booking from admin"){
                        $totalroom=1;
                    }else{
                        $totalroom=1;
                    } ?>
            </tr>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('nights') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top;">
                    <?php echo html_escape($datediff);?></td>
            </tr>
            <?php if(!empty($btaxinfo->remarks)){ ?>
            <tr>
                <th
                    style="width: 50%; border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;">
                    <?php echo display('remarks') ?></th>
                <td style="border: 1px solid #e4e5e7; padding: 8px 10px; vertical-align: top;">
                    <?php echo html_escape($btaxinfo->remarks);?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table style="width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse;">
        <thead>
            <tr>
                <th
                    style="border-bottom: 1px solid #e4e5e7; border-top: 1px solid #e4e5e7; vertical-align: bottom; padding: 8px 10px; text-align: -webkit-match-parent;">
                    #</th>
                <th
                    style="border-bottom: 1px solid #e4e5e7; border-top: 1px solid #e4e5e7; vertical-align: bottom; padding: 8px 10px; text-align: -webkit-match-parent;">
                    Date</th>
                <th
                    style="border-bottom: 1px solid #e4e5e7; border-top: 1px solid #e4e5e7; vertical-align: bottom; padding: 8px 10px; text-align: -webkit-match-parent;">
                    Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $totaldiscount=0;
                    $roomrate=0;
                    $x=0;
                    $total=0;
                    $roomId = explode(",", $bookinfo->roomid);
                    $roomRate = explode(",", $bookinfo->roomrate);
                    $disamount = $this->db->select("discountamount")->from("booked_details")->where("bookedid", $bookinfo->bookedid)->get()->row();
                    $promocode=0;
                    if(!empty($bookinfo->promocode)){
                        $pdiscount = $this->db->select("discount")->from("promocode")->where("promocode", $bookinfo->promocode)->get()->row();
                        $promocode = $pdiscount->discount;
                    }
                    for($li = 0; $li < count($roomId); $li++){
                        for($i = 0; $i < $datediff; $i++){
                        $alldays= date("Y-m-d", strtotime($firstdate . ' + ' . $i . 'day'));
                        $x++;
                        $getroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$roomId[$li])->where('offer_date',$alldays)->get()->row();
                        if(!empty($getroom)){
                            $singleDiscount=$getroom->offer;
                            $totaldiscount=$totaldiscount+$singleDiscount;
                            $roomrate=$roomRate[$li]-$singleDiscount;
                            }
                        else{
                            $roomrate=$roomRate[$li];
                            }
                        $price=($totalroom*$roomrate);
                        $total=$total+$price;
                ?>
            <tr>
                <th style="padding: 8px 10px; vertical-align: top; text-align: -webkit-match-parent;"><?php echo $x;?>
                </th>
                <td style="padding: 8px 10px; vertical-align: top;"><?php echo html_escape($alldays);?></td>
                <td style="padding: 8px 10px; vertical-align: top;"><?php echo html_escape($roomrate);?></td>
            </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div style="margin-right: -10px; margin-left: -10px; display: block;">
        <div style="max-width: 100%; padding-right: 10px; padding-left: 10px; text-align: right!important;">
            <ul style="padding-left: 0; list-style: none; margin-top: 0; margin-bottom: 1rem;">
                <li>
                    <strong><?php echo display('subtotal'); ?>:</strong> <?php $grprice=$totalroom*$total;
                    $grprice=$grprice;
                    echo (($grprice!=0)?$grprice:$grprice=$total); $grprice -= $disamount->discountamount*$datediff;?>
                </li>
                <?php if($disamount->discountamount>0){ ?>
                <li>
                    <strong><?php echo display('discount'); ?> :</strong>
                    <?php echo $disamount->discountamount*$datediff;?>
                </li>
                <?php } ?>
                <?php if($promocode>0){ ?>
                <li>
                    <strong><?php echo display("promocode_discount"); ?> :</strong>
                    <?php echo html_escape($promocode);?>
                </li>
                <?php } ?>
                <?php $totaltax = 0; $scharge=0; ?>
                <?php if(empty($btaxinfo->bookedid)){ ?>
                <?php
                    if(!empty($taxinfo)){
                         foreach($taxinfo as $tax){ ?>
                <li>
                    <strong><?php echo html_escape($tax->taxname); ?>
                        <?php echo html_escape($tax->rate);?>%:</strong> <?php $singletax=0; $singletax=$tax->rate*$grprice/100;
                        echo $singletax; $totaltax+=$singletax; ?>
                </li>
                <?php } }?>
                <?php }else{ ?>
                <?php $taskname = explode(",", $btaxinfo->taskname);
                    $rate = explode(",", $btaxinfo->rate); ?>
                <?php if(!empty($taskname[0])){ for($bt=0; $bt<count($taskname); $bt++){ ?>
                <li>
                    <strong><?php echo html_escape($taskname[$bt]); ?>
                        <?php echo html_escape($rate[$bt]);?>%:</strong> <?php $singletax=0; $singletax=$rate[$bt]*$grprice/100;
                        echo $singletax; $totaltax+=$singletax; ?>
                </li>
                <?php } ?>
                <?php } } ?>
                <li>
                    <strong><?php echo display('tax') ?> :</strong> <?php echo html_escape($totaltax);?>
                </li>
                <?php if($bookinfo->bookingstatus==5){ ?>
                <?php if(!empty($btaxinfo->scharge)){ ?>
                <li>
                    <strong><?php echo display("service_charge") ?> :</strong>
                    <?php echo $scharge = $btaxinfo->scharge;?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->complementary) & $btaxinfo->complementary>0){ ?>
                <li>
                    <strong><?php echo display('complementary') ?> :</strong>
                    <?php echo html_escape($btaxinfo->complementary);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->extrabpc) & $btaxinfo->extrabpc>0){ ?>
                <li>
                    <strong><?php echo display("extra_bpc"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->extrabpc);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->ex_discount) & $btaxinfo->ex_discount>0){ ?>
                <li>
                    <strong><?php echo display("extra").display('discount') ?> :</strong>
                    <?php echo html_escape($btaxinfo->ex_discount);?>
                </li>
                <?php $percent = ($btaxinfo->ex_discount*100)/$grprice;
                            $reducetax = ($totaltax*$percent)/100;
                            $totaltax-=$reducetax;
                         ?>
                <?php }else{ $reducetax = 0; } ?>
                <?php if(!empty($btaxinfo->additional_charges) & $btaxinfo->additional_charges>0){ ?>
                <li>
                    <strong><?php echo display("additional_charges"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->additional_charges);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->special_discount) & $btaxinfo->special_discount>0){ ?>
                <li>
                    <strong><?php echo display("special_discount"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->special_discount);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->swimming_pool) & $btaxinfo->swimming_pool>0){ ?>
                <li>
                    <strong><?php echo display("swimming_pool"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->swimming_pool);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->restaurant) & $btaxinfo->restaurant>0){ ?>
                <li>
                    <strong><?php echo display("restaurant"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->restaurant);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->hallroom) & $btaxinfo->hallroom>0){ ?>
                <li>
                    <strong><?php echo display("hall_room"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->hallroom);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->car_parking) & $btaxinfo->car_parking>0){ ?>
                <li>
                    <strong><?php echo display("car_parking"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->car_parking);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->days) & $btaxinfo->days>0){ ?>
                <li>
                    <strong><?php echo display("refund_days"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->days);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->amount) & $btaxinfo->amount>0){ ?>
                <li>
                    <strong><?php echo display("refund_amount"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->amount);?>
                </li>
                <?php } ?>
                <?php if(!empty($btaxinfo->charge) & $btaxinfo->charge>0){ ?>
                <li>
                    <strong><?php echo display("refund_charge"); ?> :</strong>
                    <?php echo html_escape($btaxinfo->charge);?>
                </li>
                <?php } ?>
                <?php 
                    $postedbill =  $btaxinfo->complementary+$btaxinfo->extrabpc-$btaxinfo->ex_discount+$btaxinfo->additional_charges-$btaxinfo->special_discount+$btaxinfo->swimming_pool+$btaxinfo->restaurant+$btaxinfo->hallroom+$btaxinfo->car_parking; 
                }else{
                    $postedbill = 0;
                    $reducetax = 0; 
                    $scharge = ($setting->servicecharge*$grprice)/100;
                    ?>
                <li>
                    <strong><?php echo display("service_charge"); ?> :</strong> <?php echo html_escape($scharge);?>
                </li>
                <?php } ?>
                <li>
                    <?php $grprice += $scharge;?>
                    <strong><?php echo display('grand_total') ?>:</strong>
                    <?php if($currency->position==1){echo html_escape($currency->curr_icon);}?><?php echo $grand_total = number_format($totaltax+$postedbill+$grprice,2);?><?php if($currency->position==2){echo html_escape($currency->curr_icon);}?>
                    <br /><strong><?php echo display('paid_amount') ?>:</strong>
                    <?php if($currency->position==1){echo html_escape($currency->curr_icon);}?><?php if (!empty($bookinfo->paid_amount)){$total_paid = $bookinfo->paid_amount+$promocode+$postedbill-$reducetax+ ($bookinfo->bookingstatus==5?$scharge:0);if($bookinfo->bookingstatus==5){echo $grand_total;}else{echo number_format($total_paid,2);}}?><?php if($currency->position==2){echo html_escape($currency->curr_icon);}?>
                    <br /><strong><?php echo display('due_amount') ?>:</strong>
                    <?php if($currency->position==1){echo html_escape($currency->curr_icon);}?><?php if (!empty($bookinfo->paid_amount)){$remain_amount =($grprice+$totaltax+$postedbill+$reducetax)-($bookinfo->paid_amount+$promocode+$postedbill+($bookinfo->bookingstatus==5?$scharge:0));if($remain_amount<0){echo "0";}else{echo $remain_amount;}} else echo html_escape($grprice+$totaltax+$scharge+$postedbill);?><?php if($currency->position==2){echo html_escape($currency->curr_icon);}?>
                </li>
            </ul>
        </div>
    </div>
</div>