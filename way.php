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

if(isset($_POST['rules']))
{
    mysql_query("UPDATE users SET accept_rules = '1' WHERE id = '". $myrow['id'] ."'");
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Regras</title>
<link href="<?php echo $Holo['url']; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/bootstrap-override.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/site-index.css" rel="stylesheet">
<link href="<?php echo $Holo['url']; ?>/css/custom.css" rel="stylesheet">
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
<div id="page">
<div id="dynamic">
<div id="floater">
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '0'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
<div id="header">
<a href="/index"><div class="main logo"></div></a> <div class="container">
<div id="header-left">
<div id="nav" class="nav-responsive-hidden">
<ul>
<li><a href="/way"><img src="/images/icons/heart.gif" class="nav-icon"> <span>Regras</span></a></li>
</ul>
</div>
</div>
<div id="header-right">
<div id="nav">
<ul>
<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
while($isadm = mysql_fetch_assoc($isadmin)){ ?><li class="hidden-sm hidden-xs"><a href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>" target="_blank"><img src="/images/icons/invite_icon.gif" class="nav-icon-responsive"> Painel</a></li><?php } ?>
<li class="hidden-sm hidden-xs"><a href="/logout"><img src="/images/icons/close_icon.gif" class="nav-icon-responsive"></a></li>
</ul>
</div>
</div>
</div>
</div>
<?php } ?>
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '1'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
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
<?php } ?>
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
<div class="col-md-8">
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Antes de tudo você tem que saber que:</h3>
<p>
				<p>A lista a baixo são as coisas que <b>Não</b> são toleradas no <?php echo $Holo['name'] ?>:</p>
				<p><b>Assédio e informações pessoais</b></p>
					<ul>
						<li>Assédio excessivo, abuso e intimidação de qualquer tipo.</li>
						<li>Compartilhar ou liberar informações particulares dos usuários ou equipe de qualquer maneira.</li>
						<li>Fazer ameaças de qualquer tipo contra os usuários ou equipe.</li>
					</ul>
				<p></p>
				<p><b>Outros idiomas e Spamming</b></p>
					<ul>
						<li>Não falar Português pode resultar em banimento, por favor use o Bate papo para outros idiomas.</li>
						<li>Não floodar em salas públicas, eventos, ou em quartos que não são seus.</li>
					</ul>
				<p></p>
				<p><b>Scripts e abuso de bugs</b></p>
					<ul>
						<li>É proibido o uso de qualquer programa que lhe dê alguma vantagem.</li>
						<li>Abusar de bugs e falhas, informe-nos imediatamente.</li>
					</ul>
				<p></p>
				<p><b>Venda de contas e Compartilhamentos</b></p>
					<ul>
						<li>A venda de qualquer conta por qualquer motivo.</li>
						<li>A venda de itens no jogo / dinheiro para outra moeda.</li>
						<li>O compartilhamento de contas para fins mal-intencionados, como impulsionar placar de conquista.</li>
						<li>Usando mais de Uma conta por vez.</li>
					</ul>
				<p></p>
				<p><b>Divulgar outros sites e jogos</b></p>
					<ul>
						<li>É claramente proibido qualquer tipo de divulgação de outros jogos, servidores, ou sites sem ser de vínculo conosco.</li>
					</ul>
				<p><hr>Não há <b>recursos contra Banimento</b>!</p>
</p>
</div>
</div>
<div class="col-md-4">
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '1'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
<a href="/hotel"><div class="content daily-gift" style="padding: 20px; background: #69a95e; color: white; cursor: pointer;"><img src="/images/site/hoteljoin.png" style="float: right; margin-top: -5px;"> Entrar no <?php echo $Holo['name']; ?> Hotel » </div></a>
<?php } ?>
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '0'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
<div class="content-header poll">
<div class="content-header-title">Você aceita</div>
<div class="content-header-desc">Aqui é a sua decisão inícial para tudo.</div>
</div>
<div class="content">
<form method="POST" class="poll web-form">
<img src="/images/site/girl_mic_poll.gif" style="float: right;">
Se você não seguir as regras claramente estabelecidas, você será banido sem a opção de recorrer contra o mesmo.
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '0'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
<br><br>
<input type="submit" name="rules" type="submit" value="Eu aceito as Regras" class="btn btn-primary btn-sm">
<?php } ?>
</form>
</div>
<?php } ?>
<div class="content">
Antes de tudo no <?php echo $Holo['name']; ?>, você precisa <a href="https://get.adobe.com/br/flashplayer/">Ativar ou Abaixar</a> do Adobe Flash Player antes de tudo.
</div>
<div class="content-header habbos">
<div class="content-header-title">Ativos agora</div>
<div class="content-header-desc">Veja quem está jogando agora mesmo.</div>
</div>
<div class="content">
<?php echo Onlines(); ?> usuários ativos agora.
<div class="online-users">
<?php $users = mysql_query("SELECT * FROM users WHERE online = '1' ORDER BY online DESC");
while($user = mysql_fetch_array($users)){ ?>
<div class="user-style"><span class="user-style <?php echo $user['user_style']; ?>"><?php echo $user['username']; ?></span></div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '1'");
while($newuse = mysql_fetch_assoc($newuser)){ ?>
<?php require_once("hen/notification.php"); ?>
<?php } ?>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>