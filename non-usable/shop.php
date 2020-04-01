<?php require_once("inc/core.god.php");
require_once("inc/news_headlines.php");

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

if(isset($_POST['userstyle']))
{
    $CTR = filtro($_POST['userstyle']);

    mysql_query("UPDATE users SET user_style = '". $CTR ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Você alterou a cor do seu nome com sucesso.<META http-equiv="refresh" content="3;URL=/shop">';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Loja</title>
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
<li><a href="/feed"><img src="/images/icons/feed_icon.gif" class="nav-icon"> <span>Social</span></a></li>
<li><a href="/shop"><img src="/images/icons/shop_icon.gif" class="nav-icon"> <span>Loja</span></a></li>
<li><a href="/articles"><img src="/images/icons/news_icon.gif" class="nav-icon"> <span>Notícias</span></a></li>
<li><a href="/team"><img src="/images/icons/blog.gif" class="nav-icon"> <span>Equipe</span></a></li>
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
<div class="content">
<h3 style="margin-top: 0; margin-bottom: 20px;">Sua Carteira</h3>
<div class="row">
<div class="col-md-4"><span class="user-icon credits"></span> <strong>Moedas:</strong> <?php echo $myrow['credits']; ?></div>
<?php $duckets = mysql_query("SELECT * FROM users_currency WHERE type = '0' AND user_id = '".$myrow['id']."' LIMIT 1");
while($ducket = mysql_fetch_array($duckets)){ ?>
<div class="col-md-4"><span class="user-icon duckets"></span> <strong>Duckets:</strong> <?php echo $ducket['amount'] ?></div>
<?php } ?>
<?php $diamonds = mysql_query("SELECT * FROM users_currency WHERE type = '5' AND user_id = '".$myrow['id']."' LIMIT 1");
while($diamond = mysql_fetch_array($diamonds)){ ?>
<div class="col-md-4"><span class="user-icon diamonds"></span> <strong>Diamantes:</strong> <?php echo $diamond['amount'] ?></div>
<?php } ?>
</div>
</div>

<div class="content">
<p><center>Todas as modificações nesta página são válidas apenas para o <b>Site</b> inteiro, e para nossa página <b>Social</b>!<br>Nenhum dos efeitos usados aqui são usados dentro do jogo.</center></p>
</div>

<div class="content shop-content">
<div class="shop-category">
    <div class="banner-header" style="background: #47ADEC; color: white; padding: 20px;">
        <div class="bh-title" style="font-size: 22px;">Estilo da sua Cabeça</div>
    </div>
    <div class="row" style="padding: 10px;">
        <div style="padding: 5px; margin-bottom: 10px;">Personalize o seu Rosto e chame mais atenção em nossa <a href="/feed">Rede Social</a>.</div>
        <div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
            <div class="s-item" style="height: 180px;">
                <div>
                    <div class="si-title"><strong>Nave Espacial</strong></div>
                    <div class="si-desc nano has-scrollbar" style="height: 75px;">
                            <div class="shop-avatar">
                                <div class="user-avatar ufo" style="margin-top: 20px;"></div>
                                <div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=3&amp;headonly=1) center no-repeat;height: 44px;width: 36px;margin-top: -68px;margin-left: 5px;position: relative;z-index: 2;"></div>
                                <div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=3&amp;size=s) center no-repeat; height: 44px; width: 36px; margin-top: -27px; margin-left: 5px; position: relative; z-index: 1;"></div>
                            </div>
                        <div class="nano-pane" style="display: none;">
                            <div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div>
                        </div>
                    </div>
                    <div class="si-price">Preço: <strong>15 <font color="#05759E">Diamantes</font></strong></div>
                </div>
                <div class="si-purchase">
                    <form method="post" action="/shop" class="web-form" style="display: inline-block;">
                        <input type="hidden" name="item-id" id="item-id" value="28">
                        <input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="28" value="Utilizar">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
            <div class="s-item" style="height: 180px;">
                <div>
                     <div class="si-title"><strong>Dia Chuvoso</strong></div>
                    <div class="si-desc nano has-scrollbar" style="height: 75px;">
                            <div class="shop-avatar" style="height: 70px; position: relative; float: none;">
                                <div class="user-avatar rain"></div>
                                <div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;gesture=agr) no-repeat center; width: 48px; height: 62px; position: absolute; bottom: -10px;"></div>
                            </div>
                    </div>
                    <div class="si-price">Preço: <strong>10 <font color="#05759E">Diamantes</font></strong></div>
                </div>
                <div class="si-purchase">
                    <form method="post" action="/shop" class="web-form" style="display: inline-block;">
                        <input type="hidden" name="item-id" id="item-id" value="41">
                        <input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="41" value="Utilizar">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
            <div class="s-item" style="height: 180px;">
                <div>
                     <div class="si-title"><strong>Torta na Cara</strong></div>
                    <div class="si-desc nano has-scrollbar" style="height: 75px;">
                        <div class="nano-content" tabindex="0" style="right: -17px;">
                            <div class="shop-avatar" style="position: relative; height: 60px;">
                                <div class="user-avatar pieface"></div>
                                <div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=2&amp;headonly=1) no-repeat center; width: 48px; height: 62px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="si-price">Preço: <strong>5 <font color="#05759E">Diamantes</font></strong></div>
                </div>
                <div class="si-purchase">
                    <form method="post" action="/shop" class="web-form" style="display: inline-block;">
                        <input type="hidden" name="item-id" id="item-id" value="75">
                        <input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="75" value="Utilizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-category">
