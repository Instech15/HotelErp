<label for="state"><?php echo display('state')?></label>
 <?php echo form_dropdown('state', $state_list, (!empty($emp->state)?$emp->state:"York"), ' class="form-control"') ?> 