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
<title><?php echo $Holo['name']; ?>: Clube VIP</title>
<link href="<?php echo $Holo['url']; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/bootstrap-override.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/site-index.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/custom.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/wulles.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/vipshop.css" rel="stylesheet">
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
<style type="text/css">
    .ui-pnotify-container{
        background: rgba(0, 0, 0, 0.85);
        color: white !important;
        border-radius: 0;
        border-color: black !important;
    }
</style>
</head>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){

$('body').css('display', 'none');
$('body').fadeIn(3000);

});
</script>

<body onselectstart='return false' ondragstart='return false'>
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '0'");
while($newuse = mysql_fetch_assoc($newuser)){ 
header("Location: /way"); die();?><?php } ?>
<div id="page">

<div id="dynamic">
<div id="floater">
<div id="header">
<a href="/home"><div class="main logo"></div></a> <div class="container">
<div id="header-left">
<div id="nav" class="nav-responsive-hidden">
<ul>
<li><a href="/me"><img src="/images/icons/home_icon.gif" class="nav-icon"> <span>Início</span></a></li>
<li><a href="/vipshop"><img src="/images/icons/shop_icon.gif" class="nav-icon"> <span>Loja</span></a></li>
<li><a href="/articles"><img src="/images/icons/news_icon.gif" class="nav-icon"> <span>Notícias</span></a></li>
<li><a href="/famous"><img src="/images/icons/star_icon.gif" class="nav-icon"> <span>Famosos</span></a></li>
<li><a href="/photos"><img src="/images/icons/camera_icon.gif" class="nav-icon"> <span>Fotos</span></a></li>
<li><a href="/way"><img src="/images/icons/heart.gif" class="nav-icon"> <span>Regras</span></a></li>
</ul>
</div>
</div>
<div id="header-right">
<div id="nav">
<ul>
<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
while($isadm = mysql_fetch_assoc($isadmin)){ ?><li class="hidden-sm hidden-xs"><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank"><img src="/images/icons/invite_icon.gif" class="nav-icon-responsive"> Painel</a></li><?php } ?>
<li class="hidden-sm hidden-xs"><a href="/account/correo"><img src="/images/icons/cog_icon.gif" class="nav-icon-responsive"></a></li>
<li class="hidden-sm hidden-xs"><a href="/logout"><img src="/images/icons/close_icon.gif" class="nav-icon-responsive"></a></li>
<li class="hidden-sm hidden-xs"><a href="/home/<?php echo $myrow['username']; ?>"><img src="/images/icons/duck_icon.gif" class="nav-icon-responsive"> <span class="user-style <?php echo $myrow['user_style']; ?>"><?php echo $myrow['username']; ?></span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div id="banner">
<div class="banner-dynamic banner-clouds" style="opacity: 0.6;"></div>
<div class="banner-dynamic banner-backdrop">
<a href="/home/<?php echo $myrow['username']; ?>" class="banner-avatar" style="position: absolute; background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&action=sit,crr=6); width: 64px; height: 110px; left: 99px; top: 60px;"></a>
</div>
<div class="profile-right">
<div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;size=l); height: 170px; width: 128px;"></div>
</div>
</div>
<div id="main-wrapper">
<div class="container">
<div class="row content-box">

