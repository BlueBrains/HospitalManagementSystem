<?php
function side_array(){
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$side = "";

	if($CI->ion_auth->in_group('doctor')){
		$side = "";
	}
	
	if($CI->ion_auth->in_group('radiograph')){
			$bar[0]=" fa-desktop ,ALL Requests,radiograph_supervisor/total_order_list,False";
			$bar[1]=" fa-qrcode ,Un Seen Request,radiograph_supervisor/un_seen,False";
			$bar[2]=" fa-qrcode ,Un Finished Request,radiograph_supervisor/order_list,False";
			$bar[3]=" fa-qrcode ,Out Order Requests,radiograph_supervisor/radiograph_external_request_done,False";
			$bar[4]=" fa-table ,Implemented Request,radiograph_supervisor/order_list_implemented,False";
			$bar[5]=" fa-edit ,Out Order Manage,radiograph_supervisor/radiograph_external_request,False";		
		$side = $bar;
	}
	return $side;
}