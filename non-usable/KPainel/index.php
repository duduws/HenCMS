<?php
	include "assets/install/config.php";
	include "assets/php/functions.php";
	if(!isset($_SESSION['logado'])){ header("Location:login"); exit(); }
	if(isset($_GET['deslogar'])){ session_destroy(); header("Location:login"); exit(); }
	if(isset($_GET['notificacao'])){ $notificacao = $pdo->query("UPDATE aa_notificacao SET visto='true' WHERE usuario='".$aa_data['usuario']."'"); }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<base href="<?php echo $config_base; ?>">
	<title>GPainel  - Content Manager 2.0</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png?1"/>
	<link rel="stylesheet" type="text/css" href="assets/css/default.css?<?php echo time(); ?>">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="assets/ckeditor/ckeditor.js"></script>
    <script src="assets/ckeditor/adapters/jquery.js"></script>
	<script>
	$(function() {
		$('#nav .menu > li > a').click(function(){
			var submenu = $(this).next('ul.submenu');
			$('.submenu').not(submenu).slideUp('slow');
			$(submenu).slideToggle('slow');
		});
		$('#notificacao #botao').click(function(){
			$.ajax({
				type: 'GET',
				url: 'index.php?notificacao',
				success:function(){
					$('#notificacao #botao .new').remove();
				}
			});
			var box = $(this).next('#box');
			$(box).slideToggle('slow');
		});
	});
	</script>
	<style> #right #conteudo .button{ background-image: url('assets/img/<?php echo $tema_color ?>'); } </style>
</head>
<body style="background: url('assets/img/<?php echo $tema_bg; ?>')">
	<div id="left" style="background: url('assets/img/<?php echo $tema_color; ?>')">
		<div id="avatar" style="background: #EEE url('assets/uplouds/<?php echo $aa_data['avatar']; ?>') no-repeat center;">
			<div class="avatar" style="background: url('http://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $aa_data['usuario'] ?>&head_direction=3&action=crr=667&gesture=sml') -8px -17px"></div>
		</div>
<?php
		$aa_cargo = $pdo->query("SELECT * FROM aa_usuarios_rel r, aa_cargos c WHERE r.cargo_id=c.cargo_id AND r.user_id='".$aa_data['id']."' ORDER BY c.ordem ASC");
?>
		<div id="data">
			<span style="font-size: 17px; font-weight: bold"><?php echo $aa_data['usuario']; ?></span><br>
			<span style="font-size: 11px"><?php while($ver_cargo = $aa_cargo->fetch(PDO::FETCH_ASSOC)){ echo $ver_cargo['cargo'].'<br>'; } ?></span></div>
		<div id="nav">
			<ul class="menu">
			<style>
				#left #nav .menu > li > a{ 
					background: <?php echo $tema_bg_menu; ?>; 
					color: <?php echo $tema_fonte_menu; ?>;
				} 
				#left #nav .menu .submenu > li > a{
					background: <?php echo $tema_bg_menu; ?>;
					color: <?php echo $tema_fonte_menu; ?>;
				}
			</style>
			<li><a href="inicio">Inicio</a></li>
<?php
			$sql_menu = $pdo->query("SELECT * FROM aa_usuarios_rel r, aa_canais c, aa_permissao p WHERE r.user_id = '".$aa_data['id']."' AND r.cargo_id = p.cargo_id AND p.canal_id = c.canal_id AND c.status = 'true' AND c.pai = '0' GROUP BY p.canal_id ORDER BY c.ordem");
			while ($menu = $sql_menu->fetch(PDO::FETCH_ASSOC)) {
?>
			<li><a><?php echo $menu['canal']; ?></a>
				<ul class="submenu">
<?php
	$sql_submenu = $pdo->query("SELECT * FROM aa_usuarios_rel r, aa_canais c, aa_permissao p WHERE r.user_id = '".$aa_data['id']."' AND r.cargo_id = p.cargo_id AND p.canal_id = c.canal_id AND c.status = 'true' AND c.pai = '".$menu['canal_id']."' GROUP BY p.canal_id ORDER BY c.canal, c.ordem");
				if($sql_submenu->rowCount() == 0){
					echo '<li><a>Sem Acesso!</a></li>';	
				}else{
					while ($submenu = $sql_submenu->fetch(PDO::FETCH_ASSOC)) {
?>
				<li><a href="pagina/<?php echo $submenu['diretorio']; ?>"><?php echo $submenu['canal']; ?></a></li>
<?php
					}
				}
?>
				</ul>
			</li>
<?php
			}

?>
			<li><a href="deslogar">Sair</a></li>
			</ul>
		</div>
		<div id="creditoss">
			<b>GPainel <?php if(date('Y',@time()) == '2016'){ echo '2016'; }else{ echo '2016 ~ '.date('Y',@time()).''; } ?></b> - Todos direitos reservados. Desenvolvido por <b style="cursor:pointer" onclick="window.open('http://facebook.com/eventosdjmatheusgarcia','_blank')">Matheus Garcia.</b> 
		</div>
	</div>
	<div id="right">
		<div id="notificacao">
		<?php
			$visto_num = $pdo->query("SELECT * FROM aa_notificacao WHERE visto='false' AND usuario='".$aa_data['usuario']."'")->rowCount();
		?>
			<div id="botao"><?php if($visto_num > 0){?> <div class="new"><?php echo $visto_num ?></div> <?php } ?>Notificações</div>
			<div id="box">
				<div class="arrow"></div>
				<div id="over">
					<?php
						$notificacao_conexao = $pdo->query("SELECT * FROM aa_notificacao WHERE usuario='".$aa_data['usuario']."' ORDER BY id DESC");
						while ($ver_notificacao = $notificacao_conexao->fetch(PDO::FETCH_ASSOC)) {
						?>
							<div class="notificacao"><?php echo $ver_notificacao['texto'] ?></div>
						<?php
						}
					?>
				</div>
			</div>
		</div>
		<div id="conteudo">
			<?php
				include "assets/modulos/conteudo.php";
			?>
		</div>
	</div>
	<script>CKEDITOR.replace('ckeditor')</script>
</body>
</html>