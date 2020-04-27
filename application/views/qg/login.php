<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?= $config[0]['nome_cla'] ?> - QG 1.0</title>
	<!--FAVICON-->
	<link rel="shortcut icon" href="<?= $config[0]['logo_cla'] ?>"/>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/semantic.min.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.min.css"/>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylemilsim.css" />
	<script src="<?php echo base_url() ?>assets/js/jquery-1.12.4.min.js"></script>

	<script src="https://kit.fontawesome.com/1040c9c4a4.js"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="div-login">
	<div class="ui two column very relaxed stackable grid">
		<div class="column">
			<form class="form-login" id="formLogin" method="post" action="<?php echo base_url() ?>index.php/qg/verificarLogin">
				<div class="ui form">
					<img src="<?= $config[0]['logo_cla'] ?>" alt="QG "/>
					<h3>QG - <?= $config[0]['nome_cla'] ?></h3>
					<hr>
					<div class="field">
						<div class="ui left icon input">
							<input type="text" placeholder="Usuário" id="usuario" name="usuario" required>
							<i class="user icon"></i>
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<input type="password" placeholder="Senha" id="senha" name="senha" required>
							<i class="lock icon"></i>
						</div>
					</div>
					<button type="submit" id="btn-acessar" class="ui blue submit button botao">Login</button>
				</div>
				<div style="margin-top: 6px">
					<p>Sistema desenvolvido por <a href="mailto:leandroabmathias@hotmail.com?Subject=Sistema%20QG"
												   target="_top"> Leandro Mathias</a></p>
				</div>
			</form>
		</div>
	</div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/semantic.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#usuario').focus();
        $("#formLogin").validate({
            submitHandler: function(form) {
                var dados = $(form).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/qg/verificarLogin?ajax=true",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            window.location.href = "<?php echo base_url(); ?>index.php/qg";
                        } else {
                            $('.ui.modal')
                                .modal('show')
                            ;
                        }
                    }
                });

                return false;
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

    });
</script>

<a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
<div class="ui modal modal-login">
	<div class="ui icon header">
		<i class="lock icon"></i>
		Erro Login
	</div>
	<div class="content">
		<p>Os dados de acesso estão incorretos, por favor tente novamente!</p>
	</div>
	<div class="actions">
		<div class="ui grey cancel button">
			<i class="remove icon"></i>
			Fechar
		</div>
	</div>
</div>

</body>
</html>
