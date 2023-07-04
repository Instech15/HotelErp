<div class="section">
            <div class="container">
            <?php $privacy=$this->db->select('*')->from('tbl_widget')->where('widgetid',20)->get()->row();?>
             <h2><?php echo html_escape($privacy->widget_title);?></h2>
            <?php echo html_escape($privacy->widget_desc);?>
            </div>
        </div>