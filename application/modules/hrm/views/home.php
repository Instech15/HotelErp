<h1><?php echo display('inventory') ?> </h1>
<h3><?php echo html_escape($title) ?> </h3>

<?php
$s = $this->session->userdata();
print_r($s);

echo "<img src='".base_url('application/modules/inventory/assets/images/t.gif')."'>";
