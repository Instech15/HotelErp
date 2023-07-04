<div class="card"> </div>
<div class="col-sm-12 row">
	<input name="roomid" type="hidden" value="<?php echo html_escape($crroomid) ;?>">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th rowspan="2"><?php echo display('date'); ?></th>
				<th rowspan="2"><?php echo display('current_rate'); ?></th>
				<th rowspan="2"><?php echo display('offer_rate'); ?></th>
				<th rowspan="2"><?php echo display('offer_title'); ?></th>
				<th rowspan="2"><?php echo display('offer_text'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$month = $yearmonth;
			$date = date('Y-m-d');
			$year_month = date('Y-m');
			$curentrate=$roominfo->rate;
			if($year_month == $month){
			$curr_date = date('d');
			$curr_month = date('m', strtotime("$month"));
			$last_day = date('t', strtotime($date));
			$total=$last_day - $curr_date;
			$curr_year = date('Y', strtotime("$month"));
					for($j=0;$j<=$total;$j++){
					$all_date = date('D-d-M-y', strtotime("+$j Day $date"));
					$hidden_date = date('Y-m-d', strtotime("+$j Day $date"));
					$numdays = date('d', strtotime("+$j Day $date"));
					$assignroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$crroomid)->where('offer_date',$hidden_date)->get()->row();
					$newprice='';
					$title='';
					$text='';
					if(!empty($assignroom)){
						$newprice=$assignroom->offer;
						$title=$assignroom->offertitle;
						$text=$assignroom->offertext;
						}
					
					
					
			?>
			<tr>
				<td><?php echo html_escape($all_date);?><input name="days[]" type="hidden" value="<?php echo $hidden_date ;?>"></td>
				<td><?php echo html_escape($curentrate);?></td>
				<td><input type="text" name="price[]" value="<?php echo html_escape($newprice) ;?>"></td>
				<td><input type="text" name="offertitle[]" value="<?php echo html_escape($title) ;?>"></td>
				<td><input type="text" name="offertext[]" value="<?php echo html_escape($text) ;?>"></td>
			</tr>
			<?php }}
			else{
			$mydates=$month.'-01';
			$curr_date = date('d');
			$last_day = date('t', strtotime($mydates));
			$total=$last_day - 1;
			$curr_month = date('m', strtotime("$month"));
			$curr_year = date('Y', strtotime("$month"));
			for($j=0;$j<=$total;$j++){
			$all_date = date('D-d-M-y', strtotime("+$j Day $mydates"));
					$hidden_date = date('Y-m-d', strtotime("+$j Day $mydates"));
					$numdays = date('d', strtotime("+$j Day $mydates"));
					$assignroom=$this->db->select("*")->from('tbl_room_offer')->where('roomid',$crroomid)->where('offer_date',$hidden_date)->get()->row();
					$newprice='';
					$title='';
					$text='';
					if(!empty($assignroom)){
						$newprice=$assignroom->offer;
						$title=$assignroom->offertitle;
						$text=$assignroom->offertext;
						
						}
			?>
			<tr>
				<td><?php echo html_escape($all_date);?><input name="days[]" type="hidden" value="<?php echo $hidden_date ;?>"></td>
				<td><?php echo html_escape($curentrate);?></td>
				<td><input type="text" name="price[]" value="<?php echo html_escape($newprice) ;?>"></td>
				<td><input type="text" name="offertitle[]" value="<?php echo html_escape($title) ;?>"></td>
				<td><input type="text" name="offertext[]" value="<?php echo html_escape($text) ;?>"></td>
			</tr>
			<?php }} ?>
		</tbody>
		
	</table>
</div>
<div class="form-group text-left roomoffersave">
	<button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
</div>