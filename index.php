<?php
require_once("inc/core.god.php");
require_once("inc/class.recaptchalib.php");

if(Loged == TRUE)
{
	header("Location: me");
	exit;
}

if(MANTENIMIENTO == '1') 
{
    header("Location: mantenimiento");
	exit;
}

if(isset($_POST['Username']) && isset($_POST['Password']))
{
	
	$Getuser = mysql_query("SELECT * FROM users WHERE username = '". $_POST['Username'] ."' AND password = '". md5($_POST['Password']) ."'");

	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Username']) || empty($_POST['Password']))
	{
		$loginerror = '<div class="alert alert-danger" role="alert">Você não pode deixar campos vazios.</div>';
	}

	elseif(mysql_num_rows($Getuser) == 0)
	{
		$loginerror = '<div class="alert alert-danger" role="alert">Algo deu errado, tente novamente com maior atenção.</div>';
	}
	
	elseif (!$captcha) 
	{
        $loginerror = '<div class="alert alert-danger" role="alert">Você não é um Robo? Verifique sua identidade.</div>';
    }

	else 
	{
		if(mysql_num_rows($Getuser) > 0)
		{
			$_SESSION['Username'] = mysql_real_escape_string($_POST['Username']);
			$_SESSION['Password'] = mysql_real_escape_string($_POST['Password']);
			header("Location: me");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Início</title>
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
<div class="col-md-5">
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Entrar</h3>
<form role="form" method="POST" class="web-form">
<?php if($loginerror !== NULL) { echo $loginerror; } ?>
<div class="form-group">
<input type="hidden" name="csrf" value="9pWGGHjqVVahMuE" />
<label for="username">Nome de Usuário(a):</label>
<input type="text" name="Username" class="form-control" id="login-username" placeholder="Usuário" required autocomplete="off">
</div>
<div class="form-group">
<label for="password">A sua Senha:</label>
<input type="password" name="Password" class="form-control" id="login-password" placeholder="Senha" required autocomplete="off">
<p class="help-block">Sua senha é igual chulé - se ventilar você estará em apuros.</p>
</div>
<hr>
<p><script src="https://www.google.com/recaptcha/api.js"></script><center><div class="g-recaptcha" data-sitekey="<?php echo $Holo['recaptcha'] ?>" ></div></center></p>
<hr>
<button name="login" type="submit" value="Pronto! Acessar minha conta" class="btn btn-primary btn-block btn-login">Pronto! Acessar minha conta</button>
<br>
<p>Chame seus amigos para jogar junto.</p>
</form>
</div>
</div>
<div class="col-md-7">
<div style="font-size: 20px; margin-bottom: 10px; color: #337ab7; border-bottom: 1px solid #c3c3c3; padding-bottom: 5px;">Últimas Notícias<div style="float: right;"><small>Acesse sua conta para ler</small></div></div>
<div class="home-articles">
<div class="row">
<?php $news = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 4");
while($new = mysql_fetch_array($news)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
<div class="col-md-6">
<div class="ha-article">
<div class="ha-thumbnail" style="background: url(<?php echo $new['image']; ?>) center;"></div>
<div class="ha-content">
<div class="ha-title"><?php echo $new['title']; ?></div>
<div class="ha-story"><?php echo mysql_real_escape_string($new['shortstory']); ?></div>
<div class="ha-timestamp" style="font-size: 12px;"><i class="fa fa-clock-o"></i> <span><?php echo GetLast($new['date']); ?>.</span></div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="content">
<div class="title">O que espera por você?</div>
<img src="/images/site/girl_blue_gift.gif" style="float: right;" />
<ul>
<li>Faça parte de uma divertida <strong>comunidade</strong></li>
<li>Participe de eventos valendo <strong>prêmios</strong></li>
<li>Tenha chance de ser um <strong><?php echo $Holo['name']; ?> famoso</strong></li>
</ul>
<a href="/register" class="btn btn-success btn-block">Crie uma conta Já!</a>
</div>
</div>
</div> </div>
</div>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>