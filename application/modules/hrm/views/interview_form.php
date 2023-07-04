 <div class="row">
     <!--  table area -->
     <div class="col-sm-12">

         <div class="card">

             <div class="card-header">
                 <h4><?php echo display('candidate_interview') ?> <small class="float-right"> <?php if ($this->permission->method('hrm', 'create')->access()) : ?>
                             <button type="button" class="btn btn-primary btn-md mb-2" data-target="#add0" data-toggle="modal"><i class="ti-plus" aria-hidden="true"></i>
                                 <?php echo display('add_interview') ?></button>
                         <?php endif; ?>
                         <?php if ($this->permission->method('hrm', 'read')->access()) : ?>
                             <a href="<?php echo base_url(); ?>hrm/manage-interview" class="btn btn-primary mb-2"><?php echo display('manage_interview') ?></a>
                         <?php endif; ?></small></h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th><?php echo display('sl') ?></th>
                                 <th><?php echo display('name') ?></th>
                                 <th><?php echo display('candidate_interview') ?></th>
                                 <th><?php echo display('job_adv_id') ?></th>
                                 <th><?php echo display('interview_date') ?></th>
                                 <th><?php echo display('interview_marks') ?></th>
                                 <th><?php echo display('written_total_marks') ?></th>
                                 <th><?php echo display('mcq_total_marks') ?></th>
                                 <th><?php echo display('total_marks') ?></th>
                                 <th><?php echo display('selection') ?></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php if (!empty($interview)) { ?>
                                 <?php $sl = 1; ?>
                                 <?php foreach ($interview as $que) { ?>
                                     <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>">
                                         <td><?php echo $sl; ?></td>
                                         <td><?php echo html_escape($que->first_name . ' ' . $que->last_name); ?></td>
                                         <td><?php echo html_escape($que->can_id); ?></td>
                                         <td><?php echo html_escape($que->position_name); ?></td>
                                         <td><?php echo html_escape($que->interview_date); ?></td>
                                         <td><?php echo html_escape($que->interview_marks); ?></td>
                                         <td><?php echo html_escape($que->written_total_marks); ?></td>
                                         <td><?php echo html_escape($que->mcq_total_marks); ?></td>
                                         <td><?php echo html_escape($que->total_marks); ?></td>
                                         <td><?php echo html_escape($que->selection); ?></td>
                                     </tr>
                                     <?php $sl++; ?>
                                 <?php } ?>
                             <?php } ?>
                         </tbody>
                     </table> <!-- /.table-responsive -->

                 </div>
                 </div>
             </div>
         </div>
     </div>

     <div id="add0" class="modal fade right" role="dialog">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <center><strong><?php echo display('interview_form') ?></strong></center>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-sm-12 col-md-12">
                             <div class="panel">
                                 <div class="panel-heading">
                                     <div class="panel-title">
                                     </div>
                                 </div>
                                 <div class="panel-body">

                                     <?php echo form_open('hrm/interview') ?>
                                     <div class="form-group row">
                                         <label for="can_id" class="col-sm-2 col-form-label"><?php echo display('candidate_name') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">

                                             <?php echo form_dropdown('can_id', $dropdowninterview, null, ' class="form-control" onchange="SelectToLoad(this.value)" id="c_id"') ?>
                                         </div>
                                         <label for="job_adv_id" class="col-sm-2 col-form-label"><?php echo display('job_adv_id') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="text" name="position_name" class="form-control" placeholder="<?php echo display('position') ?>" readonly>
                                             <input type="hidden" name="job_adv_id" class="form-control">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="interview_date" class="col-sm-2 col-form-label"><?php echo display('interview_date') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="text" name="interview_date" class="datepickers form-control" placeholder="<?php echo display('interview_date') ?>" id="interview_date">
                                         </div>
                                         <label for="interviewer_id" class="col-sm-2 col-form-label"><?php echo display('interviewer_id') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="text" name="interviewer_id" class="form-control" placeholder="<?php echo display('interviewer_id') ?>" id="interviewer_id">
                                         </div>
                                     </div>


                                     <div class="form-group row">
                                         <label for="interview_marks" class="col-sm-2 col-form-label"><?php echo display('interview_marks') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="number" name="interview_marks" step="any" class="txt form-control" placeholder="<?php echo display('interview_marks') ?>" id="interview_marks">
                                         </div>
                                         <label for="written_total_marks" class="col-sm-2 col-form-label"><?php echo display('written_total_marks') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="number" name="written_total_marks" step="any" class="txt form-control" placeholder="<?php echo display('written_total_marks') ?>" id="written_total_marks">
                                         </div>
                                     </div>



                                     <div class="form-group row">
                                         <label for="mcq_total_marks" class="col-sm-2 col-form-label"><?php echo display('mcq_total_marks') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="number" step="any" name="mcq_total_marks" class="txt form-control" placeholder="<?php echo display('mcq_total_marks') ?>" id="mcq_total_marks">
                                         </div>
                                         <label for="total_marks" class="col-sm-2 col-form-label"><?php echo display('total_marks') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">
                                             <input type="number" step="any" name="total_marks" class=" form-control" placeholder="<?php echo display('total_marks') ?>" id="total_marks">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="recommandation" class="col-sm-2 col-form-label"><?php echo display('recommandation') ?></label>
                                         <div class="col-sm-4">
                                             <input type="text" name="recommandation" class="form-control" placeholder="<?php echo display('recommandation') ?>" id="recommandation">
                                         </div>
                                         <label for="selection" class="col-sm-2 col-form-label"><?php echo display('selection') ?> <span class="text-danger">*</span></label>
                                         <div class="col-sm-4">

                                             <select name="selection" class="form-control width_100" placeholder="<?php echo display('selection') ?>" id="selection">
                                                 <option value=""><?php echo display('selection_type') ?></option>
                                                 <option value="ok"><?php echo display('selected') ?></option>
                                                 <option value="No"><?php echo display('deselected') ?></option>

                                             </select>
                                         </div>
                                     </div>


                                     <div class="form-group row">
                                         <label for="details" class="col-sm-2 col-form-label"><?php echo display('details') ?></label>
                                         <div class="col-sm-10">
                                             <textarea name="details" class="form-control" placeholder="<?php echo display('details') ?>" id="details"></textarea>
                                         </div>
                                     </div>



                                     <div class="form-group text-right">
                                         <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                                         <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                                     </div>
                                     <?php echo form_close() ?>

                                 </div>
                             </div>
                         </div>
                     </div>



                 </div>

             </div>
             <div class="modal-footer">

             </div>

         </div>

     </div>


     <script src="<?php echo MOD_URL . $module; ?>/assets/js/interviewForm.js"></script>