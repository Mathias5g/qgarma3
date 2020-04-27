<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Qg extends CI_Controller
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('qg_model', '', true);
		$this->data['config'] = $this->db->get('configuracoes')->result_array();
	}

	public function index(){
		if ((!session_id()) || (!$this->session->userdata('logado'))) {
			redirect('index.php/qg/login');
		}

		$this->data['view'] = 'qg/home';
		$this->load->view('tema/header', $this->data);
	}

	public function missoes()
	{
		if ((!session_id()) || (!$this->session->userdata('logado'))) {
			redirect('index.php/qg/index');
		}

		$this->load->model('missoes_model', '', true);
		$config['per_page'] = 30;
		$this->data['results'] = $this->missoes_model->getMissoes('missoes', 'id,nome,imagem,mapa,situacao,tipo_missao,data_hora', '', $config['per_page']);
		$this->data['view'] = 'qg/missoes';
		$this->load->view('tema/header', $this->data);
	}

	public function administracao(){
		if ((!session_id()) || (!$this->session->userdata('logado'))) {
			redirect('index.php/qg/index');
		}

		if ($this->session->userdata('id_grupo') == "3" || $this->session->userdata('id_grupo') == "4" || $this->session->userdata('id_grupo') == "5") {
			redirect('index.php/qg/index');
		}

		$this->load->model('membros_model', '', true);
		$this->load->model('qg_model', '', true);
		$config['per_page'] = 30;
		$this->data['results'] = $this->membros_model->getMembros('usuarios', '*', '', $config['per_page']);
		$this->data['config'] = $this->db->get('configuracoes')->result_array();
		//$this->data['logo_cla'] = $this->qg_model->getConfiguracoes('logo_cla, nome_cla');
		//$this->data['nome_cla'] = $this->
		$this->data['view'] = 'qg/administracao';
		$this->load->view('tema/header', $this->data);
	}

	public function cadastrarUsuarios(){
		$this->load->model('qg_model');
		$nick = $this->input->post('nick');
		$senha = $this->input->post('senha');
		$email = $this->input->post('email');
		$grupo = $this->input->post('grupo');


		$dados = array(
			'usuario'  =>  $nick,
			'senha'    =>  password_hash($senha, PASSWORD_DEFAULT),
			'email'  =>  $email,
			'imagem'  =>  $email,
			'id_grupo'   =>  $grupo
		);
		$this->qg_model->inserirUsuario($dados);
		redirect('index.php/qg/administracao');
	}

	public function configuracoes(){
		$this->load->model('qg_model');
		$nomecla = $this->input->post('nomecla');
		$imagemcla = $this->input->post('imagemcla');

		$dados = array(
			'nome_cla'  =>  $nomecla,
			'logo_cla'    =>  $imagemcla
		);
		$this->qg_model->salvarConfiguracoes($dados);
		redirect('index.php/qg/administracao');
	}

	public function painelUsuario(){

		$this->load->model('qg_model');
		$usuario = $this->session->userdata('usuario');

		$this->data['usuario'] = $this->qg_model->getUsuario($usuario);

		$this->data['view'] = 'qg/painelusuario';
		$this->load->view('tema/header', $this->data);
	}

	public function sair()
	{
		$this->session->sess_destroy();
		redirect('index.php/qg/index');
	}

	public function calendario(){
		$this->load->model('missoes_model', '', true);
		$ultimoId = $this->db->insert_id();
		$event_data = $this->missoes_model->carregarEventosCalendario();
		foreach ($event_data->result_array() as $row) {
			$data[] = array(
				'id'		=>	$row['id'],
				'title'		=>	$row['nome'],
				'start'		=>	$row['data_hora'],
				'url'		=>	base_url() . 'index.php/missoes/view?id=' . $row['id'],
				'color'		=>	$row['cor_evento']
			);
		}
		echo json_encode($data);
	}

	public function login(){
		$this->load->view('qg/login' , $this->data);
	}

	public function verificarLogin()
	{
		header('Access-Control-Allow-Origin: ' . base_url());
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim');
		$this->form_validation->set_rules('senha', 'Senha', 'required|trim');
		if ($this->form_validation->run() == false) {
			header('location:' . base_url() . 'index.php/qg/login');
			//$json = array('result' => false, 'message' => validation_errors());
			//echo json_encode($json);
		} else {
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('senha');
			$this->load->model('Qg_model');
			$user = $this->Qg_model->check_credentials($usuario);

			if ($user) {
				if (password_verify($password, $user->senha)) {
					$session_data = array('id' => '$user->id', 'usuario' => $user->usuario, 'email' => $user->email, 'id_grupo' => $user->id_grupo,'logado' => true);
					$this->session->set_userdata($session_data);
					//log_info('Efetuou login no sistema');
					$json = array('result' => true);
					echo json_encode($json);
				} else {
					$json = array('result' => false, 'message' => 'Os dados de acesso estão incorretos.');
					echo json_encode($json);
				}
			} else {
				$json = array('result' => false, 'message' => 'Usuário não encontrado, verifique se suas credenciais estão corretas.');
				echo json_encode($json);
			}
		}
		die();
	}
}
