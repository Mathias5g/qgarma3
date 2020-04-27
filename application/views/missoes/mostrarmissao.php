<?php
$array_original = unserialize($dados[0]['slots']);
/*
echo "<pre>";
print_r($array_original);
echo "</pre>";
*/
?>
<div class="ui segment" style="margin: 1rem 0.5rem;">
	<div class="ui centered grid" style="margin-top: 1%;">
			<div class="ui floating message"
				 style="text-align: center; align-content: center; width: 80%; height: 60px">
				<h1><?= $dados[0]['title'] ?></h1>
			</div>
			<br/>
				<img src="<?= $dados[0]['imagem'] ?>" alt="..."
					 style="width: 1000px; height: 400px; align-self: center">
			<br/>
			<br/>
	</div>
	<br/>
	<br/>
	<div class="ui centered grid">
		<div class="ui big message" style="width: 80%">
			<h1 style="text-align: center">Situação</h1>
			<?= $dados[0]['situacao'] ?>
		</div>
	</div>
	<div class="ui centered grid" style="text-align: center; margin: 50px">
		<div class="ui middle aligned divided list" style="width: 800px;">
			<?php for($i = 0; $i<count($array_original); $i++) : ?>
				<div class="item">
					<div class="right floated content">
						<div class="right floated content">
						</div>
						<div class="right floated content">
							<?php if($array_original[$i][1] == "VAGO" && $array_original[$i][1] != $nomePlayer) : ?>
								<div class="ui green button"><a style="color: white" href="#" onclick="f(<?= $id . "," . $i ?>)" >INSCREVER-SE</a></div>
							<?php else: ?>

							<?php endif; ?>
						</div>
					</div>
					<div class="right floated content">
						<div class="ui blue button"><?= $array_original[$i][1] ?></div>
						<!-- ADMIN <div class="ui red button"><i class="close icon"></i></div>-->
					</div>
					<div class="content" style="text-align: left">
						<?= '<br>' ?>
						<?= $array_original[$i][0]; ?>
						<?= '<br>' ?>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		</div>
</div>
<script>
	<!--
    function f($id, $i) {
        window.location.href = "<?php echo base_url(); ?>index.php/missoes/view?id=" + $id + "&idslot=" + $i;
    }
    //-->
</script>
