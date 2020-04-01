<?php require_once("inc/core.god.php"); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?> Hotel</title>
<meta http-equiv="refresh" content="60">
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

<div id="page">
<div id="dynamic">
<div id="floater">
<div id="header">
<a href="/home"><div class="main logo"></div></a> <div class="container">
<div id="header-left">
<div id="nav" class="nav-responsive-hidden">
<ul>
<li><a href="/index"><img src="/images/icons/home_icon.gif" class="nav-icon"> <span>Início</span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div id="banner">
<div class="banner-dynamic banner-clouds" style="opacity: 0.6;"></div>
</div>
<div id="main-wrapper">
<div class="container">
<style type="text/css">
#banner{
    background: url(/images/site/creations_banner.png) right no-repeat;
    background-color: #a3c7df;
}
body{
    background: url(/images/site/tiled_bg.png);
}
@font-face {
    font-family: volter;
    src: url(/fonts/volter-goldfish-bold.ttf);
}
.infostand-username{
    font-family: 'volter';
    color: white;
    position: absolute;
    top: 8px;
    left: 12px;
    font-size: 9px;
}
.banner-dynamic{
    display: none;
}
</style>

<div class="row content-box">
<div class="col-sm-8">
<div class="banner-header" style="background: url(/images/site/creations_header.png); color: white; padding: 20px;">
<div class="row">
<div class="col-sm-8">
<div class="bh-title" style="font-size: 22px;">Estamos em Manutenção.</div>
<div class="bh-desc">Algo deu errado e tivemos que fechar o Hotel para realizar Ajustes.</div>
</div>
</div>
</div>
<div style="background: white; margin-bottom: 10px; box-shadow: 0 2px 0 0 rgba(0, 0, 0, 0.17), inset 0 0 0 0px rgba(0, 0, 0, 0.23);">
<div class="content">
<p>Voltaremos em breve.<br><br>Motivo da manutenção: <b><?php echo $mantenimientoo['motivo']; ?></b>.</p>
</div>
</div>
</div>
<div class="col-sm-4">
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
</div>

</div>
</div>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>