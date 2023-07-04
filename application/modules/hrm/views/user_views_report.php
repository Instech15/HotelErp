<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="card" id="printArea">
            <div class="card-header">
                <h4><?php echo !empty($title)?$title:null ?>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint"
                            value="Print" onclick="printContent('printArea')" />
                    </small>
                </h4>
            </div>
            <div class="card-body" >
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('employee_id') ?></th>
                            <th><?php echo display('date') ?></th>
                            <th><?php echo display('sign_in') ?></th>
                            <th><?php echo display('sign_out') ?></th>
                            <th><?php echo display('staytime') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($query)) 

                        { ?>

                        <?php $sl = 1; ?>
                        <?php foreach ($query as $que) { 
                         ?>
                        <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                            <td><?php echo $sl; ?></td>
                            <td><?php echo html_escape($que->first_name.' '.$que->last_name); ?></td>
                            <td><?php echo html_escape($que->date); ?></td>
                            <td><?php echo html_escape($que->sign_in); ?></td>
                            <td><?php echo html_escape($que->sign_out); ?></td>
                            <td><?php echo html_escape($que->staytime); ?></td>

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