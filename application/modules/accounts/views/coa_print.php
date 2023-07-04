<?php
include ('Class/CConManager.php');
include ('Class/Ccommon.php');
include ('Class/CResult.php');
include ('Class/CAccount.php'); 
?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card"  id="printArea">
            <div class="card-header">
                <h4> <?php echo display('coa_print') ?>
                    <small class="float-right" id="print">
                        <input type="button" class="btn btn-info text-white button-print" name="btnPrint" id="btnPrint" value="Print"
                        onclick="printContent('printArea')" />
                    </small>
                </h4>
            </div>
            <div class="card-body">

                <div class="">
                    <table cellpadding="0" cellspacing="0" border="1px solid #000" width="99%" class="t_align_left">
                        <?php
                            $oResult=new CResult();
                            $oAccount=new CAccount();

                            $sql="SELECT * FROM acc_coa WHERE IsActive=1 ORDER BY HeadCode";
                            $oResult=$oAccount->SqlQuery($sql);
                            for ($i = 0; $i < $oResult->num_rows; $i++)
                            {
                                $sql="SELECT MAX(HeadLevel) as MHL FROM acc_coa WHERE IsActive=1";
                                $oResultLevel=$oAccount->SqlQuery($sql);
                                $maxLevel=$oResultLevel->row['MHL'];

                                $HL=$oResult->rows[$i]['HeadLevel'];
                                $Level=$maxLevel+1;
                                $HL1=$Level-$HL;

                                echo '<tr>';
                                for($j=0; $j<$HL; $j++)
                                {
                                    echo '<td>&nbsp;</td>';
                                }
                                echo '<td>'.$oResult->rows[$i]['HeadCode'].'</td>';
                                echo '<td colspan='.$HL1.'>'.$oResult->rows[$i]['HeadName'].'</td>';
                                echo '</tr>';

                            }
                            ?>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>