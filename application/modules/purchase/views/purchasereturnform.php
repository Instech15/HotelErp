<div class="row mt-4" id="supplier_info">
    <div class="form-group row">
        <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i
                class="text-danger"></i></label>
        <div class="col-sm-6">
            <input type="text" tabindex="2" class="form-control datepickers" name="return_date"
                value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('return_date') ?>" required />
        </div>
    </div>
</div>
<?php if($returnitem->status!=1){?>
<?php if(!empty($returnitem->details)){?>
<table class="table table-bordered table-hover" id="purchase">
    <thead>
        <tr>
            <th class="text-center"><?php echo display('ingredient_name') ?> <i class="text-danger"></i></th>
            <th class="text-center"><?php echo display('purchase_qty') ?></th>
            <th class="text-center"><?php echo display('return_qty') ?> <i class="text-danger">*</i></th>

            <th class="text-center"><?php echo display('price') ?> <i class="text-danger"></i></th>
            <th class="text-center"><?php echo display('discount') ?></th>
            <th class="text-center"><?php echo display('total') ?></th>
        </tr>
    </thead>
    <tbody id="addinvoiceItem">
        <?php 
                                    $sl=1;
									$grtotal=0;
                                    foreach ($returnitem->details as $return) {
										$grtotal=$grtotal+($return->quantity*$return->price);
										?>


        <tr>
            <td class="width_200px">
                <input type="text" name="product_name" value="<?php echo html_escape($return->product_name); ?>"
                    class="form-control productSelection" required placeholder='<?php echo display('product_name') ?>'
                    id="product_names" tabindex="3" readonly="">

                <input type="hidden" name="product_id[]" class="product_id_<?php echo $sl;?> autocomplete_hidden_value"
                    value="<?php echo html_escape($return->proid);?>" id="product_id_<?php echo $sl;?>" />

            </td>
            <td>
                <input type="text" name="recv_qty[]" class="form-control text-right " id="orderqty_<?php echo $sl;?>"
                    value="<?php echo html_escape($return->quantity); ?>" readonly="" />
            </td>
            <td>
                <input type="text" name="total_qntt[]" id="quantity_<?php echo $sl;?>"
                    class="form-control retqty text-right store_cal_<?php echo $sl;?>"
                    onkeyup="calculate_store(<?php echo $sl;?>),checkqty(<?php echo $sl;?>);"
                    onchange="calculate_store(<?php echo $sl;?>);" placeholder="0" value="" min="0" tabindex="8" />
            </td>


            <td>
                <input type="text" name="prate[]"
                    onkeyup="calculate_store(<?php echo $sl;?>),checkqty(<?php echo $sl;?>);"
                    onchange="calculate_store(<?php echo $sl;?>);" id="product_rate_<?php echo $sl;?>"
                    class="form-control product_rate_<?php echo $sl;?> text-right" placeholder="0"
                    value="<?php echo html_escape($return->price);?>" min="0" tabindex="9" required="required"
                    readonly />
            </td>
            <td class="test">
                <input type="text" name="discount[]"
                    onkeyup="calculate_store(<?php echo $sl;?>),checkqty(<?php echo $sl;?>);"
                    id="discount_<?php echo $sl;?>" class="form-control discount_<?php echo $sl;?> text-right"
                    placeholder="0.00" value="" min="0" tabindex="9" />
            </td>
            <!-- Discount -->
            <td>
                <input class="form-control total_price text-right" type="text" name="total_price[]"
                    id="total_price_<?php echo $sl;?>"
                    value="0" readonly="readonly" />
            </td>
        </tr>
        <?php $sl++; } 
                                 ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4">
                <center><label for="reason" class="col-form-label text_align"><?php echo display('reason') ?></label>
                </center>
                <textarea class="form-control" name="reason" id="reason"
                    placeholder="<?php echo display('reason') ?>"></textarea> <br>
            </td>
            <td class="text_align_right"><b><?php echo display('total') ?>:</b></td>
            <td class="text-right">
                <input type="text" id="grandTotal" name="grand_total_price" class="form-control text-right"
                    value="0" readonly="readonly" />
            </td>
            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>" />
        </tr>
    </tfoot>
</table>
<?php } 
                           else{?>
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
<?php echo display('no_result_found'); }
                                 ?>
<?php }else{ ?>
    <h4 class="text-center text-danger">You can not return any purchase item after payment.</h4>
<?php } ?>
<div class="form-group row">
    <label for="example-text-input" class=" col-form-label"></label>
    <div class="col-sm-12 text-right">

        <input type="submit" id="add_return" class="btn btn-success btn-large d_none" name="pretid"
            value="<?php echo display('return') ?>" tabindex="9" />

    </div>
</div>
<?php echo form_close()?>
<script src="<?php echo MOD_URL.$module;?>/assets/js/purchaseReturnForm.js"></script>