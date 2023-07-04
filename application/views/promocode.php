<div class="list_item mb-3">
    <span class="list_item_name font-weight-600 text-dark"><?php echo display('total_price') ?></span>
    <div class="list_item_price">
        <span class="rack-price text-danger">
            <?php if($total_discount>0){?><s><?php if($currency_possition==1){echo $currency_icon;}?><?php  $dis=$total_discount; echo number_format($dis,2, '.', ','); ?><?php if($currency_possition==2){echo $currency_icon;}?></s><?php } ?>
        </span>
        <span class="discount-price text-success fs-21 font-weight-600" data-toggle="popover" data-html="true"
            data-placement="top" data-content="<p class='mb-0'><?php echo  html_escape($pricetext); ?></p>">
            <?php if($currency_possition==1){echo $currency_icon;}?><?php echo html_escape(number_format($total_amount,2,'.',',')); ?><?php if($currency_possition==2){echo $currency_icon;}?>
            * <i class="fas fa-info-circle fs-14"></i></span>
        <!-- /.End of popover -->
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/popover.js"></script>