<?php require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

if(MANTENIMIENTO == '1') 
{
    header("Location: mantenimiento");
	exit;
}

session_destroy();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Desconexão</title>
<META http-equiv="refresh" content="3;URL=/index">
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
<div id="header">
<a href="/index"><div class="main logo"></div></a> <div class="container">
<div id="header-left">
<div id="nav" class="nav-responsive-hidden">
<ul>
<li><a href="/index"><img src="/images/icons/home_icon.gif" class="nav-icon"> <span>Início</span></a></li>
</ul>
</div>
</div>
<div id="header-right">
<div id="nav">
<ul>
<li><a href="/index"><img src="/images/icons/login_icon.gif" class="nav-icon-responsive-responsive"> <span>Entrar</span></a></li>
<li><a href="/register"><img src="/images/icons/signup_icon.gif" class="nav-icon-responsive-responsive"> <span>Registro</span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div id="banner">
<div class="banner-dynamic banner-clouds" style="opacity: 0.6;"></div>
<div class="banner-dynamic banner-backdrop">
<a href="https://www.instagram.com/oisouhen/" target="_blank" data-habbo="Wulles" class="banner-avatar" style="position: absolute; background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user=Wulles&action=sit,crr=6); width: 64px; height: 110px; left: 99px; top: 60px;"></a>
</div>
</div>
<div id="main-wrapper">
<div class="container">
<div class="row content-box">
<div class="col-md-8">
<div class="content">
<img src="/images/site/hello.gif" style="float: right; opacity: 0.5;">
<h3 style="margin-top: 0;">Você se Desconectou com Sucesso!</h3>
<p>Agradecemos a sua visita em nosso querido Hotel! Esperamos que você possa voltar sempre e contigo trazer novos amigos para novas experiências de jogabilidade.<br><br>Esperamos ver você em breve - beijos.</p>
</div>
</div>
<div class="col-md-4">
<div class="content">
<div class="title">O que espera por você?</div>
<img src="/images/site/girl_blue_gift.gif" style="float: right;" />
<ul>
<li>Faça parte de uma divertida <strong>comunidade</strong></li>
<li>Participe de eventos valendo <strong>prêmios</strong></li>
<li>Tenha chance de ser um <strong><?php echo $Holo['name']; ?> famoso</strong></li>
</ul>
<a href="/register" class="btn btn-success btn-block">Crie uma conta Já!</a>
<h3>Já tem uma conta?</h3>
<a href="/index" class="btn btn-success btn-block">Entre nela Agora!</a>
</div>
</div>
</div> </div>
</div>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>