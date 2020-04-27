<!-- FORMULARIO MISSÃO -->
<div class="ui segment" style="height: 100%; padding: 2%; margin: 1rem 0.5rem;">
	<div class="ui top attached tabular menu">
		<a class="item active" data-tab="first">Informações</a>
	</div>
	<div class="ui bottom attached tab segment active" data-tab="first">
		<form class="ui form" id="formulario" method="post" action="<?php echo base_url(); ?>index.php/missoes/salvarMissao" style="padding: 2%;">
			<div class="ui floating message">
				<h1>DESCRIÇÃO DA MISSÃO</h1>
			</div>
			<br/>
			<br/>
			<div class="inline fields">
				<div class="eight wide field required">
					<label>Nome da missão</label>
					<input type="text" placeholder="Nome da missão" name="nome" required>
				</div>
			</div>
			<br>
			<hr style="width: 80%;">
			<br>
			<div class="inline fields">
				<div class="eight wide field required">
					<label>Imagem da capa (LINK)</label>
					<input type="text" value="" placeholder="Imagem da capa" name="imagem" required>
				</div>
				<div class="eight wide field required"
				">
				<label>Data</label>
				<div class="eight wide field required" id="example13">
					<input type="text" placeholder="Data e Hora" name="data_hora" autocomplete="off" style="width: 200px;">
				</div>
			</div>
			<div class="eight wide field required">
				<label>Tipo</label>
				<select class="ui fluid dropdown" name="tipo_missao">
					<option value="1">Missão Oficial</option>
					<option value="2">Cursos e Treinamentos</option>
					<option value="3">Eventos</option>
				</select>
			</div>
			<div class="eight wide field required">
				<label>Mapa</label>
				<select class="ui fluid dropdown" name="mapa">
					<option value="Bukovina">Bukovina</option>
					<option value="Bystrica">Bystrica</option>
					<option value="Chernarus">Chernarus</option>
					<option value="Chernarus Winter">Chernarus Winter</option>
					<option value="Desert">Desert</option>
					<option value="Kujari">Kujari</option>
					<option value="Lythium">Lythium</option>
					<option value="Porto">Porto</option>
					<option value="Proving Grounds">Proving Grounds</option>
					<option value="Rahmadi">Rahmadi</option>
					<option value="Sahrani">Sahrani</option>
					<option value="Shapur">Shapur</option>
					<option value="Southern Sahrani">Southern Sahrani</option>
					<option value="Takistan">Takistan</option>
					<option value="Takistan Mountains">Takistan Mountains</option>
					<option value="Utes">Utes</option>
					<option value="Zargabad">Zargabad</option>
					<option value="Outro">Outro</option>
				</select>
			</div>
			<br>
			<br>
	</div>
	<br>
	<hr style="width: 80%;">
	<br>
	<div class="field ui column centered grid">
		<div class="eight wide field required">
			<label>Situação</label>
			<textarea name="situacao" id="trumbowyg-demo" required></textarea>
		</div>
	</div>
	<br/>
	<br/>
	<div class="ui floating message">
		<h1>SLOTS DA MISSÃO</h1>
	</div>
	<br/>
	<br/>
	<div class="ui column centered grid">
		<div class="eight wide field addSlot">
			<div class="ui action input required" style="margin-bottom: 10px;">
				<input type="text" name="slots[]" required>
				<button class="ui blue button add_field_button"><i class="fa fa-plus" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
	<br/>
	<br/>
	<button type="submit" id="enviarFormulario" class="ui green button">ENVIAR</button>
	</form>
</div>
</div>







