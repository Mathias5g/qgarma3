<?php


class Missoes_model extends CI_Model
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */


	/**
	 * MissoesModel constructor.
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

	public function getMissoes($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
	{

		$this->db->select('id');
		$this->db->limit(5);
		$clientes = $this->db->get('missoes')->result();


		$this->db->select($fields . ',missoes.id, missoes.nome');
		$this->db->from($table);

		$this->db->limit($perpage, $start);

		$this->db->order_by('missoes.id', 'desc');
		$query = $this->db->get();

		$result = !$one ? $query->result() : $query->row();
		return $result;
	}

	function carregarEventosCalendario(){
		$this->db->order_by('id');
		return $this->db->get('missoes');
	}

	function inserirMissoes($dados){
        $this->load->database();
        return $this->db->insert('missoes', $dados);
    }

    function updateSlots($id, $slots_ser){
        $this->db->where('id', $id);
        $this->db->set('slots', $slots_ser);
        return $this->db->update('missoes');
    }

    function carregarDados($id){
		$this->db->where('id', $id);
        return $this->db->get('missoes');
    }
}
