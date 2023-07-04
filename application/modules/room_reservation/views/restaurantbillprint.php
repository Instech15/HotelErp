<link rel="stylesheet" href="<?php echo MOD_URL;?>room_reservation/assets/css/poolprint.css">
<link rel="stylesheet" href="<?php echo MOD_URL;?>room_reservation/assets/css/checkoutview.css">
<?php 
    $invoice_logo = $this->db->select('*')->from('common_setting')->get()->row();
    $hotel_details = $this->db->select('*')->from('setting')->get()->row();
    $day =  date("l");
    $month =  date("F");
    $date =  date("d");
    $year =  date("Y");
?>
    <head>
        <title><?php echo html_escape($hotel_details->title) ?></title>
    </head>

    <body>
        <!--Print button-->
        <button href="#" class="poolprint-btn">
        </button>
        <div class="invoice-wrap print-restaurant invp-1">
            <div class="invp-2"><?php echo display("unpaid") ?></div>
            <div class="invp-3">
                <img src="<?php  echo base_url(html_escape($invoice_logo->invoice_logo))  ?>" alt="..."
                    class="invp-img">
                <h2 class="invp-4">
                    <?php echo html_escape($hotel_details->title);?></h2>
                <p class="invp-5"><?php echo display("address") ?>: <?php echo html_escape($hotel_details->address); ?></p>

                <p class="invp-6"><?php echo display("issue_date") ?>: <?php echo $day.', '.$month.' ' .$date.', '.$year;?></p>
            </div>
            <div class="invp-7">
                <div>
                    <p class="invp-8">
                    <?php echo display("invoiced_from") ?></p>
                    <strong class="invp-9"><?php echo html_escape($hotel_details->title) ?></strong><br>
                    <span class="invp-10"><?php echo display("mobile") ?>:&nbsp;</span><?php echo html_escape($hotel_details->phone);?>
                    <br>
                    <span
                        class="invp-10"><?php echo display("email") ?>:&nbsp;</span><?php echo html_escape($hotel_details->email);?><br>
                    <span class="invp-10"><?php echo display("website") ?>:&nbsp;</span><?php echo base_url()?><br>
                </div>
                <div class="invp-11">
                    <p class="invp-8">
                    <?php echo display("invoiced_to") ?></p>
                    <div>
                        <address class="invp-12">
                            <strong class="invp-9"><?php echo display("details_of_the_guest") ?> </strong><br>
                            <?php if($rcustomer->firstname){?><span class="invp-10"><?php echo display("guests_name") ?>
                                :&nbsp;</span><?php echo html_escape($rcustomer->firstname); ?><br><?php }?>
                            <?php if($rcustomer->cust_phone){?><span
                                class="invp-10"><?php echo display("mobile") ?>:&nbsp;</span><?php if($rcustomer->cust_phone){echo html_escape($rcustomer->cust_phone);} ?>
                            <br><?php }?>
                            <?php if($rcustomer->email){?><span
                                class="invp-10"><?php echo display("email") ?>:&nbsp;</span><?php if($rcustomer->email){echo html_escape($rcustomer->email);}?><?php }?>
                        </address>
                    </div>
                </div>
            </div>
            <!-- Order Details -->
            <table
                class="invp-13">
                <thead>
                    <tr>
                        <th class="invp-14"><?php echo display("sl") ?></th>
                        <th class="invp-14"><?php echo display("item_name") ?></th>
                        <th class="invp-14"><?php echo display("price") ?> </th>
                        <th class="invp-14"><?php echo display("qty") ?></th>
                        <th class="invp-14"><?php echo display("sub_total") ?> </th>
                    </tr>
                </thead>
                <tbody>
                     <?php $total = 0; $subtotal = 0; ?>   
                     <?php for($i=0;$i<count($ritems); $i++){ ?>   
                        <?php for($j=0;$j<count($ritems[$i]); $j++){ ?>   
                            <?php $sl = 1; $total += $ritems[$i][$j]->totalamount;?>
                            <?php foreach ($ritems[$i][$j]->details as $row) { ?>
                            <tr>
                                <td class="invp-14"><?php echo $sl; ?></td>
                                <td class="invp-14">
                                    <?php echo html_escape($row->ProductName); ?></td>
                                <td class="invp-14"> <?php $subtotal += $row->price; echo html_escape($row->price); ?>
                                </td>
                                <td class="invp-14"> <?php echo html_escape($row->menuqty); ?>
                                </td>
                                <td class="invp-14">
                                    <?php echo html_escape($row->subtotal); ?></td>
                            </tr>
                            <?php $sl++; ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            <!-- /Order Details -->
            <!-- Table Total -->
            <table border="0" cellpadding="0" cellspacing="0" align="center" class="invp-24">
                <tbody>

                    <tr>
                        <td
                            class="invp-25 pl-4">
                            <span><?php echo display("tax") ?> </span>
                        </td>
                        <td class="invp-25">
                            <span><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo $total - $subtotal; ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td
                            class="invp-25 pl-4">
                            <strong><?php echo display("grand_total") ?> </strong>
                        </td>
                        <td class="invp-25">
                            <strong><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?><?php echo html_escape($total); ?><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?>
                            </strong>
                        </td>
                    </tr>

                </tbody>
            </table>
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
    </body>

    <script src="<?php echo MOD_URL;?>room_reservation/assets/js/restprint.js"></script>
