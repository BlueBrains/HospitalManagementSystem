<?php
function side_array(){
	$CI =& get_instance();
	$CI->load->library('ion_auth');
	$side = "";


	if($CI->ion_auth->in_group('doctors')){
		$side = "";
	}
	
	if($CI->ion_auth->in_group('radiograph')){
		$side = $bar;
	}
	if($CI->ion_auth->in_group('nurses')){
		$bar[0]=" fa-edit ,Taskes,nurse/taskes,False";
		$bar[1]=" fa-edit ,calls,nurse/calls,False";
		$bar[2]=" fa-edit ,call doctor,nurse/call_doctor,False";
		$bar[3]=" fa-edit ,my calls,nurse/yourcalls,False";		
		$side = $bar;
	}	
	if($CI->ion_auth->in_group('pharmacy')){
		$bar[0]=" fa-desktop ,ALL Requests,pharmacy_supervisor/total_order_list,False";
		$bar[1]=" fa-qrcode ,Active Requests,pharmacy_supervisor/order_list,False";				
		$bar[2]=" fa-table ,Sale Medicine,pharmacy_supervisor/sale_medicine,False";
		$bar[3]=" fa-table ,Enter Medicine,pharmacy_supervisor/enter_medicine,False";
		$bar[4]=" fa-edit ,Existing Medicines,pharmacy_supervisor/all_med,False";
		$bar[5]=" fa-edit ,External Sales,pharmacy_supervisor/saled_med,False";
		$bar[6]=" fa-edit ,inserted medicines,pharmacy_supervisor/medicine_orders,False";
		$bar[7]=" fa-edit ,Order Entry,pharmacy_supervisor/order_entry,False";
		$data['side'] = $bar;		
		$side = $bar;
	}	
	if($CI->ion_auth->in_group('analysis')){
			$bar[0]=" fa-desktop ,ALL Requests,analyse/total_order_list,false";
			$bar[1]=" fa-qrcode ,Un Confirmed Request,analyse/order_list,False";
			$bar[2]=" fa-qrcode ,Un Uploded Request,analyse/confirmed_order_list,False";
			$bar[3]=" fa-table ,Implemented Request,analyse/finished_order_list,False";
			$bar[4]=" fa-edit ,Out Order Manage,analyse/out_order,False";				
	}
	return $side;
}