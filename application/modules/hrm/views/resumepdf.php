
<div class="row">
    <div class="col-sm-12 col-md-4">

        <div class="card-header">

            <div> <?php echo "<img src='" . base_url().$row->picture."' width=100px; height=100px; class=img-circle>";?></div>
        </div>
        <div class="card-content">
            <div class="card-content-member">
                <h4 class="m-t-0"><?php echo html_escape($row->first_name."  " .$row->last_name);?><span class="c_color"> <span class="<?php if ($perform > 0 && $perform < 1) {
                        echo 'fa fa-star-half';
                    }else if($perform >=1) {
                        echo 'fa fa-star';
                    }else{ echo 'fa fa-star-o'; } ?>" ></span>
                    <span class="<?php if ($perform > 1 && $perform < 2) {
                        echo 'fa fa-star-half';
                    }else if($perform >=2) {
                        echo 'fa fa-star';
                    }else{ echo 'fa fa-star-o'; } ?>" ></span>
                    <span class="<?php if ($perform > 2 && $perform < 3) {
                        echo 'fa fa-star-half';
                    }else if($perform >=3) {
                        echo 'fa fa-star';
                    }else{ echo 'fa fa-star-o';} ?>"></span>
                    <span class="<?php if ($perform > 3 && $perform < 4) {
                        echo 'fa fa-star-half';
                    }else if($perform >=4) {
                        echo 'fa fa-star';
                    }else{ echo 'fa fa-star-o'; } ?>" ></span>
                    <span class="<?php if ($perform > 4 && $perform < 5) {
                        echo 'fa fa-star-half';
                    }else if ($perform ==5) {
                        echo 'fa fa-star';
                    }else{ echo 'fa fa-star-o'; } ?>"></span>

                </span></h4>
                <h5><?php echo display('department')?>: <?php echo html_escape($row->department_name);?></h5>
                <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                   <?php echo html_escape($row->phone) ;?></p>
               </div>
               <div class="card-content-languages">
        <div class="card-content-languages-group"></div>
                <div class="card-content-languages-group">
                   <table class="datatable table-bordered table-striped table-hover" width="100%">
            <caption  class="t_align_f_size"><?php echo display('personal_information')?></caption>
                    <tr>
                        <th><?php echo display('name')?></th>
                        <td><?php echo html_escape(!empty($row->maiden_name)?($row->first_name." " .$row->last_name.'('.$row->maiden_name.')'):($row->first_name." " .$row->last_name));?></td>
                    </tr>
                    <tr>
                        <th><?php echo display('phone')?></th>
                        <td><?php echo html_escape($row->phone);?></td>
                    </tr>
                    <tr>
                        <th><?php echo display('email')?></th>
                        <td><?php echo html_escape($row->email);?></td>
                    </tr>
                    <tr>
                        <th><?php echo display('state')?></th>
                        <td><?php echo html_escape($row->state);?></td>
                    </tr>
                     <tr>
                        <th><?php echo display('city')?></th>
                        <td><?php echo html_escape($row->city);?></td>
                    </tr>
                    <tr>
                        <th><?php echo display('zip_code')?></th>
                        <td><?php echo html_escape(!empty($row->zip)?$row->zip:null);?></td>
                </tr>
            </table>

        </div>
        <div class="card-content-languages-group">
           <table class="datatable table-bordered table-striped table-hover" width="100%">
            <caption  class="t_align_f_size"><?php echo display('biographicalinfo')?></caption>
            <tr>
                <th><?php echo display('dob')?></th>
                <td><?php echo html_escape($row->dob);?></td>
            </tr>
            <tr>
                <th><?php echo display('gender')?></th>
                <td><?php if($row->gender ==1){
                    echo display('male');
                }else if($row->gender == 2){
                    echo display('female');
                }else{
                    echo display('other');
                }
                ?></td>
            </tr>
            <tr>
             <th><?php echo display('marital_status')?></th>
             <td><?php 
             if($row->marital_status ==1){
               echo display('single');
           }else if($row->marital_status ==2){
            echo display('married');
        }else if($row->marital_status ==3){
           echo display('divorced');
       }else if($row->marital_status ==4){
         echo display('widowed');
     }else{
        echo display('other');
    } ;?></td>
</tr>
<tr>

    <th><?php echo display('ethnic_group')?> </th>
    <td><?php echo html_escape($row->ethnic_group) ;?></td>
</tr>
<tr>

    <th><?php echo display('eeo_class_gp')?></th>
    <td><?php echo html_escape($row->eeo_class_gp) ;?></td>
</tr>
<tr>

    <th><?php echo display('ssn')?></th>
    <td><?php echo html_escape($row->ssn);?></td>
</tr>
<tr>

    <th><?php echo display('work_in_state')?></th>
    <td><?php if($row->work_in_state ==1){
        echo display('yes');
    }else{
        echo display('no');
    } ?></td>
