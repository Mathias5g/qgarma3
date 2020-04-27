<div class="ui segment" style="margin: 1rem 0.5rem;">
	<div style="display: flex; justify-content: center; margin-bottom: 10px"><img class="ui medium bordered image"
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRTB4hPxC4nEaV5CRZriTkSI6F2rt_8Ki7MbJ7AqtfLdNe_op1P" alt=""/>
	</div>
	<form class="ui form attached fluid segment form-cadastro" action="controller/salvarconfiguracoes.php"
		  method="post">
		<div class="two fields">
			<div class="field disabled">
				<label>Nome/Nick</label>
				<input placeholder="Nome/Nick" value="<?= $usuario->usuario ?>" name="nome"
					   type="text" required>
			</div>
			<div class="field">
				<label>Senha</label>
				<input placeholder="Senha" value="" name="senha" type="password"
					   required>
			</div>
			<div class="field">
				<label>E-mail</label>
				<input placeholder="Link" value="<?= $usuario->email ?>" name="senha" type="email">
			</div>
			<div class="field">
				<label>Imagem</label>
				<input placeholder="Link" value="<?= $usuario->imagem ?>" name="senha" type="email">
			</div>
		</div>
		<button type="submit" class="ui blue submit button">Salvar</button>
	</form>
</div>
