<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {

	public function state($id = null) 
	{
		$states = array(

"Alabama" => "Alabama",

"Alaska"  => "Alaska",

"Arizona" => "Arizona",

"Arkansas"=> "Arkansas",

"California" => "California",

"Colorado" => "Colorado",

"Connecticut"=> "Connecticut",

"Delaware" => "Delaware",

"Florida"  => "Florida",

"Georgia"  => "Georgia",

"Hawaii"   => "Hawaii",

"Idaho"    => "Idaho",

"Illinois" => "Illinois",
 
"Indiana"  => "Indiana",

"Iowa"     => "Iowa",

"Kansas"   => "Kansas",

"Kentucky" => "Kentucky",

"Louisiana" =>"Louisiana",

"Maine"    => "Maine",

"Maryland" => "Maryland",

"Massachusetts" => "Massachusetts",

"Michigan" => "Michigan",

"Minnesota" => "Minnesota",

"Mississippi" =>"Mississippi",

"Missouri" => "Missouri",

"Montana" => "Montana",

"Nebraska" => "Nebraska",

"Nevada" => "Nevada",

"New Hampshire" => "New Hampshire",

"New Jersey" => "New Jersey",

"New Mexico" => "New Mexico",

"New York" => "New York",

"North Carolina" => "North Carolina",

"North Dakota" =>"North Dakota",

"Ohio" =>  "Ohio",

"Oklahoma" => "Oklahoma",

"Oregon" => "Oregon",

"Pennsylvania" => "Pennsylvania",

"Rhode Rhode" =>"Rhode Island",

"South Carolina" => "South Carolina",

"sDakota" => "sDakota",

"Tennessee" =>"Tennessee",

"Texas" => "Texas",

"Utah" => "Utah",

"Vermont" => "Vermont",

"Virginia" =>"Virginia",

"Washington" => "Washington",

"West Virginia" => "West Virginia",

"Wisconsin" => "Wisconsin",

"Wyoming" => "Wyoming"
		);
	
		if (!empty($id)) {
			return $states[$id];
		} else {
			return $states;
		}

	}

}