<?php


class Membros_model extends CI_Model
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}
	public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
	{

		$this->db->select($fields);
		$this->db->from($table);
		$this->db->limit($perpage, $start);
		$this->db->order_by('id', 'desc');
		if ($where) {
			$this->db->where($where);
		}

		$query = $this->db->get();

		$result = !$one ? $query->result() : $query->row();
		return $result;
	}

	public function getMembros($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
	{

		$this->db->select('id');
		$this->db->limit(5);
		$clientes = $this->db->get('usuarios')->result();


		$this->db->select($fields . ',usuarios.id, usuarios.usuario');
		$this->db->from($table);

		$this->db->limit($perpage, $start);

		$this->db->order_by('usuarios.id', 'desc');
		$query = $this->db->get();

		$result = !$one ? $query->result() : $query->row();
		return $result;
	}

}
