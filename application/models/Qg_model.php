<?php


class Qg_model extends CI_Model
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */

	function __construct()
	{
		parent::__construct();
	}

	function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
	{

		$this->db->select($fields);
		$this->db->from($table);
		$this->db->limit($perpage, $start);
		if ($where) {
			$this->db->where($where);
		}

		$query = $this->db->get();

		$result =  !$one  ? $query->result() : $query->row();
		return $result;
	}

	function getById($id)
	{
		$this->db->from('usuarios');
		$this->db->select('usuarios.*, permissoes.nome as permissao');
		$this->db->join('permissoes', 'permissoes.idPermissao = usuarios.permissoes_id', 'left');
		$this->db->where('idUsuarios', $id);
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function check_credentials($usuario)
	{
		$this->db->where('usuario', $usuario);
		$this->db->limit(1);
		return $this->db->get('usuarios')->row();
	}

	function inserirUsuario($dados){
		$this->load->database();
		return $this->db->insert('usuarios', $dados);
	}

	public function salvarConfiguracoes($dados){
		$this->db->where('id', 1);
		return $this->db->update('configuracoes', $dados);
	}

	public function getUsuario($usuario){
		$this->db->select('usuario, senha, email, imagem');
		$this->db->where('usuario', $usuario);
		$this->db->limit(1);
		return $this->db->get('usuarios')->row();
	}

	public function getConfiguracoes($config){
		$this->db->select('logo_cla, nome_cla', $config);
		$this->db->where('id',1);
		$this->db->limit(1);
		return $this->db->get('configuracoes')->row();
	}
}
