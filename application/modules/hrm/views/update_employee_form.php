<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/update_employee_form.css">
<ul class="nav nav-tabs">
    <li class="active"><a class="active" data-toggle="tab" href="#home"><?php echo display('basic_info')?></a>
    </li>
    <li><a data-toggle="tab" href="#menu1"><?php echo display('positional_info')?></a></li>
    <li><a data-toggle="tab" href="#menu2"><?php echo display('benefits')?></a></li>
    <li><a data-toggle="tabz" href="#classmenu"><?php echo display('class')?></a></li>
    <li><a data-toggle="tab" href="#menu3"><?php echo display('supervisor')?></a></li>
    <li><a data-toggle="tab" href="#menu4"><?php echo display('biographical_info')?></a></li>
    <li><a data-toggle="tab" href="#menu5"><?php echo display('additional_address')?></a></li>
    <li><a data-toggle="tab" href="#menu6"><?php echo display('emerg_contct')?></a></li>
    <li><a data-toggle="tab" href="#menu7"><?php echo display('custom')?></a></li>
</ul>
<div class="card mt-2">
    <div class="card-header">
        <h4><?php echo display('employee')?></h4>
    </div>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <?php echo form_open_multipart('hrm/employe-update/'. $data->employee_id,'id="emp_form"') ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="first_name"><?php echo display('first_name')?><sup
                                                class="color-red text-danger">*</sup></label>

                                        <input id="first_name" name="first_name" type="text" class="form-control"
                                            placeholder="First Name"
                                            value="<?php echo html_escape($data->first_name);?>">
                                        <input type="hidden" name="oldfirstname"
                                            value="<?php echo html_escape($data->first_name);?>">
                                        <input type="hidden" name="employee_id"
                                            value="<?php echo html_escape($data->employee_id);?>">

                                    </div>

                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('middle_name')?> </label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                            placeholder="Your Middle Name"
                                            value="<?php echo html_escape($data->middle_name);?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('last_name')?></label>

                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Your Last Name"
                                            value="<?php echo html_escape($data->last_name);?>">
                                        <input type="hidden" name="oldlastname"
                                            value="<?php echo html_escape($data->last_name);?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('maiden_name')?> </label>
                                        <input type="text" class="form-control" id="maiden_name" name="maiden_name"
                                            placeholder="Your Maiden Name"
                                            value="<?php echo html_escape($data->maiden_name);?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email"><?php echo display('email')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" value="<?php echo html_escape($data->email);?>">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="phone"><?php echo display('phone')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            placeholder="Your Phone Number"
                                            value="<?php echo html_escape($data->phone);?>">

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="phone"><?php echo display('alter_phone')?> <sup
                                                class="color-red "></sup></label>
                                        <input type="number" class="form-control" name="alter_phone" id="phone"
                                            value="<?php echo html_escape($data->alter_phone);?>"
                                            placeholder="Your Phone Number">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="country"><?php echo display("country"); ?></label>
                                        <?php echo form_dropdown('country', $allcountry, (!empty($data->country)?$data->country:""), ' class="form-control" id="country"') ?>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" id="state1">
                                        <?php $staelist=array($data->state=>$data->state)?>
                                        <label for="state"><?php echo display('state')?></label>
                                        <input type="text" class="form-control" id="state" name="state"
                                            placeholder="State" value="<?php echo html_escape($data->state);?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="city"><?php echo display('city')?> </label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                            value="<?php echo html_escape($data->city);?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="zip_code"><?php echo display('zip_code')?></label>
                                        <input type="number" class="form-control" id="zip_code" name="zip_code"
                                            placeholder="Your Zip Code" value="<?php echo html_escape($data->zip);?>">
                                    </div>
                                </div>

                            </div>
                            <fieldset class="border p-2">
                                <legend class="w-auto"><?php echo display('login') ?></legend>
                            </fieldset>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city"><?php echo display('username') ?></label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="<?php echo display('username') ?>"
                                            value="<?php echo html_escape($data->first_name.$data->last_name);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="zip_code"><?php echo display('password') ?></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Your Password">
                                    </div>
                                </div>

                            </div>


                            <div class="form-group text-right">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf()"
                                    value="<?php echo display('next') ?>">

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dept_id"><?php echo display('division');?> <sup
                                                class="color-red text-danger">*</sup></label><br>
                                        <select name="division" id="division" class="form-control">
                                            <option value=""> <?php echo display('select_division');?></option>
                                            <?php

                                                foreach ($dropdowndept as $division) {
                                                if ($division_type == 0) {
                                                    if ($division_type == 0) {
                                                    echo '</optgroup>';
                                                    }
                                                    echo '<optgroup label="'.$division['department_name'].'">';
                                                }
                                                $vl = $this->db->select('*')->from('department')->where('parent_id',$division['dept_id'])->get()->result(); ?>

                                            <?php   foreach ($vl as $dv) { ?>
                                            <option value="<?php echo html_escape($dv->dept_id) ?>" <?php if($data->dept_id ==$dv->dept_id){
                                                    echo 'selected';
                                                } ?>><?php echo html_escape($dv->department_name) ?></option>
                                            <?php   }  $division_type = $division['parent_id'];    
                                                }
                                                if ($division_type == 0) {
                                                echo '</optgroup>';
                                                }
                                                ?>
                                        </select>
                                        <span id="divis"></span>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="designation"><?php echo display('designation');?> <sup
                                                class="color-red text-danger">*</sup></label>

                                        <select name="pos_id" id="designation" class="form-control">
                                            <option value=""><?php echo display('select_designation');?>
                                            </option>
                                            <?php foreach ($designation as $desig) {?>
                                            <option value="<?php echo html_escape($desig->pos_id)?>" <?php if($data->pos_id == $desig->pos_id){
                                                    echo 'selected';
                                                  }?>><?php echo html_escape($desig->position_name);?></option>
                                            <?php } ?>
                                        </select>
                                        <span id="desig"></span>
                                    </div>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="period"><?php echo display('duty_type')?></label><br>
                                        <select name="duty_type" class="form-control">
                                            <option value="1" <?php if($data->duty_type ==1){
                                         echo display('selected');
                                        }?>><?php echo display('full_time')?></option>
                                            <option value="2" <?php if($data->duty_type ==2){
                                         echo display('selected');
                                        }?>> <?php echo display('part_time')?></option>
                                            <option value="3" <?php if($data->duty_type ==3){
                                         echo display('selected');
                                        }?>><?php echo display('contructual')?></option>
                                            <option value="4" <?php if($data->duty_type ==4){
                                         echo display('selected');
                                        }?>> <?php echo display('other')?></option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('hire_date')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="text" class="form-control datepickers width_480px" name="hiredate"
                                            id="hiredate" placeholder="Hire date"
                                            value="<?php echo html_escape($data->hire_date) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('original_h_date')?> <sup
                                                class="color-red text-danger">*</sup></label>

                                        <input type="text" class="form-control datepickers" name="ohiredate"
                                            id="ohiredate" placeholder="Original Hire date"
                                            value="<?php echo html_escape($data->original_hire_date) ?>">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('termination_date')?> </label>
                                        <input type="text" class="form-control datepickers" name="terminatedate"
                                            id="tdate" placeholder="Termination date"
                                            value="<?php echo html_escape($data->termination_date) ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('termination_reason')?>
                                        </label>
                                        <textarea class="form-control" name="termreason" id="treason"
                                            placeholder="Termination Reason"><?php echo html_escape($data->termination_reason) ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="period"><?php echo display('voluntary_termination')?></label>
                                        <select name="volunt_termination" class="form-control">
                                            <option value=""><?php echo display('select')?></option>
                                            <option value="1" <?php if($data->voluntary_termination ==1){
                                            echo display('selected');
                                        } ?>> <?php echo display('yes') ?></option>
                                            <option value="2" <?php if($data->voluntary_termination ==2){
                                            echo display('selected');
                                        } ?>><?php echo display('no') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('re_hire_date')?> </label>
                                        <input type="text" class="form-control datepickers" name="rehiredate"
                                            id="rhdate" placeholder="Rehire date"
                                            value="<?php echo html_escape($data->rehire_date) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="period"><?php echo display('rate_type')?> <sup
                                                class="color-red text-danger">*</sup></label>

                                        <select name="rate_type" id="rate_type" class="form-control">
                                            <option value="1" <?php if($data->rate_type ==1){
                                            echo display('selected');
                                        }?>><?php echo display('hourly') ?></option>
                                            <option value="2" <?php if($data->rate_type ==2){
                                            echo display('selected');
                                        }?>><?php echo display('salary') ?></option>
                                        </select>
                                        <span id="rat_tp"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('s_rate')?></label>
                                        <input type="number" class="form-control" name="rate" id="rate"
                                            placeholder="<?php echo display('s_rate')?>"
                                            value="<?php echo html_escape($data->rate); ?>">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="period"><?php echo display('pay_frequency')?> <sup
                                                class="color-red text-danger">*</sup></label><br>
                                        <select name="pay_frequency" id="pay_frequency" class="form-control">
                                            <option value=""><?php echo display('select_frequency') ?></option>
                                            <option value="1" <?php if($data->pay_frequency ==1){
                                            echo display('selected');
                                        }?>><?php echo display('weekly') ?></option>
                                            <option value="2" <?php if($data->pay_frequency ==2){
                                            echo display('selected');
                                        }?>><?php echo display('biweekly') ?></option>
                                            <option value="3" <?php if($data->pay_frequency ==3){
                                            echo display('selected');
                                        }?>><?php echo display('annual') ?></option>
                                        </select>
                                        <span id="frequ"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('pay_frequency_txt')?></label>
                                        <input type="text" class="form-control" name="pay_f_text" id="qfre_text"
                                            placeholder="Paym Frequency text"
                                            value="<?php echo html_escape($data->pay_frequency_txt); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('hourly_rate2')?></label>
                                        <input type="number" class="form-control" name="h_rate2" id="rate2"
                                            placeholder="Hourly Rate"
                                            value="<?php echo html_escape($data->hourly_rate2); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('hourly_rate3')?></label>
                                        <input type="number" class="form-control" name="h_rate3" id="rate3"
                                            placeholder="Hourly Rate"
                                            value="<?php echo html_escape($data->hourly_rate3); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('home_department')?></label>
                                        <input type="text" class="form-control" name="h_department" id="rate3"
                                            placeholder="Hourly Rate"
                                            value="<?php echo html_escape($data->home_department); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="work_hour"><?php echo display('department_text')?></label>
                                        <input type="text" class="form-control" name="h_dep_text" id="hdptext"
                                            placeholder="Hourly Rate"
                                            value="<?php echo html_escape($data->department_text); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf2()"
                                    value="<?php echo display('next') ?>">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <?php if(!empty($benifit)){?>
                            <div class="row">
                                <?php foreach($benifit as $benifits){?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dfs"><?php echo display('benifit_class_code')?></label>
                                        <input type="text" class="form-control" id="bnfid" name="benifit_c_code[]"
                                            value="<?php echo html_escape($benifits->bnf_cl_code); ?>"
                                            placeholder="<?php echo display('benifit_class_code')?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('benifit_desc')?></label>
                                        <input type="text" class="form-control" id="benifit_c_code_d"
                                            name="benifit_c_code_d[]"
                                            placeholder="<?php echo display('benifit_class_code_description')?>"
                                            value="<?php echo html_escape($benifits->bnf_cl_code_des); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                                        <input type="text" class="form-control datepickers" id="benifit_acc_date"
                                            name="benifit_acc_date[]"
                                            placeholder="<?php echo display('benefit_accrual_date')?>"
                                            value="<?php echo html_escape($benifits->bnff_acural_date); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status"><?php echo display('benifit_sta')?> <sup
                                                class="color-red "></sup></label>
                                        <select name="benifit_sst[]" class="form-control">
                                            <option value="1" <?php if($benifits->bnf_status ==1){
                                            echo display('selected');
                                        }?>><?php echo display('active') ?></option>
                                            <option value="2" <?php if($benifits->bnf_status ==2){
                                            echo display('selected');
                                        }?>><?php echo display('inactive') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <?php } ?>
                            <?php if(empty($benifit)){?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dfs"><?php echo display('benifit_class_code')?></label>
                                        <input type="text" class="form-control" id="bnfid" name="benifit_c_code[]"
                                            placeholder="<?php echo display('benifit_class_code')?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('benifit_desc')?></label>
                                        <input type="text" class="form-control" id="benifit_c_code_d"
                                            name="benifit_c_code_d[]"
                                            placeholder="<?php echo display('benifit_desc')?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('benifit_acc_date')?> </label>
                                        <input type="text" class="form-control datepickers" name="benifit_acc_date[]"
                                            placeholder="<?php echo display('benefit_accrual_date')?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status"><?php echo display('benifit_sta')?> <sup
                                                class="color-red "></sup></label>
                                        <select name="benifit_sst[]" class="form-control">
                                            <option value="1"><?php echo display('active') ?></option>
                                            <option value="2"><?php echo display('inactive') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <?php } ?>


                            <div id="addbenifit" class="toggle">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dfs"><?php echo display('benifit_class_code')?></label>
                                            <input type="text" class="form-control" id="bnfid" name="benifit_c_code[]"
                                                placeholder="<?php echo display('benifit_class_code')?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('benifit_desc')?></label>
                                            <input type="text" class="form-control" id="benifit_c_code_d"
                                                name="benifit_c_code_d[]"
                                                placeholder="<?php echo display('benifit_desc')?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="l_name"><?php echo display('benifit_acc_date')?>
                                            </label>
                                            <input type="text" class="form-control datepickers"
                                                name="benifit_acc_date[]"
                                                placeholder="<?php echo display('benefit_accrual_date')?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status"><?php echo display('benifit_sta')?> <sup
                                                    class="color-red "></sup></label>
                                            <select name="benifit_sst[]" class="form-control">
                                                <option value="1"><?php echo display('active') ?></option>
                                                <option value="2"><?php echo display('inactive') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="addbenifit" class="toggle">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dfs"><?php echo display('benifit_class_code')?></label>
                                                <input type="text" class="form-control" id="bnfid"
                                                    name="benifit_c_code[]"
                                                    placeholder="<?php echo display('benifit_class_code')?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="l_name"><?php echo display('benifit_desc')?></label>
                                                <input type="text" class="form-control" id="benifit_c_code_d"
                                                    name="benifit_c_code_d[]"
                                                    placeholder="<?php echo display('benifit_desc')?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="l_name"><?php echo display('benifit_acc_date')?>
                                                </label>
                                                <input type="text" class="form-control datepickers"
                                                    name="benifit_acc_date[]"
                                                    placeholder="<?php echo display('benefit_accrual_date')?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="status"><?php echo display('benifit_sta')?> <sup
                                                        class="color-red "></sup></label>
                                                <select name="benifit_sst[]" class="form-control">
                                                    <option value="1"><?php echo display('active') ?></option>
                                                    <option value="2"><?php echo display('inactive') ?></option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div id="addbenifit" class="toggle">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="dfs"><?php echo display('benifit_class_code')?></label>
                                                    <input type="text" class="form-control" id="bnfid"
                                                        name="benifit_c_code[]"
                                                        placeholder="<?php echo display('benifit_class_code')?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="l_name"><?php echo display('benifit_desc')?></label>
                                                    <input type="text" class="form-control" id="benifit_c_code_d"
                                                        name="benifit_c_code_d[]"
                                                        placeholder="<?php echo display('benifit_desc')?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="l_name"><?php echo display('benifit_acc_date')?>
                                                    </label>
                                                    <input type="text" class="form-control datepickers"
                                                        name="benifit_acc_date[]"
                                                        placeholder="<?php echo display('benefit_accrual_date')?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="status"><?php echo display('benifit_sta')?> <sup
                                                            class="color-red "></sup></label>
                                                    <select name="benifit_sst[]" class="form-control">
                                                        <option value="1"><?php echo display('active') ?>
                                                        </option>
                                                        <option value="2"><?php echo display('inactive') ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">

                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf3()"
                                    value="<?php echo display('next') ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="classmenu" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dfs"><?php echo display('class_code')?></label>
                                        <input type="text" class="form-control" id="c_code" name="c_code"
                                            placeholder="<?php echo display('class_code')?>"
                                            value="<?php echo html_escape($data->class_code); ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('class_descript')?></label>
                                        <input type="text" class="form-control" id="c_code_d" name="c_code_d"
                                            placeholder="<?php echo display('class_descript')?>"
                                            value="<?php echo html_escape($data->class_code_desc); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('class_acc_date')?> </label>
                                        <input type="text" class="form-control datepickers" id="class_acc_date"
                                            name="class_acc_date" placeholder="<?php echo display('class_acc_date')?>"
                                            value="<?php echo html_escape($data->class_acc_date); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status"><?php echo display('class_sta')?> <sup
                                                class="color-red "></sup></label>
                                        <select name="class_sst" class="form-control">
                                            <option value="1" <?php if($data->class_status==1){
                                          echo display('selected');
                                        }?>><?php echo display('active') ?></option>
                                            <option value="2" <?php if($data->class_status==2){
                                          echo display('selected');
                                        }?>><?php echo display('inactive') ?></option>
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="form-group text-right">

                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_class()"
                                    value="<?php echo display('next') ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="s_name"><?php echo display('super_visor_name')?></label>
                                        <select name="supervisorname" class="form-control">
                                            <?php foreach ($supervisor as $suplist) {?>
                                            <option value="<?php echo html_escape($suplist->employee_id)?>" <?php if($data->super_visor_id==$suplist->employee_id){
                                            echo display('selected');
                                        }?>><?php echo html_escape($suplist->first_name.' '.$suplist->last_name)?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name"><?php echo display('is_super_visor')?></label>
                                        <select name="is_supervisor" class="form-control">
                                            <option value="1" <?php if($data->is_super_visor==1){
                                            echo display('selected');
                                        }?>><?php echo display('yes') ?></option>
                                            <option value="0" <?php if($data->is_super_visor==0){
                                            echo display('selected');
                                        }?>><?php echo display('no') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reports"><?php echo display('supervisor_report')?> </label>
                                        <input type="text" class="form-control" id="benifit_acc_date" name="reports"
                                            placeholder="Reports"
                                            value="<?php echo html_escape($data->supervisor_report);?>">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group text-right">

                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf4()"
                                    value="<?php echo display('next') ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu4" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="s_name"><?php echo display('dob')?><sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="text" class="form-control datepickers" id="dob" name="dob"
                                            placeholder="Date Of Birth" value="<?php echo html_escape($data->dob);?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender"><?php echo display('gender')?><sup
                                                class="color-red text-danger">*</sup></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="1" <?php if($data->gender==1){
                                            echo display('selected');
                                        }?>><?php echo display('male') ?></option>
                                            <option value="2" <?php if($data->gender==2){
                                            echo display('selected');
                                        }?>><?php echo display('female') ?></option>
                                            <option value="2" <?php if($data->gender==3){
                                            echo display('selected');
                                        }?>><?php echo display('other') ?></option>
                                        </select>
                                        <span id="gend"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="reports"><?php echo display('marital_stats')?> </label>
                                        <select name="marital_status" class="form-control">
                                            <option value="1" <?php if($data->marital_status==1){
                                            echo display('selected');
                                        }?>><?php echo display('single') ?></option>
                                            <option value="2" <?php if($data->marital_status==2){
                                            echo display('selected');
                                        }?>><?php echo display('married') ?></option>
                                            <option value="3" <?php if($data->marital_status==3){
                                            echo display('selected');
                                        }?>><?php echo display('divorced') ?></option>
                                            <option value="4" <?php if($data->marital_status==4){
                                            echo display('selected');
                                        }?>><?php echo display('widowed') ?></option>
                                            <option value="5" <?php if($data->marital_status==5){
                                            echo display('selected');
                                        }?>><?php echo display('other') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="s_name"><?php echo display('ethnic_group')?></label>
                                        <input type="text" class="form-control" id="ethnic" name="ethnic"
                                            placeholder="Ethnic" value="<?php echo html_escape($data->ethnic_group);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="eeo_class"><?php echo display('eeo_class_gp')?></label>
                                        <input type="text" class="form-control" id="eeo_class" name="eeo_class"
                                            placeholder="EEO Class Group"
                                            value="<?php echo html_escape($data->eeo_class_gp);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ssn"><?php echo display('ssn')?></label>
                                        <input type="text" class="form-control" id="ssn" name="ssn" placeholder="SSN"
                                            value="<?php echo html_escape($data->ssn);?>">

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="w_s"><?php echo display('work_in_state')?></label>
                                        <select name="w_s" class="form-control">
                                            <option value="1" <?php if($data->work_in_state==1){
                                            echo display('selected');
                                        }?>><?php echo display('yes') ?></option>
                                            <option value="2" <?php if($data->work_in_state==2){
                                            echo display('selected');
                                        }?>><?php echo display('no') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_in_s"><?php echo display('live_in_state')?></label>
                                        <select name="l_in_s" class="form-control">
                                            <option value="1" <?php if($data->live_in_state==1){
                                            echo display('selected');
                                        }?>><?php echo display('yes') ?></option>
                                            <option value="2" <?php if($data->live_in_state==2){
                                            echo display('selected');
                                        }?>><?php echo display('no') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="citizenship"><?php echo display('citizenship')?></label>
                                        <select name="citizenship" class="form-control">
                                            <option value=""><?php echo display('select_option') ?></option>
                                            <option value="1" <?php if($data->citizenship==1){
                                          echo display('selected');
                                        }?>><?php echo display('citizen') ?></option>
                                            <option value="0" <?php if($data->citizenship==0){
                                          echo display('selected');
                                        }?>><?php echo display('non_citizen') ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="picture"><?php echo display('picture')?></label>
                                    <input type="file" accept="image/*" name="picture" onchange="loadFile(event)">
                                    <small id="fileHelp" class="text-muted"><img
                                            src="<?php echo base_url().html_escape($data->picture) ?>" id="output"
                                            class="img-thumbnail h_150_w_200" />
                                    </small>
                                    <input type="hidden" name="old_image"
                                        value="<?php echo html_escape($data->picture);?>">
                                </div>

                            </div>

                            <div class="form-group text-right">

                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf5()"
                                    value="<?php echo display('next') ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu5" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="s_name"><?php echo display('home_email')?></label>
                                        <input type="email" class="form-control" id="h_email" name="h_email"
                                            placeholder="Home Email"
                                            value="<?php echo html_escape($data->home_email);?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="b_email"><?php echo display('business_email')?></label>
                                        <input type="email" class="form-control" id="b_email" name="b_email"
                                            placeholder="Business Email"
                                            value="<?php echo html_escape($data->business_email);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="h_phone"><?php echo display('home_phone')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="number" class="form-control" id="h_phone" name="h_phone"
                                            placeholder="Home Phone"
                                            value="<?php echo html_escape($data->home_phone);?>">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="w_phone"><?php echo display('business_phone')?> </label>
                                        <input type="number" class="form-control" id="w_phone" name="w_phone"
                                            placeholder="Work Phone"
                                            value="<?php echo html_escape($data->business_phone);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="c_phone"><?php echo display('cell_phone')?> <sup
                                                class="color-red text-danger">*</sup></label>

                                        <input type="number" class="form-control" id="c_phone" name="c_phone"
                                            placeholder="Cell Phone"
                                            value="<?php echo html_escape($data->cell_phone);?>">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">

                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary btnNext" onclick="valid_inf6()"
                                    value="<?php echo display('next') ?>">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu6" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="s_name"><?php echo display('emerg_contct')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="number" class="form-control" id="em_contact" name="em_contact"
                                            placeholder="<?php echo display('emerg_contct')?>"
                                            value="<?php echo html_escape($data->emerg_contct);?>">

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_h_phone"><?php echo display('emerg_home_phone')?> <sup
                                                class="color-red text-danger">*</sup></label>

                                        <input type="number" class="form-control" id="e_h_phone" name="e_h_phone"
                                            placeholder="<?php echo display('emerg_home_phone')?>"
                                            value="<?php echo html_escape($data->emrg_h_phone);?>">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_w_phone"><?php echo display('emrg_w_phone')?> <sup
                                                class="color-red text-danger">*</sup></label>
                                        <input type="number" class="form-control" id="e_w_phone" name="e_w_phone"
                                            placeholder="<?php echo display('emrg_w_phone')?>"
                                            value="<?php echo html_escape($data->emrg_w_phone);?>">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_c_relation"><?php echo display('emer_con_rela')?> </label>
                                        <input type="text" class="form-control" id="e_c_relation" name="e_c_relation"
                                            placeholder="<?php echo display('emer_con_rela')?>"
                                            value="<?php echo html_escape($data->emgr_contct_relation);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="alt_em_cont"><?php echo display('alt_em_contct')?></label>
                                        <input type="number" class="form-control" id="alt_em_cont" name="alt_em_cont"
                                            placeholder="<?php echo display('alt_em_contct')?>"
                                            value="<?php echo html_escape($data->alt_em_contct);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="a_e_h_phone"><?php echo display('alt_emg_h_phone')?>
                                        </label>
                                        <input type="number" class="form-control" id="a_e_h_phone" name="a_e_h_phone"
                                            placeholder="<?php echo display('alt_em_contct')?>"
                                            value="<?php echo html_escape($data->alt_emg_h_phone);?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="a_e_w_phone"><?php echo display('alt_emg_w_phone')?>
                                        </label>
                                        <input type="number" class="form-control" id="a_e_w_phone" name="a_e_w_phone"
                                            placeholder="<?php echo display('alt_emg_w_phone')?>"
                                            value="<?php echo html_escape($data->alt_emg_w_phone);?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="button" class="btn btn-primary" value="<?php echo display('next') ?>"
                                    onclick="valid_inf7()">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu7" class="tab-pane fade">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <span>
                                <?php foreach($custominfo as $custom){ ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                                            <input type="text" class="form-control" id="c_f_name" name="c_f_name[]"
                                                value="<?php echo html_escape($custom->custom_field); ?>"
                                                placeholder="Custom Field Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                                            <select name="c_f_type[]" class="form-control">
                                                <option value="1" <?php if($custom->custom_data_type==1){ 
                                            echo 'selected';
                                        } ?>>Text</option>
                                                <option value="2" <?php if($custom->custom_data_type==2){ 
                                            echo 'selected';
                                        } ?>>Date</option>
                                                <option value="3" <?php if($custom->custom_data_type==3){ 
                                            echo 'selected';
                                        } ?>>Text Area</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="reports"><?php echo 'Custom Value'?> </label>
                                            <input type="text" name="customvalue[]" class="form-control"
                                                placeholder="custom value"
                                                value="<?php echo html_escape($custom->custom_data); ?>">

                                        </div>
                                    </div>

                                </div>

                                <?php } ?>
                            </span>
                            <div id="add" class="toggle">
                                <span>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                                                <input type="text" class="form-control" id="c_f_name" name="c_f_name[]"
                                                    placeholder="Custom Field Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                                                <select name="c_f_type[]" class="form-control">
                                                    <option value="1"><?php echo display('text') ?></option>
                                                    <option value="2"><?php echo display('date') ?></option>
                                                    <option value="3"><?php echo display('text_area') ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="reports"><?php echo 'Custom Value'?> </label>
                                                <input type="text" name="customvalue[]" class="form-control"
                                                    placeholder="custom value">

                                            </div>
                                        </div>

                                    </div>
                                </span>
                                <div id="add" class="toggle">
                                    <span>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="c_f_name"><?php echo 'Custom Field Name';?></label>
                                                    <input type="text" class="form-control" id="c_f_name"
                                                        name="c_f_name[]" placeholder="Custom Field Name">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="c_f_type"><?php echo 'Custom Field Type';?></label>
                                                    <select name="c_f_type[]" class="form-control">
                                                        <option value="1"><?php echo display('text') ?></option>
                                                        <option value="2"><?php echo display('date') ?></option>
                                                        <option value="3"><?php echo display('text_area') ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="reports"><?php echo 'Custom Value'?> </label>
                                                    <input type="text" name="customvalue[]" class="form-control"
                                                        placeholder="custom value">

                                                </div>
                                            </div>

                                        </div>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <input type="button" class="btn btn-primary btnPrevious"
                                    value="<?php echo display('previous') ?>">
                                <input type="submit" class="btn btn-success" onclick="valid_inf8()"
                                    value="<?php echo display('update') ?>">
                            </div>

                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/employeForm.js"></script>