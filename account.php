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

if(isset($_POST['email_a']) && isset($_POST['email_n']) && isset($_POST['email_nr']))
{
    $EA = filtro($_POST['email_a']);
    $EN = filtro($_POST['email_n']);
    $ENR = filtro($_POST['email_nr']);

    $Checkmail = mysql_query("SELECT * FROM users WHERE mail = '". $EN ."'");

    if(empty($EA) || empty($EN) || empty($ENR))
    {
        $aerror = 'Não deixe campos vazios.';
    }
    elseif(mysql_num_rows($Checkmail) > 0) 
    {
        $aerror = 'O e-mail que você colocou já existe, coloque outro.';
    }
    elseif($EN != $ENR)
    {
        $aerror = 'Os e-mails não são os mesmos, tente novamente.';
    }
    elseif($EA != $myrow['mail'])
    {
        $aerror = 'O e-mail antigo não é o correto.';
    }
    else
    {
        mysql_query("UPDATE users SET mail = '". $EN ."' WHERE id = '". $myrow['id'] ."'");
        $aok = 'Você mudou seu e-mail corretamente!<META http-equiv="refresh" content="2;URL=/account/correo">';
    }
}

if(isset($_POST['country']))
{
    $CTR = filtro($_POST['country']);

    mysql_query("UPDATE users SET country = '". $CTR ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Você modificou o seu País de Origem com Sucesso.<META http-equiv="refresh" content="2;URL=/account/perfil">';
}

if(isset($_POST['Pass']) && isset($_POST['NPass']) && isset($_POST['RNPass']))
{
    $Pass = filtro($_POST['Pass']);
    $NPass = filtro($_POST['NPass']);
    $RNPass = filtro($_POST['RNPass']);

    $Checkpass = mysql_query("SELECT * FROM users WHERE id = '". $myrow['id'] ."'");
    $passss = mysql_fetch_assoc($Checkpass);

    if(empty($Pass) || empty($NPass) || empty($RNPass))
    {
        $aerror = 'Não deixe campos vazios';
    }
    elseif($NPass != $RNPass)
    {
        $aerror = 'Novas senhas não correspondem';
    }
    elseif(md5($Pass) != $passss['password'])
    {
        $aerror = 'A senha antiga não está correta';
    }
    else
    {
        mysql_query("UPDATE users SET password = '". md5($NPass) ."' WHERE id = '". $myrow['id'] ."'");
		echo '<META http-equiv="refresh" content="0;URL=/logout">';
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
<title><?php echo $Holo['name']; ?>: <?php echo $myrow['username']; ?></title>
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
<li class="hidden-sm hidden-xs"><a href="/home/<?php echo $myrow['username']; ?>"><img src="/images/icons/duck_icon.gif" class="nav-icon-responsive"> <?php echo $myrow['username']; ?></a></li>
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

<div class="col-md-8">
<form action="" method="post">
<?php if($_GET['item'] == "correo"){ ?>
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Ajustes de e-mail</h3>
<p>Atualize o seu Endereço de E-mail.</p>

        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>

<div class="form-group">
<label for="email">Seu e-mail atual:</label>
<input type="email" name="email_a" id="inputEmail" class="form-control" placeholder="Seu e-mail atual" value="<?php echo $myrow['mail']; ?>" required>
<p class="help-block">Use um e-mail verdadeiro e atual para que no futuro você não tenha problemas com a sua conta.</span></p>
</div>
<hr>
<div class="form-group" style="padding: 10px; background: #F5F5F5;">
<label for="password">O seu novo e-mail:</label>
<input type="email" name="email_n" id="inputEmail" class="form-control" placeholder="Informe seu novo e-mail" required>
<br>
<label for="password">Repita o seu novo e-mail:</label>
<input type="email" name="email_nr" id="inputEmail" class="form-control" placeholder="Repita o seu novo e-mail" required>
</div>
<button onclick="location.href='<?php echo $Holo['url']; ?>/';" class="btn btn-danger">Cancelar</button>
<button type="submit" name="account" class="btn btn-success">Confirmar atualização de e-mail »</button>
</div>
<?php }elseif($_GET['item'] == "contra"){ ?>
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Mudar sua senha</h3>
<p>Atualize a sua senha.</p>

        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>

<div class="form-group">
<label for="email">A sua Senha Atual:</label>
<input type="password" name="Pass" id="inputPassword" class="form-control" placeholder="A sua Senha Atual" required>
<p class="help-block">Tenha certeza que não errou nenhuma letra e que não vai esquecer.</span></p>
</div>
<hr>
<div class="form-group" style="padding: 10px; background: #F5F5F5;">
<label for="password">Agora crie uma Nova Senha:</label>
<input type="password" name="NPass" id="inputPassword" class="form-control" placeholder="Crie uma Nova Senha" required>
<br>
<label for="password">Repita a sua Nova Senha:</label>
<input type="password" name="RNPass" id="inputPassword" class="form-control" placeholder="Repita a sua Nova Senha" required>
</div>
<button onclick="location.href='<?php echo $Holo['url']; ?>/';" class="btn btn-danger">Cancelar</button>
<button type="submit" name="account" class="btn btn-success">Confirmar mudança de Senha »</button>
</div>
<?php }elseif($_GET['item'] == "perfil"){ ?>
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Configurações do perfil</h3>
<p>Configurações adicionais e essenciais para a sua conta.</p>

        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>

<div class="form-group">
<label for="timezone">Qual seu País de Origem?</label>
<?php $countrys = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'world'");
while($country = mysql_fetch_assoc($countrys)){ ?>
<select class="form-control" name="country" id="country">
<option value="br">Brasil</option>
<option value="pt">Portugal</option>
<option value="es">Espanha</option>
<option value="us">Estados Unidos</option>
</select>
<p class="help-block"><img src="/images/countries/world.gif" /> Você está sem seu País de Origem selecionado, por favor selecione-o.</p>
<?php } ?>
<?php $countrys = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'br'");
while($country = mysql_fetch_assoc($countrys)){ ?>
<select class="form-control" name="country" id="country">
<option value="br" selected="">Brasil</option>
<option value="pt">Portugal</option>
<option value="es">Espanha</option>
<option value="us">Estados Unidos</option>
</select>
<p class="help-block">Atualmente o seu País selecionado é: <span class="text-success"><img src="/images/countries/br.gif" /> <strong>Brasil</strong></span></p>
<?php } ?>
<?php $countrys = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'pt'");
while($country = mysql_fetch_assoc($countrys)){ ?>
<select class="form-control" name="country" id="country">
<option value="br">Brasil</option>
<option value="pt" selected="">Portugal</option>
<option value="es">Espanha</option>
<option value="us">Estados Unidos</option>
</select>
<p class="help-block">Atualmente o seu País selecionado é: <span class="text-danger"><img src="/images/countries/pt.gif" /> <strong>Portugal</strong></span></p>
<?php } ?>
<?php $countrys = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'es'");
while($country = mysql_fetch_assoc($countrys)){ ?>
<select class="form-control" name="country" id="country">
<option value="br">Brasil</option>
<option value="pt">Portugal</option>
<option value="es" selected="">Espanha</option>
<option value="us">Estados Unidos</option>
</select>
<p class="help-block">Atualmente o seu País selecionado é: <span class="text-warning"><img src="/images/countries/es.gif" /> <strong>Espanha</strong></span></p>
<?php } ?>
<?php $countrys = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'us'");
while($country = mysql_fetch_assoc($countrys)){ ?>
<select class="form-control" name="country" id="country">
<option value="br">Brasil</option>
<option value="pt">Portugal</option>
<option value="es">Espanha</option>
<option value="us" selected="">Estados Unidos</option>
</select>
<p class="help-block">Atualmente o seu País selecionado é: <span class="text-light"><img src="/images/countries/us.gif" /> <strong>Estados Unidos</strong></span></p>
<?php } ?>
</div>
<button onclick="location.href='<?php echo $Holo['url']; ?>/';" class="btn btn-danger">Cancelar</button>
<button type="submit" name="account" class="btn btn-success">Confirmar mudança de Senha »</button>
</div>
<?php  } ?>
</form>
</div>

<div class="col-md-4">
<div class="content">
<div class="title">Ajustes da Conta</div>
<br>
<ul>
<li><a href="/account/correo">Ajustes de e-mail</a></li>
<li><a href="/account/contra">Mudar sua senha</a></li>
<li><a href="/account/perfil">Configurações do perfil</a></li>
</ul>
</div>
<div class="content">
<div class="title">Dicas de Segurança</div>
<p>Nós da Equipe do <?php echo $Holo['name']; ?> preservamos a sua identidade dentro e fora do <?php echo $Holo['name']; ?> Hotel.</p>
<img src="/images/site/habbos_pod.png" style="float: right;">
<p>Aqui vão importantes dicas:</p>
<ul>
<li>Nunca passe sua senha</li>
<li>Nunca informe seu e-mail</li>
<li>Não use códigos nesse site</li>
<li>Nunca pediremos seus dados</li>
</ul>
<p></p>
</div>
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