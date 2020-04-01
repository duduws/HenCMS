<?php
	include "assets/install/config.php";
	if(isset($_SESSION['logado'])){ header("Location:inicio"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<base href="<?php echo $config_base; ?>">
	<title>Login - GPainel Content Manager</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png?<?php echo time(); ?>"/>
	<link rel="stylesheet" type="text/css" href="assets/css/default.css?<?php echo time(); ?>">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script>
		login = {
			pin:function(data){
				pin = $("#form_login #pin").val();
				if(data == 'all'){
					$("#form_login #pin").val('');
				}else{
					$("#form_login #pin").val(pin+data);
				}
			},
			logar:function(){
				var usuario = $('#usuario').val();
				var senha = $('#senha').val();
				var pin = $('#pin').val();
				if(usuario == '' || senha == '' || pin == ''){
					login.alerta('#FF0000','Preencha todos campos!');
				}else{
					$.ajax({
						type:'POST',
						url:'assets/ajax/login.php',
						data:{'usuario':usuario, 'senha':senha, 'pin':pin},
						beforeSend:function(){
							$('#form_login').animate({opacity:0.5});
						},
						success:function(data){
							$('#form_login').animate({opacity:1});
							if(data == 'true'){
								login.alerta('#58AE03','Parabéns! Aguarde!');
								setTimeout("location.href='inicio'",1000);
							}else if(data == 'baned_ip'){
								login.alerta('#FF0000','IP banido do GPainel!');
							}else if(data == 'baned_user'){
								login.alerta('#FF0000','Usuário banido do GPainel!');
							}else if(data == 'negra'){
								login.alerta('#FF0000','Usuário na lista negra do GPainel!');
							}else{
								login.alerta('#FF0000','Usuário inexistente ou inativado np GPainel!');
							}
						}
					});
				}
			},
			alerta:function(cor, texto){
				$('#box_login #alerta').css('background',cor);
				$('#box_login #form_login').animate({'margin':'85px 25px 25px 25px'}, 1000);
				$('#box_login #alerta span').html(texto);
				$('#box_login #alerta').animate({'height':'50px'}, 1000);
				setTimeout(function() {
					$('#box_login #alerta').animate({'height':'0'}, 1000);
					$('#box_login #form_login').animate({'margin':'25px 25px 25px 25px'}, 1000);
				}, 5000);
			}
		}
		$(function() {
			$('#form_login').submit(function(event) {
				login.logar();
			});
		});
	</script>
</head>
<body style="background-image: url('assets/img/<?php echo $tema_lbg; ?>'); background-size: cover">
	<div id="logo"></div>
	<div id="box_login">
		<div class="arrow"></div>
		<div id="alerta"><span style="margin: 16px; float: left"></span></div>
		<form action="javascript:;" id="form_login">
			<input type="text" class="text" id="usuario" autocomplete="off" placeholder="Digite seu nick">
			<input type="password" class="text" id="senha" autocomplete="off" placeholder="Digite sua senha">
			<input type="password" id="pin" readonly placeholder="PIN">
			<div class="pin" style="margin: 10px 0 0 0" onclick="login.pin(1)">1</div>
			<div class="pin" onclick="login.pin(2)">2</div>
			<div class="pin" onclick="login.pin(3)">3</div>
			<div class="pin" onclick="login.pin(4)">4</div>
			<div class="pin" onclick="login.pin(5)">5</div>
			<div class="pin" onclick="login.pin(6)">6</div>
			<div class="pin" onclick="login.pin(7)">7</div>
			<div class="pin" onclick="login.pin(8)">8</div>
			<div class="pin" onclick="login.pin(9)">9</div>
			<div class="pin" style="width: 10%" onclick="login.pin(0)">0</div>
			<div class="limpar" onclick="login.pin('all')">Apagar</div>
			<input type="submit" value="Logar!">
		</form>
	</div>
	<div id="creditos" style="color: <?php echo $tema_fonte; ?>">
		<b>GPainel <?php if(date('Y',@time()) == '2016'){ echo '2016'; }else{ echo '2016 ~ '.date('Y',@time()).''; } ?></b> - Todos direitos reservados. Desenvolvido por <b style="cursor:pointer" onclick="window.open('http://facebook.com/eventosdjmatheusgarcia','_blank')">Matheus Garcia</b>.
	</div>
</body>
</html>