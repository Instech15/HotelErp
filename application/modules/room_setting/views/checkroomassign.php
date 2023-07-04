<?php foreach($allfloorwiseroom as $floors){?>
<div class="card">
    <div class="card-header">
        <?php echo html_escape($floors->floorname); ?>
    </div>
</div>
<?php  if(!empty($floors->sub)){?>
<div class="col-sm-12 row">
    <?php 
	foreach($floors->sub as $roomno){
		$assignroom=$this->db->select("tbl_roomnofloorassign.*,roomdetails.roomtype")->from('tbl_roomnofloorassign')->join('roomdetails','roomdetails.roomid=tbl_roomnofloorassign.roomid','left')->where('floorid',$roomno->floorName)->where('roomno',$roomno->roomno)->get()->row();
        $hall_room = $this->db->where('directory', 'hall_room')->where('status', 1)->get('module')->num_rows();
        if ($hall_room == 1) {
            $hallassignroom=$this->db->select("tbl_roomnofloorassign.*,tbl_hallroom_info.hall_type")->from('tbl_roomnofloorassign')->join('tbl_hallroom_info','tbl_hallroom_info.hid=tbl_roomnofloorassign.hallid','left')->where('floorid',$roomno->floorName)->where('roomno',$roomno->roomno)->get()->row();
        }
		$enablecheck='';
		$disablecheck=0;
		$tooltrips='Not Assign';
		if(!empty($assignroom)){
			if($assignroom->roomid==$crroomid){
				$enablecheck="checked";
				$disablecheck=0;
				$tooltrips=(!empty($assignroom->roomtype)?$assignroom->roomtype:$hallassignroom->hall_type);
				}
			else{
					$enablecheck="checked";
					$disablecheck=1;
					$tooltrips=(!empty($assignroom->roomtype)?$assignroom->roomtype:$hallassignroom->hall_type);
					}
			}
	?>
    <!-- Material inline 1 -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 pb-2">
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input"
                <?php echo $enablecheck." "; if($disablecheck==1){echo 'disabled="disabled"';}?>
                name="roomno<?php echo html_escape($roomno->floorName.$crroomid);?>[]"
                id="materialInline<?php echo html_escape($roomno->floorplanid);?>"
                value="<?php echo html_escape($roomno->roomno);?>">
            <label class="form-check-label" data-toggle="tooltip" data-placement="top"
                title="<?php echo html_escape($tooltrips);?>"
                for="materialInline<?php echo html_escape($roomno->floorplanid);?>"><?php echo display('room_no') ?><?php echo html_escape($roomno->roomno);?></label>
        </div>
    </div>
    <?php  } ?>
</div>
<input name="floorid_<?php echo html_escape($crroomid);?>[]" type="hidden"
    value="<?php echo html_escape($floors->floorid);?>" />

<?php  } } ?>
<input name="roomid" type="hidden" value="<?php echo html_escape($crroomid);?>" />
<div class="form-group text-left">
    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
</div>