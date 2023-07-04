<?php
$total=0;
foreach ($cv as $row){

}?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-header"><h4><?php echo display('candidate_view')?></h4></div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card-header">

            <div> 
             <img src="<?php echo html_escape(base_url((!empty($row->picture)?$row->picture:'assets/img/room_search.png'))) ?>" width='100px' height='100px' class=img-circle >
                

            </div>
   
        </div>
        <div class="card-content">
            <div class="card-content-member">
                <h4 class="m-t-0"><?php echo html_escape($row->first_name." " .$row->last_name);?></h4>
                <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                <?php echo html_escape($row->phone) ;?></p>
            </div>
            <div class="card-content-languages">
                <div class="card-content-languages-group">
                    
                </div>
                <div class="card-content-languages-group">
                    
                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <caption  class="t_align_f_size"><?php echo display('personal_information')?></caption>
                        <tr>
                            <th><?php echo display('name')?></th>
                            <td><?php echo html_escape($row->first_name." " .$row->last_name);?></td>
                        </tr>
                        <tr>
                            
                            <th><?php echo display('phone')?></th>
                            <td><?php echo html_escape($row->phone) ;?></td>
                            
                        </tr>
                        <tr>
                            <th><?php echo display('email')?></th>
                            <td><?php echo html_escape($row->email)  ;?></td>
                        </tr>
                        <tr>
                            
                            <th><?php echo display('present_address')?></th>
                            <td><?php echo html_escape($row->present_address) ;?></td>
                        </tr>
                        <tr>
                            
                            <th> <?php echo display('parmanent_address')?></th>
                            <td><?php echo html_escape($row->parmanent_address) ;?></td>
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
            <div class="col-sm-12 col-md-4 rating-block height_200px">
                <h1> <center><i class="ti-crown" aria-hidden="true"></i></center><center><?php echo display('education')?></center></h1>
            </div>
            <div class="col-sm-12 col-md-8 rating-block">
                <table width="100%" class="ttable table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th><?php echo display('degree_name')?></th>
                            <th><?php echo display('institute_name')?></th>
                            <th><?php echo display('result')?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($edu)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($edu as $que) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            
                            <td><?php echo html_escape($que->degree_name); ?></td>
                            <td><?php echo html_escape($que->university_name); ?></td>
                            <td><?php echo html_escape($que->cgp); ?></td>
                            
                        </tr>
                        
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 rating-block height_280px">
                <h1><center> <i class="ti-desktop" aria-hidden="true"></i></center><br>
                <center><?php echo display('past_experience')?></center></h1>
            </div>
            <div class="col-sm-12 col-md-8 rating-block">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th><?php echo display('company_name')?></th>
                            <th><?php echo display('working_period')?></th>
                            <th><?php echo display('position')?></th>
                            <th><?php echo display('supervisor')?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($wrk)) { ?>
                        <?php $sl = 1; ?>
                        <?php foreach ($wrk as $que) { ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            
                            <td><?php echo html_escape($que->company_name); ?></td>
                            <td><?php echo html_escape($que->working_period); ?></td>
                            <td><?php echo html_escape($que->duties); ?></td>
                            <td><?php echo html_escape($que->supervisor); ?></td>
                            
                        </tr>
                        
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>