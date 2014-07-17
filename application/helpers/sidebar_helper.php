<?php
function side_array(){
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$side = "";

	if($CI->ion_auth->in_group('doctor')){
		$side = "fa-desktop ,Home Page,doctor/homepage,True";
	}
	
	if($CI->ion_auth->in_group('radiograph')){
		$side = $bar;
	}
	return $side;
}