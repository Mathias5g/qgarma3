<?php


class Fullcalendar_model extends CI_Model
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */

	function fetch_all_event(){
		$this->db->order_by('id');
		return $this->db->get('missoes');
	}

}
