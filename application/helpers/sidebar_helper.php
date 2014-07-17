<?php
function side_array(){
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$side = "";

	if($CI->ion_auth->in_group('doctor')){
		$side = "";
	}

	return $side;
}