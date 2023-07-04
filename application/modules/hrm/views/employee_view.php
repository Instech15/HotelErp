<div class="row">
            <div class="col-sm-12">
                <div class="card">
                	<div class="card-header"><h4><?php echo display('manage_employee') ?></h4></div>
                </div>
            </div>
        </div>
<div class="row">
    <!--  table area -->
    <div class="col-sm-12 col-xl-12">

        <div class="card"> 
          <div class="">
            <div class="card-body table-responsive">
            	<div class="">
                <table width="100%" id="exdatatable" class="datatable table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                           <th><?php echo display('sl') ?></th>
                           <th><?php echo display('picture')?></th>
                           <th><?php echo display('employee_id')?></th>
                           <th><?php echo display('first_name')?></th>
                           <th><?php echo display('last_name')?></th>
                           <th><?php echo display('designation')?></th>
                           <th><?php echo display('phone')?></th>
                           <th><?php echo display('email')?></th>
                           <th><?php echo display('division')?></th>
                           <th><?php echo display('duty_type')?></th>
                           <th><?php echo display('hire_date')?></th>
                           <th><?php echo display('original_h_date')?></th>
                           <th><?php echo display('termination_date')?></th>
                           <th><?php echo display('termination_reason')?></th>
                           <th><?php echo display('voluntary_termination')?></th>
                           <th><?php echo display('re_hire_date')?></th>
                           <th><?php echo display('rate_type')?></th>
                           <th><?php echo display('s_rate')?></th>
                           <th><?php echo display('pay_frequency_txt')?></th>
                           <th><?php echo display('hourly_rate2')?></th>
                           <th><?php echo display('hourly_rate3')?></th>
                           <th><?php echo display('home_department')?></th>
                           <th><?php echo display('department_text')?></th>
                           <th><?php echo display('super_visor_name')?></th>
                           <th><?php echo display('is_super_visor')?></th>
                           <th><?php echo display('supervisor_report')?></th>
                           <th><?php echo display('dob')?></th>
                           <th><?php echo display('gender')?></th>
                           <th><?php echo display('marital_stats')?></th>
                           <th><?php echo display('ethnic_group')?></th>
                           <th><?php echo display('eeo_class_gp')?></th>
                           <th><?php echo display('ssn')?></th>
                           <th><?php echo display('work_in_state')?></th>
                           <th><?php echo display('live_in_state')?></th>
                           <th><?php echo display('home_email')?></th>
                           <th><?php echo display('business_email')?></th>
                           <th><?php echo display('home_phone')?></th>
                           <th><?php echo display('business_phone')?></th>
                           <th><?php echo display('cell_phone')?></th>
                           <th><?php echo display('emerg_contct')?></th>
                           <th><?php echo display('emerg_home_phone')?></th>
                           <th><?php echo display('emrg_w_phone')?></th>
                           <th><?php echo display('emer_con_rela')?></th>
                           <th><?php echo display('alt_em_contct')?></th>
                           <th><?php echo display('alt_emg_h_phone')?></th>
                           <th><?php echo display('alt_emg_w_phone')?></th>
                           <th><?php echo display('action')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($emp_history)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($emp_history as $row) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><img src="<?php echo html_escape(base_url(!empty($row->picture)?$row->picture:'assets/img/hrm/manage_employee.png')); ?>" alt="Image" height="64" ></td>
                                    <td><?php echo html_escape($row->emp_his_id); ?></td>
                                <td ><?php echo html_escape($row->first_name); ?></td>
                                <td><?php echo html_escape($row->last_name); ?></td>
                                <td><?php echo html_escape($row->position_name); ?></td>
                                <td><?php echo html_escape($row->phone); ?></td>
                                <td><?php echo html_escape($row->email); ?></td>
                                <td><?php echo html_escape($row->department_name); ?></td>
                                <td><?php echo html_escape($row->type_name); ?></td> 
                                <td><?php echo html_escape($row->hire_date); ?></td> 
                                <td><?php echo html_escape($row->original_hire_date); ?></td>
                                <td><?php echo html_escape($row->termination_date); ?></td>
                                <td><?php echo html_escape($row->termination_reason); ?></td>
                                <td><?php echo html_escape($row->voluntary_termination); ?></td>
                                <td><?php echo html_escape($row->rehire_date); ?></td>
                                <td><?php if($row->rate_type == 1){ echo display('hourly');}else{ echo display('salary');}?></td> 
                                <td><?php echo html_escape($row->rate); ?></td>
                                <td><?php echo html_escape($row->pay_frequency_txt); ?></td>  
                                <td><?php echo html_escape($row->hourly_rate2); ?></td>  
                                <td><?php echo html_escape($row->hourly_rate3); ?></td>  
                                <td><?php echo html_escape($row->home_department); ?></td>  
                                <td><?php echo html_escape($row->department_text); ?></td>
                                <td><?php echo html_escape($row->super_visor_id); ?></td> 
                                <td><?php echo html_escape($row->is_super_visor); ?></td> 
                                <td><?php echo html_escape($row->supervisor_report); ?></td>                
                                 <td><?php echo html_escape($row->dob); ?></td>
                                <td><?php echo html_escape($row->gender_name); ?></td>
                                <td><?php echo html_escape($row->marital_sta); ?></td>
                                <td><?php echo html_escape($row->ethnic_group); ?></td>
                                <td><?php echo html_escape($row->eeo_class_gp); ?></td>
                                <td><?php echo html_escape($row->ssn); ?></td>
                                <td><?php echo html_escape($row->work_in_state); ?></td>
                                <td><?php echo html_escape($row->live_in_state); ?></td>
                                <td><?php echo html_escape($row->home_email); ?></td>
                                <td><?php echo html_escape($row->business_email); ?></td>
                                <td><?php echo html_escape($row->home_phone); ?></td>
                                <td><?php echo html_escape($row->business_phone); ?></td>
                                <td><?php echo html_escape($row->cell_phone); ?></td>
                                <td><?php echo html_escape($row->emerg_contct); ?></td>
                                <td><?php echo html_escape($row->emrg_h_phone); ?></td>
                                <td><?php echo html_escape($row->emrg_w_phone); ?></td>
                                <td><?php echo html_escape($row->emgr_contct_relation); ?></td>
                                <td><?php echo html_escape($row->alt_em_contct); ?></td>
                                <td><?php echo html_escape($row->alt_emg_h_phone); ?></td>
                                <td><?php echo html_escape($row->alt_emg_w_phone); ?></td>


                                    <td class="center">
                                      <a href="<?php echo base_url("hrm/employe-update/".html_escape($row->employee_id)) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a> 
                                      <?php if($row->employee_id=='E4Y91CAX'){?>
                                        
                                        <?php } 
										else{
										?>
                                          <a href="<?php echo base_url("hrm/Employees/delete_employhistory/".html_escape($row->employee_id)) ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "title="Delete "><i class="ti-trash"></i></a>
                                        <?php } ?>
                                        <a href="<?php echo base_url("hrm/Employees/cv/".html_escape($row->employee_id));?>" class="btn btn-xs btn-success"><i class="ti-user"></i></a>
                                       
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
