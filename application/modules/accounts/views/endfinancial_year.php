<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/endfinancial_year.css">
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0">Financial Year Ending</h6>
                    </div>
                    <div class="text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-8 col-offset-3">
                        <p class="alert autoupdate-error-message" id="errormsg">You can end Financial Year at the end of
                        Financial Year. If you end Financial year Your all closing balance will be added in opening
                            Balance for new Financial year</p>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <input type="hidden" id="finyear" value="<?php echo financial_year(); ?>">
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">

                        <input type="button" id="add_year" class="btn btn-danger btn-large form-control"
                            value="End Your Financial Year" onclick="yearending()">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/endfinancial_year.js"></script>