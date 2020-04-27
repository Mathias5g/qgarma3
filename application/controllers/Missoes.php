<?php


class Missoes extends CI_Controller
{
	/**
	 *
	 * author: Leandro Mathias
	 * email: leandroabmathias@hotmail.com
	 *
	 */


	/**
	 * Missoes constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('qg_model', '', true);
		$this->data['config'] = $this->db->get('configuracoes')->result_array();
	}

	public function index(){

	}

	public function adicionarMissao(){
		if ((!session_id()) || (!$this->session->userdata('logado'))) {
			redirect('index.php/qg/login');
		}

		$this->data['view'] = 'missoes/adicionarmissao';
		$this->load->view('tema/header', $this->data);
	}

	public function salvarMissao(){
	    $this->load->model('missoes_model');
		$nome = $this->input->post('nome');
		$imagem = $this->input->post('imagem');
		$mapa = $this->input->post('mapa');
		$situacao = $this->input->post('situacao');
		$tipo_missao = $this->input->post('tipo_missao');
		$data_hora = $this->input->post('data_hora');
		$slots = $this->input->post('slots');

		switch ($tipo_missao){
			case $tipo_missao == "1":
				$cor = "#21ba45";
				break;
			case $tipo_missao == "2":
				$cor = "#db2828";
				break;
			case $tipo_missao == "3":
				$cor = "#2185d0";
				break;
		}

		foreach ($slots as $row) {
			$data[] = array($row, "VAGO");
		};

		$array_serializado = serialize($data);
		$dados = array(
		    'nome'  =>  $nome,
            'imagem'    =>  $imagem,
            'mapa'  =>  $mapa,
            'situacao'  =>  $situacao,
            'tipo_missao'   =>  $tipo_missao,
			'data_hora' =>  $data_hora,
			'url'	=> '',
			'cor_evento'	=>	$cor,
			'slots' =>  $array_serializado
        );

		$this->missoes_model->inserirMissoes($dados);
		$ultimoId = $this->db->insert_id();
		header('location:' . base_url() . 'index.php/missoes/view?id=' . $ultimoId);

	}

	public function view(){
		$nomePlayer = $this->session->userdata('usuario');
		$id = $this->input->get('id');
        $idslot = $this->input->get('idslot');

        $this->load->model('missoes_model', '', true);
        $event_data = $this->missoes_model->carregarDados($id);
        foreach ($event_data->result_array() as $row) {
            $data[] = array(
                'id'		=>	$row['id'],
                'title'		=>	$row['nome'],
                'imagem'		=>	$row['imagem'],
                'mapa'		=>	$row['mapa'],
                'situacao'		=>	$row['situacao'],
                'start'		=>	$row['data_hora'],
                'color'		=>	$row['cor_evento'],
				'slots'		=>	$row['slots']
            );
        }

        if(isset($idslot)){
            $slots_uns = unserialize($data[0]['slots']); //unserialize o array

			if($slots_uns[$idslot][1] == "VAGO"){
				$slots_uns[$idslot][1] = $nomePlayer; //Troca o valor do array
			}

            $slots_ser = serialize($slots_uns);

           $this->load->model('missoes_model');
           $this->missoes_model->updateSlots($id, $slots_ser);
           header('location: ' .  base_url() . 'index.php/missoes/view?id=' . $id);
        }

        //echo json_encode($data);
		$this->data['id'] = $id;
		$this->data['nomePlayer'] = $nomePlayer;
        $this->data['dados'] = $data;
        $this->data['view'] = 'missoes/mostrarmissao';
        $this->load->view('tema/header', $this->data);
    }
}

