<div>
    <script src="<?php echo MOD_URL.$module;?>/assets/js/script.js"></script>

    <small class="float-right" id="print">
        <input type="button" class="btn btn-info button-print text-white" name="btnPrint" id="btnPrint" value="Print"
            onclick="printContent('printArea')" />
    </small></button>
</div>


<?php
    $total=0;

    foreach ($ab as $ca){}?>
<div id="printArea">
<table class="table table-striped"  width="100%">


    <div class="report-head">

        <?php echo display('attendance_report') ?>
    </div>
    <div class="row">
        <div class="col-sm-8">

            <div class=" report-head-cont text-left ">
                <?php echo display('name') ?>:<?php
                echo html_escape((!empty($ca->first_name)?$ca->first_name:null)." ".(!empty($ca->last_name)?$ca->last_name:null));?>
            </div>
            <div class=" report-head-cont text-left ">
                ID NO: <?php echo html_escape((!empty($ca->employee_id)?$ca->employee_id:null)) ;?>
            </div>
            <div class=" report-head-cont text-left ">
                <?php echo display('designation') ?>: <?php if(!empty($ca->pos_id)){
                    $pos_name = $this->db->select('position_name')->from('position')->where('pos_id',$ca->pos_id)->get()->row();
                    echo $pos_name->position_name;
                }?>
            </div>
        </div>
    </div>
</table>
<table class="table table-striped" width="100%">
    <tr>
        <th> <?php echo display('sl') ?></th>
        <th> <?php echo display('date') ?></th>
        <th> <?php echo display('checkin') ?></th>
        <th> <?php echo display('checkout') ?></th>
        <th> <?php echo display('staytime') ?></th>
    </tr>
    <?php
    $x=1;
    foreach($query as $qr){?>
    <tr>
        <td><?php echo $x++;?></td>
        <td><?php echo html_escape($qr->date)?></td>
        <td><?php echo html_escape($qr->sign_in)?></td>
        <td><?php echo html_escape($qr->sign_out)?></td>
        <td><?php echo html_escape($qr->staytime) ?></td>
    </tr>
    <?php }?>

</table>
</div>