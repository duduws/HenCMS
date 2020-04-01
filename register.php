<?php require_once("inc/core.god.php");
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

if(isset($_POST['Usuario']) && isset($_POST['Mail']) && isset($_POST['Contrasena']) && isset($_POST['RContrasena']) && isset($_POST['Contracode']))
{   

	$Getnombre = mysql_query("SELECT * FROM users WHERE username = '". $_POST['Usuario'] ."'");
	$Getmail = mysql_query("SELECT * FROM users WHERE mail = '". $_POST['Mail'] ."'");

	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Usuario']) || empty($_POST['Mail']) || empty($_POST['Contrasena']) || empty($_POST['RContrasena']) || empty($_POST['Contracode']))
	{
		$regerror = '<div class="alert alert-danger" role="alert">Algo deu errado, tente novamente e verifique todos os dados.</div>';
	}
	elseif(mysql_num_rows($Getnombre) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">Você precisa escolher um nome.</div>';
	}
	elseif(mysql_num_rows($Getmail) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">Você precisa escolher um e-mail.</div>';
	}
	elseif($_POST['Contrasena'] !== $_POST['RContrasena'])
	{
		$regerror = '<div class="alert alert-danger" role="alert">As senhas não são as mesmas, verifique e tente novamente.</div>';
	}
    elseif(strlen($_POST['Usuario']) > 18 || strlen($_POST['Usuario']) < 3) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Seu nome de usuário é muito curto.</div>';
	}
	elseif(strlen($_POST['Contracode']) > 11 || strlen($_POST['Contracode']) < 4) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Seu código de segurança é muito curto.</div>';
	}
	elseif(strrpos($_POST['Usuario'], "á") || strrpos($_POST['Usuario'], "à") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "é") || strrpos($_POST['Usuario'], "è") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "í") || strrpos($_POST['Usuario'], "ì") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ó") || strrpos($_POST['Usuario'], "ò") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ú") || strrpos($_POST['Usuario'], "ù") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "õ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ã") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ñ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ý") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ç") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "~") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "|") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "[") || strrpos($_POST['Usuario'], "]") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "{") || strrpos($_POST['Usuario'], "}") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "!") || strrpos($_POST['Usuario'], "#") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "$") || strrpos($_POST['Usuario'], "%") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "&") || strrpos($_POST['Usuario'], "*") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ê") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "û") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "î") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ô") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "â") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "MOD-") || strrpos($_POST['Usuario'], "MOD_") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Algo de errado está acontecendo com seu nome, tente outro.</div>';
    }
	elseif(strrpos($_POST['Usuario'], "Wulles") || strrpos($_POST['Usuario'], "LeandrOo") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Você não pode criar um usuário com este nome.</div>';
    }
	elseif(strrpos($_POST['Usuario'], " ") || strrpos($_POST['Usuario'], " ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">Você não pode criar um usuário com este nome.</div>';
	}
	elseif (!$captcha) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">Você não é um Robo? Verifique sua identidade.</div>';
    }
	else
	{
		mysql_query("INSERT INTO users (username, password, passcode, mail, look, gender, motto, ip_register, credits, account_created, account_day_of_birth) VALUES ('". filtro($_POST['Usuario']) ."', '".md5($_POST['Contrasena'])."', '".md5($_POST['Contracode'])."', '". filtro($_POST['Mail']) ."', '". $Holo['look'] ."', '". $Holo['gender'] ."', '". $Holo['mision'] ."', '". $ip ."', '". $Holo['monedas'] ."', '" . time() ."', '" . time() ."')");
		$_SESSION['Username'] = mysql_real_escape_string($_POST['Usuario']);
		$_SESSION['Password'] = mysql_real_escape_string($_POST['Contrasena']);
		$_SESSION['Contracode'] = mysql_real_escape_string($_POST['Contracode']);
		header("Location: way");
	}
}

$_GET['Usuario'] = mysql_real_escape_string($_POST['Usuario']);
$_GET['Mail'] = mysql_real_escape_string($_POST['Mail']);
$_GET['Contrasena'] = mysql_real_escape_string($_POST['Contrasena']);
$_GET['RContrasena'] = mysql_real_escape_string($_POST['RContrasena']);
$_GET['Contracode'] = mysql_real_escape_string($_POST['Contracode']);

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
<div class="col-md-4">
<div class="content">
<div class="title">O que espera por você?</div>
<img src="/images/site/girl_blue_gift.gif" style="float: right;" />
<ul>
<li>Faça parte de uma divertida <strong>comunidade</strong></li>
<li>Participe de eventos valendo <strong>prêmios</strong></li>
<li>Tenha chance de ser um <strong><?php echo $Holo['name']; ?> famoso</strong></li>
</ul>
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
<div class="user-style"><span class="user-style "><?php echo $user['username'] ?></span></div>
<?php } ?>
</div>
</div>
</div>
<div class="col-md-8">
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Registro</h3>
<form role="form" method="POST" class="web-form">
<?php if($regerror !== NULL) { echo $regerror; } ?>
<div class="form-group">
<label for="username">Escolha um Nome:</label>
<input type="text" name="Usuario" class="form-control" placeholder="Escolha um Nome de Usuário" required autocomplete="off">
<p class="help-block"><font color="#004809"><i class="fa fa-info-circle" aria-hidden="true"></i> Seu <?php echo $Holo['name'] ?> nome pode conter letras maiúsculas, minúsculas, números e caracteres especiais _-=?!@:.,</font></p>
</div>
<hr>
<div class="form-group">
<label for="password">Informe seu E-mail:</label>
<input type="email" name="Mail" class="form-control" placeholder="Informe o seu e-mail" required autocomplete="off">
</div>
<div class="form-group">
<label for="password">Crie uma Senha:</label>
<input type="password" name="Contrasena" class="form-control" placeholder="Crie uma senha" required autocomplete="off">
</div>
<div class="form-group">
<label for="password">Repita sua Senha:</label>
<input type="password" name="RContrasena" class="form-control" placeholder="Repita sua senha" required autocomplete="off">
</div>
<hr>
<div class="form-group">
<label for="password">Crie um Código de Acesso:</label>
<input type="password" name="Contracode" class="form-control" placeholder="Código" required autocomplete="off">
<p class="help-block">Você vai precisar dele para acessar a sua conta mais tarde.</p>
</div>
<div class="form-group">
<label for="habbo-motto">Sua missão é:</label>
<input type="text" style="font-size: 25px; background: #e5e5e5; padding: 10px; outline: none; cursor: pointer; border: 0; width: 100%;" id="motto-verification" data-toggle="tooltip" title="" value="<?php echo $Holo['mision'] ?>" readonly>
<p class="help-block"><font color="#337ab7"><i class="fa fa-info-circle" aria-hidden="true"></i> Você pode mudar sua Missão dentro do jogo a qualquer momento.</font></p>
</div>
<p><script src="https://www.google.com/recaptcha/api.js"></script><center><div class="g-recaptcha" data-sitekey="<?php echo $Holo['recaptcha'] ?>" ></div></center></p>
<button name="register" type="submit" value="Pronto! Criar minha conta" class="btn btn-success btn-block btn-signup">Pronto! Criar minha conta</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>