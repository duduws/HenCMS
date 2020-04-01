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
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Equipe</title>
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
<div class="col-md-8">
<div class="content">
<h3 style="margin-top: 0;">Gerênciamento geral</h3>
<div class="row" style="padding: 10px;">
<?php $ranks = mysql_query("SELECT * FROM users WHERE rank='6' ORDER BY id DESC");
while($rank = mysql_fetch_array($ranks)){ ?>
<div class="col-md-4" style="padding-right: 5px; padding-left: 5px;">
<div class="sl-item">
<div class="sl-avatar">
<div style="background: url(<?php echo $Holo['avatar'] . $rank['look']; ?>&amp;head_direction=3&amp;headonly=1) no-repeat center; width: 48px; height: 62px;"></div>
</div>
<div class="sl-info" style="margin-left: 56px;">
<strong>
<div class="user-style"><a href="/home/<?php echo $rank['username'] ?>"><span class="user-style <?php echo $rank['user_style']; ?>"><?php echo $rank['username']; ?></span></a></div>
</strong>
<div class="sl-title"><?php echo mysql_real_escape_string($rank['motto']); ?></div>
</div>
<div class="sl-extra" style="margin-left: 50px;">
<div class="sl-country" style="float: left; margin-left: 10px;">
<img src="/images/countries/<?php echo $rank['country'] ?>.gif"> </div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="content">
<h3 style="margin-top: 0;">Moderação</h3>
<div class="row" style="padding: 10px;">
<?php $ranks = mysql_query("SELECT * FROM users WHERE rank='5' ORDER BY id DESC");
while($rank = mysql_fetch_array($ranks)){ ?>
<div class="col-md-4" style="padding-right: 5px; padding-left: 5px;">
<div class="sl-item">
<div class="sl-avatar">
<div style="background: url(<?php echo $Holo['avatar'] . $rank['look']; ?>&amp;head_direction=3&amp;headonly=1) no-repeat center; width: 48px; height: 62px;"></div>
</div>
<div class="sl-info" style="margin-left: 56px;">
<strong>
<div class="user-style"><a href="/home/<?php echo $rank['username'] ?>"><span class="user-style <?php echo $rank['user_style']; ?>"><?php echo $rank['username']; ?></span></a></div>
</strong>
<div class="sl-title"><?php echo mysql_real_escape_string($rank['motto']); ?></div>
</div>
<div class="sl-extra" style="margin-left: 50px;">
<div class="sl-country" style="float: left; margin-left: 10px;">
<img src="/images/countries/<?php echo $rank['country'] ?>.gif"> </div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<div class="col-md-4">
<a href="/hotel"><div class="content daily-gift" style="padding: 20px; background: #69a95e; color: white; cursor: pointer;"><img src="/images/site/hoteljoin.png" style="float: right; margin-top: -5px;"> Entrar no <?php echo $Holo['name']; ?> Hotel » </div></a>
<div class="content">
<div class="title">Criadores</div>
<img src="/images/site/figure_globe.png" style="float: right;">
<p>Primeiramente conheça realmente quem está por trás de todos os fios do <?php echo $Holo['name'] ?> Hotel.</p>
<p></p><ul>
<?php $ranks = mysql_query("SELECT * FROM users WHERE rank='7' ORDER BY id DESC");
while($rank = mysql_fetch_array($ranks)){ ?>
<li><a href="/home/<?php echo $rank['username'] ?>"><span class="user-style <?php echo $rank['user_style']; ?>"><?php echo $rank['username']; ?></span></a> <i>(<?php echo $rank['real_name'] ?>)</i> <img src="/images/countries/<?php echo $rank['country'] ?>.gif"></li>
<?php } ?>
</ul><p></p>
</div>
<div class="content">
<div class="title">Conheça a Equipe</div>
<img src="/images/site/superhero.gif" style="float: right;">
<p><?php echo $Holo['name'] ?> Hotel não seria nada sem as pessoas presentes nesta página.</p>
<p>Aqui você pode descobrir quem está por trás de tudo e também concorrer a uma vaga na equipe.</p>
</div>
<div class="content" style="padding-top: 10px;">
<div class="title">Conectados agora</div>
<?php $ranks = mysql_query("SELECT * FROM users WHERE rank > 5 AND online='1' ORDER BY id DESC");
while($rank = mysql_fetch_array($ranks)){ ?>
<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url(<?php echo $Holo['avatar'] . $rank['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/<?php echo $rank['username']; ?>"><span class="user-style <?php echo $rank['user_style']; ?>"><?php echo $rank['username']; ?></span></a>
</div>
</div>
<?php } ?>
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