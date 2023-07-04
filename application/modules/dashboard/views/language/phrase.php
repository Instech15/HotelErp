<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="btn-group">
                    <h4><?php echo display("phrase_list") ?></h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="phraselist">
                        <thead>
                            <tr>
                                <td colspan="2">
                                    <?php echo form_open('dashboard/language/addPhrase', ' class="form-inline" ') ?>
                                    <div class="form-group">
                                        <label class="sr-only" for="addphrase">
                                            <?php echo display('phrase_name') ?></label>
                                        <input name="phrase[]" type="text" class="form-control" id="addphrase"  placeholder="Phrase Name" required="" autofocus>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><?php echo display('save') ?></button>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-th-list"></i></th>
                                <th><?php echo display('phrase') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('application/modules/dashboard/assets/js/phrase.js') ?>"></script>