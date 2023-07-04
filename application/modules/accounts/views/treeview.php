<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">            
             <div class="row">
            <div class="col-sm-12">
                <div class="card">
            <div class="card-body">
                        <div class="row">
                <div class="col-md-6">
                    <ul id="tree3">
                   <?php

                    $visit=array();
                    for ($i = 0; $i < count($userList); $i++)
                    {
                        $visit[$i] = false;
                    }

                    $this->accounts_model->dfs("COA","0",$userList,$visit,0);
                    
                    ?>
                    </ul>
                </div> 
<?php if($this->permission->method('accounts','update')->access() || $this->permission->method('accounts','create')->access()): ?>
                <div class="col-md-6" id="newform"></div>
                 <?php endif; ?>
            </div>
 </div> 
</div>
 </div> 
</div>
<script src="<?php echo MOD_URL.$module;?>/assets/js/treeView.js"></script>
