<?php if($isfound==2){ ?>
<div class="text-center">
    <svg class="mb-4" height="150pt" viewBox="0 0 496 496" width="150pt" xmlns="http://www.w3.org/2000/svg">
        <path
            d="m232 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
        <path
            d="m232 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
        <path
            d="m360 320h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
        <path
            d="m360 400h-96c-4.425781 0-8 3.574219-8 8v48c0 4.425781 3.574219 8 8 8h96c4.425781 0 8-3.574219 8-8v-48c0-4.425781-3.574219-8-8-8zm-8 48h-80v-32h80zm0 0" />
        <path d="m160 208h176v16h-176zm0 0" />
        <path d="m352 208h16v16h-16zm0 0" />
        <path d="m160 240h176v16h-176zm0 0" />
        <path d="m352 240h16v16h-16zm0 0" />
        <path d="m160 272h176v16h-176zm0 0" />
        <path d="m352 272h16v16h-16zm0 0" />
        <path d="m128 208h16v16h-16zm0 0" />
        <path d="m128 240h16v16h-16zm0 0" />
        <path d="m128 272h16v16h-16zm0 0" />
        <path
            d="m400 96c-26.472656 0-48 21.527344-48 48h16c0-17.648438 14.351562-32 32-32s32 14.351562 32 32h16c0-26.472656-21.527344-48-48-48zm0 0" />
        <path
            d="m372 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
        <path
            d="m428 72c6.617188 0 12-5.382812 12-12s-5.382812-12-12-12-12 5.382812-12 12 5.382812 12 12 12zm0-16c2.199219 0 4 1.792969 4 4s-1.800781 4-4 4-4-1.792969-4-4 1.800781-4 4-4zm0 0" />
        <path
            d="m400 0c-52.9375 0-96 43.0625-96 96 0 11.230469 2.039062 21.976562 5.601562 32h-123.203124c3.5625-10.023438 5.601562-20.769531 5.601562-32 0-52.9375-43.0625-96-96-96s-96 43.0625-96 96 43.0625 96 96 96v296c0 4.425781 3.574219 8 8 8h288c4.425781 0 8-3.574219 8-8v-296c52.9375 0 96-43.0625 96-96s-43.0625-96-96-96zm-128 144v16h-48v-16zm-256-48c0-44.113281 35.886719-80 80-80s80 35.886719 80 80-35.886719 80-80 80-80-35.886719-80-80zm368 384h-272v-289.449219c28.625-4.832031 52.945312-22.328125 67.007812-46.550781h28.992188v24c0 4.414062 3.574219 8 8 8h64c4.425781 0 8-3.585938 8-8v-24h28.992188c14.0625 24.230469 38.382812 41.71875 67.007812 46.550781zm16-304c-44.113281 0-80-35.886719-80-80s35.886719-80 80-80 80 35.886719 80 80-35.886719 80-80 80zm0 0" />
        <path
            d="m88 112h16c3.566406 0 6.710938-2.367188 7.695312-5.800781l16-56c1.058594-3.703125-.671874-7.632813-4.121093-9.351563l-8.839844-4.421875c-11.574219-5.785156-25.886719-5.785156-37.46875 0l-8.839844 4.414063c-3.449219 1.726562-5.179687 5.65625-4.121093 9.359375l16 56c.984374 3.433593 4.128906 5.800781 7.695312 5.800781zm-3.574219-61.265625c7.160157-3.574219 16-3.574219 23.160157 0l2.902343 1.457031-12.519531 43.808594h-3.9375l-12.511719-43.816406zm0 0" />
        <path d="m112 144c0 8.835938-7.164062 16-16 16s-16-7.164062-16-16 7.164062-16 16-16 16 7.164062 16 16zm0 0" />
    </svg><br />
    <span><?php echo display('no_room_found'); ?></span>
    <div>
        <?php }
                    else{
                        $datetime1 = date_create($checkin);
                    $datetime2 = date_create($checkout);
                    $interval = date_diff($datetime1, $datetime2);
                    $totalamount=round($roominfo->rate*$interval->format('%a'));
                    $firstdate = $checkin;
                    $lastdate = $checkout;
                    $datediff = strtotime($lastdate) - strtotime($firstdate);
                    $datediff = floor($datediff/(60*60*24));
                    $afterDiscount=0;
                    $discount=0;
                    for($i = 0; $i < $datediff; $i++){
                    $alldays= date("Y-m-d", strtotime($firstdate . ' + ' . $i . 'day'));
                    $getroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$roomno)->where('offer_date',$alldays)->get()->row();
                    if(!empty($getroom)){
                        $singleDiscount=$roominfo->rate-$getroom->offer;
                    $afterDiscount=$afterDiscount+$singleDiscount;
                    $discount+=$getroom->offer;
                        }
                    }
                    ?>
        <p><?php echo html_escape($roominfo->roomtype);?> <?php echo html_escape($interval->format('%a'));?>
            <?php echo display('nights_booking_from') ?> <?php echo html_escape($checkin);?> to <?php echo html_escape($checkout);?></p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row"><?php echo display('number_of_rooms') ?></th>
                        <td><input name="totalnight" type="hidden" id="totalnight"
                                value="<?php echo html_escape($interval->format('%a'));?>" /><input name="numofroom"
                                min="1" type="text" value="1" id="numofroom" onkeyup="getroomnumber()" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('number_of_person') ?></th>
                        <td><input type="hidden" id="total_person"
                                value="<?php echo html_escape($interval->format('%a'));?>" /><input name="no_of_people"
                                type="text" min="1" value="1" id="numofpeople" onkeyup="getroomnumber()" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('select_room_no') ?></th>
                        <td><select name="slroomno[]" multiple="multiple" class="selectpicker form-control"
                                data-live-search="true" size="2" id="slroomno" required>
                                <option value="" disabled><?php echo display('select_room_no') ?></option>
                                <?php $allroomno=explode(',',$freeroom);
                                foreach($allroomno as $sroom){?>
                                <option value="<?php echo html_escape($sroom);?>"><?php echo html_escape($sroom);?>
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('nights') ?></th>
                        <td><?php echo html_escape($interval->format('%a'));?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('available_room') ?></th>
                        <td><input type="hidden" value="<?php echo html_escape(count($allroomno));?>" /><span
                                id=""><?php echo html_escape(count($allroomno));?></span></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('max_people') ?></th>
                        <td><input type="hidden" id="maxpeople"
                                value="<?php echo html_escape(count($allroomno)*$roominfo->capacity);?>" /><span
                                id=""><?php echo html_escape(count($allroomno)*$roominfo->capacity);?></span></td>
                    </tr>
                    <tr hidden>
                        <td><input type="hidden" id="capacity" value="<?php echo html_escape($roominfo->capacity);?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('price_per_night') ?></th>
                        <td><input name="roomrate" type="hidden" id="roomrate"
                                value="<?php echo html_escape(round($roominfo->rate));?>" /><span
                                id="pernight"><?php echo html_escape(number_format(round($roominfo->rate)), 2, '.', ',');?></span></td>
                    </tr>

                    <tr>
                        <th scope="row"><?php echo display('offer_discount') ?></th>
                        <td><input type="hidden" value="<?php echo html_escape($discount);?>" /><span
                                id="offer"><?php echo html_escape($discount);?></span></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('sub_total') ?><input name="orgdiscount" type="hidden"
                                value="<?php echo html_escape($totalamount-$discount);?>" id="orgSubtotal" /></th>
                        <td> <input name="discount" type="hidden" id="discount"
                                value="<?php echo html_escape($totalamount-$discount);?>" /><span
                                id="prdis"><?php echo html_escape($totalamount-$discount);?></span></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('tax') ?> <input type="hidden"
                                value="<?php echo html_escape($chargeinfo->vat);?>"
                                id="orgtax"><?php echo html_escape($chargeinfo->vat);?>%</th>
                        <td><input type="hidden" id="" value="<?php echo html_escape($chargeinfo->vat);?>" /><span
                                id="prtax"><?php $tax=0; $tax=($chargeinfo->vat*($totalamount-$discount))/100; echo number_format(round($tax), 2, '.', ',');?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('service_charge') ?> <input type="hidden"
                                value="<?php echo html_escape($chargeinfo->servicecharge);?>"
                                id="serviceCharge"><?php echo html_escape($chargeinfo->servicecharge);?>%</th>
                        <td><input type="hidden" id="" value="<?php echo html_escape($chargeinfo->servicecharge);?>" />
                        <span id="prcharge"><?php $scharge=0; $scharge=($chargeinfo->servicecharge*($totalamount-$discount))/100; echo number_format(round($scharge), 2,'.',',');?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo display('grand_total') ?></th><input type="hidden"
                            value="<?php echo html_escape(round($totalamount-$discount));?>" id="orgTotal" /></th>
                        <td><input name="gramount" type="hidden" id="gramount"
                                value="<?php echo html_escape(round(($totalamount-$discount)+$scharge+$tax));?>" /><span
                                id="total"><?php echo html_escape(number_format(round(($totalamount-$discount)+$scharge+$tax), 2,'.',','));?></span></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="form-group text-left">
            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('book_now') ?></button>
        </div>
        <?php } ?>