<div id="add0" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <strong><?php echo display('weekly_holiday')?></strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
           

       <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-heading">
                   
                </div>
                <div class="card-body">

                <?php echo form_open('hrm/weekly-holiday') ?>

  
 
                         <div class="form-group row">
                        
                            <label for="dayname" class="col-sm-12 col-form-label f_size_20px_c_green"><?php echo display('select_weekly_leave_day') ?></label>
                             </div>
                            <div class="form-group row">
                            <div class="col-sm-12 f_size_25px"><ul class="l_style_margin_left_150px">
                            <li>
                    <input type="checkbox" name="dayname[]" value="Friday" checked="checked"> <?php echo display('friday') ?></li><li>
                    <input type="checkbox" name="dayname[]" checked="checked" value="Satarday"> <?php echo display('saturday') ?></li><li>
                    <input type="checkbox" checked="checked" name="dayname[]" value="Sunday"> <?php echo display('sunday') ?>
</li>
</ul>

                            </div>
                        </div>
                        

          
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
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

    <div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card"> 
			<div class="card-header">
                        <h4><?php echo display('add_weekly_leave') ?></h4>
                    </div>
            <div class="card-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('dayname') ?></th>
                           
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($weeklev)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($weeklev as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo html_escape($que->dayname); ?></td>
                                   
                                    <td class="center">
                                        <a href="<?php echo base_url("hrm/weekly-holiday-update/".$que->wk_id) ?>" class="btn btn-xs btn-success"><i class="ti-pencil text-white"></i></a>                                    </td>
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
 
 