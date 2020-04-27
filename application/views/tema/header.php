<?php
$grupoID = $this->session->userdata('id_grupo');
switch ($grupoID){
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
	case '5':
		$cor = 'teal';
		$grupo = "Convidado";
		break;
} ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title><?= $config[0]['nome_cla'] ?> - QG 1.0</title>
	<!--FAVICON-->
    <link rel="shortcut icon" href="<?= $config[0]['logo_cla'] ?>"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css"/>
	<!--fontawesome-->
    <script src="https://kit.fontawesome.com/1040c9c4a4.js"></script>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylemilsim.css">
	<link href='<?php echo base_url(); ?>assets/fullcalendar/core/main.css' rel='stylesheet'/>
	<link href='<?php echo base_url(); ?>assets/fullcalendar/daygrid/main.css' rel='stylesheet'/>
	<link href="<?php echo base_url(); ?>assets/trumbowyg/dist/ui/trumbowyg.min.css" rel="stylesheet" >

	<script src='<?php echo base_url(); ?>assets/fullcalendar/core/main.js'></script>
	<script src='<?php echo base_url(); ?>assets/fullcalendar/interaction/main.js'></script>
	<script src='<?php echo base_url(); ?>assets/fullcalendar/daygrid/main.js'></script>
	<script src='<?php echo base_url(); ?>assets/fullcalendar/core/locales/pt-br.js'></script>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<style>
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(37, 37, 37, 0.8);
            -webkit-box-shadow: inset 0 0 6px rgba(37, 37, 37, 0.8);
        }
    </style>
</head>

<body>
<header>
        <div class="ui pointing menu">
            <a href="<?php echo base_url(); ?>index.php/qg/index" class="item">
                Home
            </a>
            <a href="<?php echo base_url(); ?>index.php/qg/missoes" class="item">
                Missões
            </a>
			<?php if($grupoID == "1" || $grupoID == "2"): ?>
				<a href="<?php echo base_url(); ?>index.php/qg/administracao" class="item">
					Administração
				</a>
			<?php endif; ?>
            <a class="ui <?= $cor ?> image label" style="height: 26px; margin: 1%" href="<?php echo base_url(); ?>index.php/qg/painelusuario">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRTB4hPxC4nEaV5CRZriTkSI6F2rt_8Ki7MbJ7AqtfLdNe_op1P" alt=""/>
                <?= $this->session->userdata('usuario') ?>
				<div class="detail"><?= $grupo ?></div>
            </a>
			<div class="right menu">
				<div class="item">
					<div class="ui transparent icon input">
						<input type="text" placeholder="Pesquisar">
						<i class="search link icon"></i>

					</div>
					<a href="<?php echo base_url(); ?>index.php/qg/sair" class="ui red button" style="margin-left: 10px;">SAIR</a>
				</div>
			</div>
        </div>
</header>

<main>
	<div class="container">
		<?php if (isset($view)) {
			echo $this->load->view($view, null, true);
		} ?>
	</div>
</main>

<!--JavaScript at end of body for optimized loading-->
<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<script>
    $('.menu .item')
        .tab()
    ;
</script>

<?php if ($view == "missoes/adicionarmissao") { ?>
	<script src="<?php echo base_url(); ?>assets/trumbowyg/dist/trumbowyg.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/calendar.min.js"></script>
	<script>
        <!--
        $('#trumbowyg-demo').trumbowyg();
        //-->
        $('#example13').calendar({
            ampm: false,
            monthFirst: false,
            formatter: {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    return year + '-' + month + '-' + day;
                }
            }
        });
        $(document).ready(function () {
            var max_fields = 100; //maximum input boxes allowed
            var wrapper = $(".addSlot"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="ui action input" style="margin-bottom: 10px;"><input type="text" name="slots[]" required/><button class="ui red button remove_field"><i class="fa fa-minus" aria-hidden="true"></i></button></div>'); //add input box
                }
            });
            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
	</script>
<?php } ?>
</body>
</html>