</tr>
<tr>

    <th><?php echo display('live_in_state')?></th>
    <td><?php if($row->live_in_state ==1){
        echo display('yes');
    }else{
        echo display('No');
    }?></td>
</tr>
</table>

</div>
</div>
<div class="card-footer">
    <div class="card-footer-stats">
        <div>
            <p></p><span class="stats-small"></span>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-8">
    <div class="row">
        <div class="col-sm-12 col-md-12 rating-block" >

          <table class="datatable table-bordered table-striped table-hover" width="100%">


            <caption  class="t_align_f_size"><?php echo display('positional_information')?></caption>
            <tr>
                <th><?php echo display('division')?></th>
                <td><?php echo html_escape($row->department_name);?></td>
            </tr>
            <tr>
                <th><?php echo display('designation')?></th>
                <td><?php echo html_escape($row->position_name);?></td>
            </tr>
            <tr>
                <th><?php echo display('duty_type')?></th>
                <td><?php
                if($row->duty_type == 1){
                    echo display('full_time');
                }else if($row->duty_type == 2){
                   echo display('part_time');
               }else if($row->duty_type == 3){
                  echo display('contructual');
              }else{
                echo display('other');
            }?></td>
        </tr>

        <tr>
            <th><?php echo display('hire_date')?></th>
            <td><?php echo html_escape($row->hire_date);?></td>
        </tr>
        <tr>
            <th><?php echo display('original_hire_date')?></th>
            <td><?php echo html_escape($row->original_hire_date);?></td>
        </tr>
        <tr>
            <th><?php echo display('rate_type')?></th>
            <td><?php if($row->rate_type == 1){
              echo display('hourly');
          }else{
            echo display('salary');
        }?></td>
    </tr>
    <tr>
        <th><?php echo display('s_rate')?></th>
        <td><?php echo html_escape($row->rate);?></td>
    </tr>
    <tr>
        <th><?php echo display('pay_frequency')?></th>
        <td><?php 
        if($row->pay_frequency == 1){
          echo display('weekly');
      }else if($row->pay_frequency == 2){
        echo display('biweekly');
    }else{
        echo display('annual');
    }?></td>
</tr>
<tr>
    <th><?php echo display('home_department')?></th>
    <td><?php echo html_escape($row->home_department);?></td>
</tr>
</table>      

</div>  

<div class="col-sm-12 col-md-12 rating-block" >

  <table class="datatable table-bordered table-striped table-hover" width="100%">


    <caption  class="t_align_f_size"><?php echo display('benifits')?></caption>
    <?php  foreach($benifit as $benif){?>
        <tr>
            <th><?php echo display('benifit_class_code')?></th>
            <td><?php echo html_escape($benif->bnf_cl_code);?></td>
        </tr>
        <tr>
            <th><?php echo display('description')?></th>
            <td><?php echo html_escape($benif->bnf_cl_code_des);?></td>
        </tr>

        <tr>
            <th><?php echo display('benifit_acc_date')?></th>
            <td><?php echo html_escape($benif->bnff_acural_date);?></td>
        </tr>
    <?php } ?>
    <?php if($row->is_super_visor==0) {?>
        <tr>
            <th><?php echo display('super_visor_name')?></th>
            <td></td>
        </tr>
    <?php } ?>
</table>      

</div> 
<div class="col-sm-12 col-md-12 rating-block" >

    <table class="datatable table-bordered table-striped table-hover" width="100%">


        <caption  class="t_align_f_size"><?php echo display('emerg_contct')?></caption>
        <tr>
            <th><?php echo display('emerg_contct')?></th>
            <td><?php echo html_escape($row->emerg_contct);?></td>
        </tr>
        <tr>
            <th><?php echo display('alt_emg_h_phone')?></th>
            <td><?php echo html_escape($row->emrg_h_phone);?></td>
        </tr>

        <tr>
            <th><?php echo display('emrg_w_phone')?></th>
            <td><?php echo html_escape($row->emrg_w_phone);?></td>
        </tr>
    </table>      

</div>                 

</div> 


</div>
<div class="col-sm-12 rating-block">
        <table class="table table-border">
            <caption><?php echo display('award')?></caption>
            <thead>
                <tr>
                    <th><?php echo display('award_name')?></th>
                    <th><?php echo display('aw_description')?></th>
                    <th><?php echo display('awr_gift_item')?></th>
                    <th><?php echo display('date')?></th>
                    <th><?php echo display('awarded_by')?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($award as  $awrd) {?>
                <tr>
                    <td><?php echo html_escape($awrd->award_name);?></td>
                    <td><?php echo html_escape($awrd->aw_description);?></td>
                    <td><?php echo html_escape($awrd->awr_gift_item);?></td>
                    <td><?php echo html_escape($awrd->date);?></td>
                    <td><?php echo html_escape($awrd->awarded_by);?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>

</div>
</div> 


