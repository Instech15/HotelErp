<link href="<?php echo base_url('application/modules/stripe/assets/css/stripe_view.css') ?>" rel="stylesheet"
    type="text/css" />
<!-- Contact Area -->
<section class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="form-container">

                    <?php echo form_open('hotel/stripePost','method="post" id="payment-form" class="require-validation" role="form" data-stripe-publishable-key="'.$paymentinfo->password.'"')?>
                    <div class='form-row row' id="errordiv" hidden>
                        <div class='col-md-12 error form-group'>
                            <div class='alert-danger alert'></div>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-6 form-group required'>
                            <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-6 form-group required'>
                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                class='form-control card-number' size='20' type='text'>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="hidden" id="amount" name="amount"
                                value="<?php echo round($orderinfo->total_price);?>">
                            <input type="hidden" id="currency" name="currency"
                                value="<?php echo $paymentinfo->currency;?>">
                            <input type="hidden" id="orderid" name="orderid"
                                value="<?php echo $orderinfo->booking_number;?>">
                            <button class="btn btn-primary btn-lg btn-block ml-3" type="submit">Pay Now</button>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="<?php echo base_url(); ?>application/modules/stripe/assets/js/stripe.js"></script>