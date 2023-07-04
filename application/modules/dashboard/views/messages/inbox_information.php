<div class="row">
    <div class="col-sm-12 col-md-12">
         <div class="card">
                    <h4 class="card-header"><?php echo html_escape((!empty($title)?$title:null)) ?></h4>
            <div class="card-body"> 
                <dl class="dl-horizontal">
                    <dt><?php echo display('sender_name') ?></dt>
                    <dd><?php echo html_escape($message->sender_name) ?></dd>
                    <dt><?php echo display('receiver_name') ?></dt>
                    <dd><?php echo $this->session->userdata('fullname') ?></dd>
                    <dt><?php echo display('date') ?></dt>
                    <dd><?php echo date('d M Y h:i:s a', strtotime($message->datetime)) ?></dd>
                    <dt><?php echo display('subject') ?></dt>
                    <dd><?php echo html_escape($message->subject) ?></dd>
                    <dt><?php echo display('message') ?></dt> 
                    <dd><?php echo html_escape($message->message) ?></dd>
                </dl>
            </div> 
        </div>
    </div>
</div>

 

  


