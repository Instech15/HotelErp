<?php if ($this->session->flashdata('message')) { ?>
<input type="hidden" id="msg" value="<?php echo $this->session->flashdata('message') ?>">
<?php } ?>
<?php if ($this->session->flashdata('exception')) { ?>
<input type="hidden" id="exmsg" value="<?php echo $this->session->flashdata('exception') ?>">
<?php } ?>
<?php if (validation_errors()) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo validation_errors() ?>
</div>
<?php } ?>
<script src="<?php echo base_url('assets/js/message.js') ?>" type="text/javascript"></script>