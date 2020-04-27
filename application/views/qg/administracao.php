<div class="ui segment" style="margin: 1rem 0.5rem;">
	<div class="ui top attached tabular menu">
		<a class="item active" data-tab="membros">Membros</a>
		<a class="item" data-tab="configuracoes">Configurações</a>
	</div>
	<div class="ui bottom attached tab segment active" data-tab="membros">
		<h3>GERENCIAMENTO DE MEMBROS</h3>
		<!--Adicionar membros -->
		<form class="ui form attached fluid segment form-cadastro" action="<?= base_url() ?>index.php/qg/cadastrarUsuarios"
			  method="post">
			<div class="two fields">
				<div class="field required">
					<label>Nome/Nick</label>
					<input placeholder="Nome/Nick" name="nick" type="text" required>
				</div>
				<div class="field required">
					<label>Senha</label>
					<input placeholder="Nome/Nick" name="senha" type="password" required>
				</div>
				<div class="field">
					<label>E-Mail</label>
					<input type="email" placeholder="Nome/Nick" name="email" type="text">
				</div>
				<div class="field required">
					<label>Imagem do Clã</label>
					<select class="ui fluid dropdown" name="grupo">
						<option value="1">Administrador</option>
						<option value="2">Moderador</option>
						<option value="3">Editor</option>
						<option value="4">Membro</option>
						<option value="5">Convidado</option>
					</select>
				</div>
			</div>
			<button type="submit" class="ui green submit button">Cadastrar</button>
		</form>
		<table class="ui celled table">
			<thead>
			<tr>
				<th>Nome/Nick</th>
				<th>Função</th>
				<th>Ações</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(!$results){
				echo '<tr><td colspan="6">Nenhum membro cadastrado</td></tr>';
			}
			foreach ($results as $r) {
				switch ($r->id_grupo) {
					case '1':
						$cor = 'yellow';
						$grupo = "Administrador";
						break;
					case '2':
						$cor = 'green';
						$grupo = "Moderador";
						break;
					case '3':
						$cor = 'purple';
						$grupo = "Editor";
						break;
					case '4':
						$cor = 'blue';
						$grupo = "Membro";
						break;
					default:
						$cor = 'teal';
						$grupo = "Convidado";
						break;
				}
				echo '<tr>';
				echo '<td>' . $r->usuario . '</td>';
				echo '<td><a class="ui ' . $cor . ' label ">' . $grupo . '</a></td>';
				echo '<td>' . $grupo . '</td>';
				echo '</tr>';
			} ?>
			</tbody>
		</table>
	</div>
	<!--Configurações do clã -->
	<div class="ui bottom attached tab segment" data-tab="configuracoes">
		<div style="display: flex; justify-content: center; margin-bottom: 10px"><img class="ui medium bordered image"
			src="<?= $config[0]['logo_cla']; ?>">
		</div>
		<h3>CONFIGURAÇÃO DO CLÃ</h3>
		<form class="ui form attached fluid segment form-cadastro" action="<?= base_url() ?>index.php/qg/configuracoes"
			  method="post">
			<div class="two fields">
				<div class="field required">
					<label>Nome do Clã</label>
					<input placeholder="Nome do Clã" value="<?= $config[0]['nome_cla']; ?>" name="nomecla"
						   type="text" required>
				</div>
				<div class="field required">
					<label>Imagem do Clã</label>
					<input placeholder="Link" value="<?= $config[0]['logo_cla']; ?>" name="imagemcla" type="text"
						   required>
				</div>
			</div>
			<button type="submit" class="ui blue submit button">Salvar</button>
		</form>
	</div>
</div>