<div class="col-md-8" role="toolbar">
<div style="height: 250px; width: 220px; right: 15px; top: 50px; position: absolute; background: url(/images/vip/becomevip.png); background-repeat: no-repeat;"></div>
<div class="content">
<h3 style="margin-top: 0;"><font color="#A2870E">Benefícios de um membro do Clube VIP</font></h3>
Ao se tornar um membro VIP, você se torna uma Celebridade.<hr>
<font size="5" color="#0E8EA2">Sua carteira:</font><br>
<ul>
<li><b>10</b> Diamantes a mais que os usuários normais.</li>
<li><b>150</b> Duckets a mais que os usuários normais.</li>
<li><b>1.000</b> Moedas a mais que os usuários normais.</li>
<li><b>1.000</b> Pontos no seu Placar de Conquista.</li>
</ul>
<font size="5" color="#2FA20E">Seus direitos:</font><br>
<ul>
<li>Direitos para acessar Quartos Lotados.</li>
<li>Direitos para entrar em Áreas VIP exclusivas em eventos.</li>
<li>Direito a Emblema Exclusivo para assinantes VIP.</li>
<li>TAG VIP no seu nome dentro do Hotel.</li>
<li>COR VIP no seu nome no site do Hotel.</li>
</ul>
<font size="5" color="#850EA2">Sua loja:</font><br>
<ul>
<li>Coleção de Raros Exclusivos.</li>
<li>Coleção de Mobís Exclusivos.</li>
<li>Seção de Emblemas Exclusivos.</li>
<li>Seção de Câmbios/Diamantes com Descontos.</li>
</ul>
<font size="5" color="#A25D0E">Seus comandos:</font><br>
<ul>
<li><b>:pull</b> para Puxar alguém.</li>
<li><b>:push</b> para Empurrar alguém.</li>
<li><b>:mimic</b> para Copiar o vísual de alguém.</li>
<li><b>:flagme</b> para Mudar o nome da sua Conta.</li>
</ul>
<hr>
Após a compra, será instruído ao comprador como solicitar ativação do mesmo, podendo levar até 24h.<br><br><b><font color="#D40B0B">Não pedimos quaisquer informações pessoais ou banais a você! Se suspeitar de algo, entre em contato com a nossa equipe, e sempre verifique se o link do hotel está correto - <?php echo $Holo['url']; ?>/.</font></b>
</div>
</div>

<div class="col-md-4">
<div class="content">
<h3 style="margin-top: 0;">Escolha um Plano</h3>
    <hr>
	<a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=288871839-b411f6a0-d590-411e-9a92-ae7faae616e3" target="_blank">
		<habbo-accordion-item-preview>
				<habbo-product-thumbnail item="item">
					<div class="inventory-thumbnail">
						<div class="inventory-thumbnail__body">
							<div class="inventory-thumbnail__text">
								<h3 class="inventory-thumbnail__title"><font color="#FFFFFF">1 Mês de VIP</font></h3>
							</div>
							<div class="inventory-thumbnail__banner">
								<span class="inventory-thumbnail__price"><font color="#FFFFFF">R$ 24,99</font></span>
							</div>
						</div>
					</div>
				</habbo-product-thumbnail>
		</habbo-accordion-item-preview>
	</a>
	<hr>
	<a href="https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=288871839-9ddb47f4-5498-4abd-bfad-2df0ca7011df" target="_blank">
		<habbo-accordion-item-preview>
				<habbo-product-thumbnail item="item">
					<div class="inventory-thumbnail">
						<div class="inventory-thumbnail__body">
							<div class="inventory-thumbnail__text">
								<h3 class="inventory-thumbnail__title"><font color="#FFFFFF">3 Meses de VIP</font></h3>
							</div>
							<div class="inventory-thumbnail__banner">
								<span class="inventory-thumbnail__price"><font color="#FFFFFF">R$ 49,99</font></span>
							</div>
						</div>
					</div>
				</habbo-product-thumbnail>
		</habbo-accordion-item-preview>
	</a>
	<hr>
	<div class="alert alert-warning" role="alert"><b>Atenção:</b> Se você é menor de idade e deseja comprar o nosso plano VIP, consulte seus pais primeiramente.</div>
</div>
<?php $users = mysql_query("SELECT * FROM users WHERE rank = '2' ORDER BY rand() DESC LIMIT 1");
while($user = mysql_fetch_array($users)){ ?>
<div class="content-header" style="background: #33b1ad;">
<div class="content-header-title">VIPs Aleatórios</div>
<div class="content-header-desc">Conheça <span class="user-style <?php echo $user['user_style']; ?>"><?php echo $user['username']; ?></span>!</div>
</div>
<div style="background: url(/images/site/todays-catch.png) right bottom no-repeat; height: 200px; background-color: #35bbb7; position: relative;">
<div style="background: url(<?php echo $Holo['avatar'] . $user['look']; ?>&amp;direction=3&amp;head_direction=3&amp;action=wav,crr=1); height: 110px; width: 64px; position: absolute; bottom: 12px; left: 25px;"></div>
<div class="trunk" style="background: url(/images/site/summer_swim_trunk.gif); height: 53px; width: 84px; position: absolute; bottom: 10px; left: 10px;"></div>
</div>
<?php } ?>
</div>

</div>
</div>
</div>
<?php require_once("hen/notification.php"); ?>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>