<div class="banner-header" style="background: #47ADEC; color: white; padding: 20px;">
<div class="bh-title" style="font-size: 22px;">A cor do seu Nome</div>
</div>
<div class="row" style="padding: 10px;">
<div style="padding: 5px; margin-bottom: 10px;">Purchase username colours with your bites points!</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Orange &amp; blue username"><strong><span class="user-style orangeblue">Orange &amp; blue username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
Borange.<br>
Live preview: <span class="user-style orangeblue">-Foum</span> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>50 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="15">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="15" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="15">Gift</div>
</div>
</div>
</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Gold username"><strong><span class="user-style gold">Gold username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
Go for gold!<br>
Live preview: <span class="user-style gold">-Foum</span> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>50 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="2">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="2" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="2">Gift</div>
</div>
</div>
</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Pink username"><strong><span class="user-style pink">Pink username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
Real men wear pink.<br>
Live preview: <span class="user-style pink">-Foum</span> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>20 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="1">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="1" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="1">Gift</div>
</div>
</div>
</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Purple username"><strong><span class="user-style purple">Purple username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
So much purple!<br>
Live preview: <span class="user-style purple">-Foum</span> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>10 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="3">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="3" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="3">Gift</div>
</div>
</div>
</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Unicorn username"><strong><span class="user-style unicorn">Unicorn username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
Unicorns are real they're just fat, grey, and called rhinos.<br>Live preview: <span class="user-style unicorn">-Foum</span><br>Created by <a href="/user/Seth" target="_blank">Seth</a> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>150 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="235">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="235" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="235">Gift</div>
</div>
</div>
</div>
<div class="col-md-4" style="padding-right: 5px;padding-left: 5px;">
<div class="s-item" style="height: 180px;">
<div>
<div class="si-title" data-toggle="tooltip" title="" data-original-title="Seaweed username"><strong><span class="user-style seaweed">Seaweed username</span></strong></div>
<div class="si-desc nano has-scrollbar" style="height: 75px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
Tastes best on sushi!<br>Live preview: <span class="user-style seaweed">-Foum</span><br>Created by <a href="/user/Seth" target="_blank">Seth</a> </div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 61px; transform: translate(0px, 0px);"></div></div></div>
<div class="si-price">Price: <strong>50 Bites Points</strong></div>
</div>
<div class="si-purchase">
<form method="post" action="/shop" class="web-form" style="display: inline-block;">
<input type="hidden" name="item-id" id="item-id" value="270">
<input type="submit" class="btn btn-success btn-xs shop-purchase" data-id="270" value="Purchase">
</form>
<div class="shop-gift btn btn-danger btn-xs" data-id="270">Gift</div>
</div>
</div>
</div>
</div>
</div>

</div>

</div>

<div class="col-md-4">
<div style="height: 150px; position: relative;">
<div style="width: 100%; height: 150px; background: url(/images/site/bg_blue.gif);">
<div style="background: url(/images/site/feed_stack.gif); height: 120px; width: 146px; position: absolute; bottom: -0px; right: 0px;"></div>
<div class="nano">
<div class="nano-content" style="padding: 10px;">
<?php $feedlikes = mysql_query("SELECT * FROM users_likes ORDER BY id DESC LIMIT 15");
while($feedlike = mysql_fetch_array($feedlikes)){
	
$userinfos = mysql_fetch_assoc($userinfos = mysql_query("SELECT * FROM users WHERE id = '".$feedlike['user_id']."'"));	
?>
<div style="margin-bottom: 10px;">
<div style="background: white; font-size: 12px; border-radius: 20px; padding: 5px 10px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="<?php echo $Holo['avatar'] . $userinfos['look']; ?>&head_direction=3&headonly=1&size=s" style="margin: -5px; vertical-align: -6px;"> <strong><span class="user-style <?php echo $userinfos['user_style']; ?>"><?php echo $userinfos['username']; ?></span></strong> <?php if($feedlike['feed_id'] > 0) { echo 'curtiu uma <b>Publicação</b>.'; } else { echo 'curtiu uma <b>Foto</b>.'; } ?></div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<a href="/feed"><div style="margin-bottom: 10px; padding: 10px; color: white; font-size: 20px; text-transform: uppercase; background: #658a29f2;">Confira novas publicações</div></a>
<div class="content">
<div class="title">Uma Loja Diferente</div>
<p><br><b><font color="#7d0f19">Você paga o valor notificado a baixo do produto toda vez que for usar ele, sendo assim se alguma vez você já utilizou o mesmo e for voltar a usar novamente, será novamente cobrado o valor inteiro para realizar a atualização, seja da cor no seu nome até o estilo do seu personagem.</font></b></p>
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
</div>
</div>
</div>
<?php require_once("hen/notification.php"); ?>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

</body>
</html>