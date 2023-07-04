<?php foreach($allfacilities as $faciliti){?>
<div class="card">
  <div class="card-header">
    <?php echo html_escape($faciliti->facilitytypetitle); ?>
  </div>
</div>
<?php  if(!empty($faciliti->sub)){?>
<div class="col-sm-12 row">
  <?php
                              foreach($faciliti->sub as $facilitititle){
                            $assignroom=$this->db->select("roomfaility_ref_accomodation.*,roomfacilitydetails.facilitytitle")->from('roomfaility_ref_accomodation')->join('roomfacilitydetails','roomfacilitydetails.facilitytypeid=roomfaility_ref_accomodation.facilititypeid','left')->where('roomfaility_ref_accomodation.facilityid',$facilitititle->facilityid)->where('roomfaility_ref_accomodation.room_id',$crroomid)->get()->row();
                              $enablecheck='';
                              if(!empty($assignroom)){
                                if($assignroom->room_id==$crroomid){
                                  $enablecheck="checked";
                                  }
                                else{
                                    $enablecheck="";
                                    }
                                }
  ?>
  <!-- Material inline 1 -->
  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 pb-2">
    <div class="form-check form-check-inline">
      <input type="checkbox" class="form-check-input" <?php echo $enablecheck;?> name="facilities<?php echo html_escape($facilitititle->facilitytypeid.$crroomid);?>[]" id="materialInline<?php echo html_escape($facilitititle->facilityid);?>" value="<?php echo html_escape($facilitititle->facilityid);?>">
      <label class="form-check-label"  for="materialInline<?php echo html_escape($facilitititle->facilityid);?>"><?php echo html_escape($facilitititle->facilitytitle);?></label>
    </div>
  </div>
  <?php  } ?>
</div>
<input name="services_<?php echo html_escape($crroomid);?>[]" type="hidden" value="<?php echo html_escape($faciliti->facilitytypeid);?>" />
<?php  } } ?>
<input name="roomid" type="hidden" value="<?php echo html_escape($crroomid);?>" />
<div class="form-group text-left">
  <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('ad') ?></button>
</div>