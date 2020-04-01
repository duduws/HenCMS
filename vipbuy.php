<?php require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

if(mysql_num_rows($chb) > 0) 
{
    header("Location: banned");
	exit;
}

if(MANTENIMIENTO == '1') 
{
    header("Location: mantenimiento");
	exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Compra Feita</title>
<link href="<?php echo $Holo['url']; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/bootstrap-override.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/site-index.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/custom.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/wulles.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/nanoscroller.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="<?php echo $Holo['url']; ?>/css/pnotify.custom.min.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Aref+Ruqaa" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/bootstrap-suggest.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/qtip.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.wysibb.com/css/default/wbbtheme.css" />
<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/css/responsiveslides.css" />
<link href="<?php echo $Holo['url']; ?>/css/slick.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/slick-theme.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/tagsinput.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/slicknav.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/dropzone.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/gapless5.css" rel="stylesheet" type="text/css" />
</head>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){

$('body').css('display', 'none');
$('body').fadeIn(3000);

});
</script>

<body onselectstart='return false' ondragstart='return false'>

<div class="content" style="position: relative; margin: auto; margin-top: 30px; max-width: 900px; overflow: hidden;">
<div style="height: 250px; width: 220px; right: 0px; top: 50px; position: absolute; background: url(/images/vip/becomevip.png); background-repeat: no-repeat;"></div>
<div style="font-size: 30px; margin-bottom: 10px;"><b><font color="#07A3C9">Parabéns</font></b> <?php echo $myrow['username']; ?>.</div>
<p style="padding-right: 135px;">Primeiramente agradecemos a sua compra de VIP no <?php echo $Holo['name']; ?> Hotel.</p>
<hr>
<p style="padding-right: 135px;"><div style="font-size: 20px; margin-bottom: 10px;"><b><font color="#07C90C">Como ativo meu VIP?</font></b></div></p>
<p style="padding-right: 135px;">
Comprou e já foi confirmado o pagamento? <b>Parabéns</b>, agora chame no WhatsApp um de nossos representantes e envie as informações necessárias para a ativação de seu VIP dentro do nosso Hotel.<br><br>É bem simples, só vamos pedir uma foto/screenshot do Boleto que foi gerado assim que seu pagamento foi confirmado, depois disso é só se divertir com seus benefícios.
</p>
<p style="padding-right: 500px;">
<a class="btn btn-success btn-block btn-md" target="_blank" href="https://api.whatsapp.com/send?phone=5528999348880&text=Olá,%20sou%20<?php echo $myrow['username']; ?>%20e%20comprei%20VIP%20no%20<?php echo $Holo['name']; ?>%20Hotel%20e%20eu%20gostaria%20de%20ativar."><img src="/images/vip/whatsapp.png" style="float: right; margin-top: 0px;"> Entrar em contato com Crazzyflos » </a>
<a class="btn btn-success btn-block btn-md" target="_blank" href="https://api.whatsapp.com/send?phone=5528999348880&text=Olá,%20sou%20<?php echo $myrow['username']; ?>%20e%20comprei%20VIP%20no%20<?php echo $Holo['name']; ?>%20Hotel%20e%20eu%20gostaria%20de%20ativar."><img src="/images/vip/whatsapp.png" style="float: right; margin-top: 0px;"> Entrar em contato com Wulles » </a>
</p>
<hr>
<p style="padding-right: 135px;"><div style="font-size: 20px; margin-bottom: 10px;"><b><font color="#D49103">Meu pagamento está em Processo?</font></b></div></p>
<p style="padding-right: 135px;">
Seu pagamento ainda não foi confirmado mas seu dinheiro foi descontado? Não se desespere, por <a href="https://www.mercadopago.com.br/ajuda/respostas-solucoes-pagamentos-online_189" target="_blank">Normas de segurança do MercadoPago</a>, o processo de pagamento pode demorar um pouco, variando entre Horas e Minutos, até que seu banco aprove e notifique você de uma confirmação do seu pagamento.<br><br><b><font color="#5A0000">Quando seu pagamento for confirmado, siga as mesmas instruções logo á cima, sobre pagamentos já aprovados e como ativar o seu VIP.</font></b>
</p>
<div style="font-size: 15px;">Para a sua segurança, suas informações:</div>
<ul>
<li>Seu nome de usuário: <b><?php echo $myrow['username']; ?></b></li>
<li>Seu e-mail: <b><?php echo $myrow['mail']; ?></b></li>
</ul>
<hr>
<p style="padding-right: 500px;"><a class="btn btn-info btn-block btn-md" href="/index">Voltar para a Página Inícial</a></p>
</div>

</body>
</html>