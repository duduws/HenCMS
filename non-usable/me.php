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
<div style="font-size: 20px; margin-bottom: 10px; color: #337ab7; border-bottom: 1px solid #c3c3c3; padding-bottom: 5px;">
Últimas Notícias
<div style="float: right;"><a class="btn btn-primary btn-xs" href="/articles">Mais notícias</a></div>
</div>
<div class="row">
<?php $news = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 4");
while($new = mysql_fetch_array($news)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
<div class="col-md-6">
<a href="/news/<?php echo $new['id']; ?>">
<div style="position: relative; height: 100px; background: url(<?php echo $new['image']; ?>) center no-repeat, url(/images/site/tiled_bg.png) repeat;"></div>
<div style="position: relative; background: white; height: 100%; margin-bottom: 20px; box-shadow: 0 2px 0 0 rgba(0, 0, 0, 0.17), inset 0 0 0 0px rgba(0, 0, 0, 0.23); padding: 5px 10px 10px 10px;">
<div class="cl-title no-underline"><?php echo $new['title']; ?></div>
<div class="cl-description no-underline" style="margin-right: 25px;"> <?php echo mysql_real_escape_string($new['shortstory']); ?> </div>
<div style="background: url(<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px; position: absolute; bottom: 5px; right: 5px;" title="<?php echo $new['author']; ?>"></div>
</div>
</a>
</div>
<?php } ?>
</div>
<div class="content">
<a href="/shop" class="btn btn-primary btn-xs pull-right"><?php echo $Holo['name']; ?> Loja</a>
<h3 style="margin-top: 0; margin-bottom: 20px;">As minhas Estatísticas</h3>
<div class="row">
<div class="col-md-4"><span class="user-icon id"></span> <strong>ID:</strong> <?php echo $myrow['id']; ?></div>
<div class="col-md-4"><span class="user-icon credits"></span> <strong>Moedas:</strong> <?php echo $myrow['credits']; ?></div>
<?php $duckets = mysql_query("SELECT * FROM users_currency WHERE type = '0' AND user_id = '".$myrow['id']."' LIMIT 1");
while($ducket = mysql_fetch_array($duckets)){ ?>
<div class="col-md-4"><span class="user-icon duckets"></span> <strong>Duckets:</strong> <?php echo $ducket['amount'] ?></div>
<?php } ?>
<?php $diamonds = mysql_query("SELECT * FROM users_currency WHERE type = '5' AND user_id = '".$myrow['id']."' LIMIT 1");
while($diamond = mysql_fetch_array($diamonds)){ ?>
<div class="col-md-4"><span class="user-icon diamonds"></span> <strong>Diamantes:</strong> <?php echo $diamond['amount'] ?></div>
<?php } ?>
<?php $respects = mysql_query("SELECT * FROM users_settings WHERE user_id = '".$myrow['id']."' LIMIT 1");
while($respect = mysql_fetch_array($respects)){ ?>
<div class="col-md-4"><span class="user-icon respects"></span> <strong>Respeitos:</strong> <?php echo $respect['respects_received'] ?></div>
<?php } ?>
<?php $achievements = mysql_query("SELECT * FROM users_settings WHERE user_id = '".$myrow['id']."' LIMIT 1");
while($achievement = mysql_fetch_array($achievements)){ ?>
<div class="col-md-4"><span class="user-icon achievements"></span> <strong>Conquistas:</strong> <?php echo $achievement['achievement_score'] ?></div>
<?php } ?>
</div>
</div>
<div class="medal-madness-banner">
<div class="row">
<div class="col-md-8">
<div class="medal-madness-podium">
<?php
$getRespects = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 4 ORDER BY users_settings.respects_received DESC LIMIT 3");
while($respectStats = mysql_fetch_array($getRespects)) {
echo '<div class="avatar img" title="'.$respectStats['username'].'" style="background: url('.$Holo['avatar'] . $respectStats['look'].'&amp;direction=3&amp;head_direction=3&amp;gesture=sml);"></div>';
}
?>
</div>
</div>
<div class="col-md-4">
<div class="medal-listing">
<div class="medal-title">Mais Respeitados</div>
<div class="nano has-scrollbar" style="height: 100px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
<div style="padding: 15px;">
<span style="color: white;">Aqui estão as <b>três</b> pessoas mais respeitadas dentro do <?php echo $Holo['name']; ?> Hotel.</span>
</div>
</div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 85px; transform: translate(0px, 0px);"></div></div></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<a href="/hotel"><div class="content daily-gift" style="padding: 20px; background: #69a95e; color: white; cursor: pointer;"><img src="/images/site/hoteljoin.png" style="float: right; margin-top: -5px;"> Entrar no <?php echo $Holo['name']; ?> Hotel » </div></a>

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
<a href="/feed"><div style="margin-bottom: 10px; padding: 10px; color: white; font-size: 20px; text-transform: uppercase; background: #a20303;">Confira novas publicações</div></a>
<div class="content">
<div class="title"><span class="user-style <?php echo $myrow['user_style']; ?>"><?php echo $myrow['username']; ?></span>!</div>
<div style="float: right;width: 48px; height: 48px; margin: 5px;">
<div class="user-avatar ufo" style="margin-top: 20px;"></div><div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=3&amp;headonly=1) center no-repeat;height: 44px;width: 36px;margin-top: -68px;margin-left: 5px;position: relative;z-index: 2;"></div><div style="background: url(<?php echo $Holo['avatar'] . $myrow['look']; ?>&amp;head_direction=3&amp;size=s) center no-repeat; height: 44px; width: 36px; margin-top: -27px; margin-left: 5px; position: relative; z-index: 1;"></div>
</div>
<p>Você sabia disso?...</p>
<p>A gente te monitora quase o dia todo sempre que vemos você andando pelo Hotel, e assim dependente do seu comportamento, você pode concorrer prêmios, sendo de uma chance de trabalhar em nossa equipe, ou até mesmo super raros!</p>
<p>Chame seus amigos e divirta-se em grupo.</p>
</div>
<div class="content-header forum-latest">
<div class="content-header-title">Os novatos</div>
<div class="content-header-desc">Os <b>cinco</b> últimos registrados no <?php echo $Holo['name']; ?>.</a></div>
</div>
<div class="content" style="padding-top: 10px;">
<?php $users = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 5");
while($user = mysql_fetch_array($users)){ ?>
<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url(<?php echo $Holo['avatar'] . $user['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;"><?php echo GetLast($user['account_created']); ?></span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/<?php echo $user['username']; ?>"><span class="user-style <?php echo $user['user_style']; ?>"><?php echo $user['username']; ?></span></a>
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