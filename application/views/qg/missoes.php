<div class="ui segment" style="height: 100%; padding: 2%; margin: 1rem 0.5rem;">

	<div class="ui grid">
		<div class="four column row">
			<div class="right floated column"><a
					href="<?php echo base_url(); ?>index.php/missoes/adicionarMissao">
					<button class="positive ui button">Adicionar Missão</button>
				</a></div>
		</div>
	</div>

	<table class="ui celled table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Missão</th>
				<th>Evento</th>
				<th>Data e Hora</th>
			</tr>
		</thead>
		<tbody>
		<?php

		if(!$results){
			echo '<tr><td colspan="6">Nenhuma Missão Cadastrada</td></tr>';
		}
		foreach ($results as $r) {
			switch ($r->tipo_missao) {
				case '1':
					$cor = 'green';
					$evento = "Missão Oficial";
					break;
				case '2':
					$cor = 'red';
					$evento = "Cursos e Treinamentos";
					break;
				case '3':
					$cor = 'blue';
					$evento = "Evento";
					break;
				default:
					$cor = '#E0E4CC';
					break;
			}
			$date = date_create($r->data_hora);
			echo '<tr>';
			echo '<td><a href="' . base_url() . 'index.php/missoes/view?id=' . $r->id .'"> ' . $r->id .' </a></td>';
			echo '<td><a href="' . base_url() . 'index.php/missoes/view?id=' . $r->id .'"> ' . $r->nome .' </a></td>';
			echo '<td><a class="ui ' . $cor . ' label ">' . $evento . '</a></td>';
			echo '<td>' . date_format($date, 'd/m/Y H:i') . '</td>';
			echo '</tr>';
		} ?>
		</tbody>
		</tbody>
	</table>

	<!-- antigo
	<?php if ($grupoID->id_grupo == 1): ?>
		<div class="ui grid">
			<div class="four column row">
				<div class="right floated column" style="margin-top: 10px; margin-bottom:  -50px;"><a
						href="missoes/addMissao.php">
						<button class="positive ui button">Adicionar Missão</button>
					</a></div>
			</div>
		</div>
	<?php endif; ?>
	<div class="ui centered grid">
		<?php if ($colunas > 0): ?>
			<table class="ui celled table" style="margin: 5%">
				<thead>
				<tr>
					<th>ID</th>
					<th>Missão</th>
					<th>Evento</th>
					<th>Data e Hora</th>
					<?php if ($grupoID->id_grupo == 1): ?>
						<th>Ações</th><?php endif; ?>
				</tr>
				</thead>
				<tbody>
				<?php while ($value = mysqli_fetch_assoc($localizarQuery)) : ?>
					<tr>
						<td data-label="Id"><a
								href="missoes/showMissao.php/?id=<?php echo $value['id'] ?>"> <?php echo $value['id']; ?></a>
						</td>
						<td data-label="Name"><a
								href="missoes/showMissao.php/?id=<?php echo $value['id'] ?>"> <?php echo $value['nome']; ?></a>
						</td>
						<td data-label="Evento">
							<?php
							if ($value['tipo_missao'] == 1) {
								echo '<a class="ui green label">Missão Oficial</a>';
							} else if ($value['tipo_missao'] == 2) {
								echo '<a class="ui red label">Cursos e Treinamentos</a>';
							} else if ($value['tipo_missao'] == 3) {
								echo '<a class="ui blue label">Eventos</a>';
							}
							?></td>
						<td data-label="Age"><?php $date = date_create($value['data_hora']);
							echo date_format($date, 'd/m/Y H:i'); ?> </td>
						<?php if ($grupoID->id_grupo == 1): ?>
							<td data-label="Job" style="text-align: center"><a class="compact ui blue button"><i
									class="arrow alternate circle right outline icon"></i><a
									href="missoes/editarMissao.php/?id=<?php echo $value['id']; ?>"
									class="compact ui orange button"><i class="edit outline icon"></i></a> <a
									class="compact ui red button"
									href="missoes/delMissao.php/?id=<?php echo $value['id']; ?>"><i
										class="trash alternate outline icon"></i></a></td><?php endif; ?>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		<?php
		else: ?>
			<div class="ui negative message" style="margin-bottom: 2rem; margin-top: 2rem">
				<i class="close icon"></i>
				<div class="header">
					<h1>Desculpe</h1>
				</div>
				<h2><p>Não há eventos no momento</p></h2>
			</div>
		<?php endif; ?>
	</div>
	-->
</div>

