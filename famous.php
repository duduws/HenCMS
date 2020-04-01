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

<div class="col-sm-9">
<div class="medal-madness-banner">
<div class="row">
<div class="col-md-8">
<div class="medal-madness-podium">

<?php
$getRespects = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 4 ORDER BY users_settings.respects_received DESC LIMIT 3");
while($respectStats = mysql_fetch_array($getRespects)) {
echo '<div class="avatar img" title="'.$respectStats['username'].' com '.$respectStats['respects_received'].' Respeitos" style="background: url('.$Holo['avatar'] . $respectStats['look'].'&amp;direction=3&amp;head_direction=3&amp;gesture=sml);"></div>';
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
<div style="font-size: 20px; margin-bottom: 10px; color: #337ab7; border-bottom: 1px solid #c3c3c3; padding-bottom: 5px;">Os mais Espertos</div>
<div class="row">
<div class="col-md-4">
<div class="content">
<div class="title">Com mais Respeitos</div>

<?php
$getRespects = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 4 ORDER BY users_settings.respects_received DESC LIMIT 6");
while($respectStats = mysql_fetch_array($getRespects)) {
echo '<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url('.$Holo['avatar'] . $respectStats['look'].'&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;">'.$respectStats['respects_received'].'</span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/'.$respectStats['username'].'"><span class="user-style '.$respectStats['user_style'].'">'.$respectStats['username'].'</span></a>
</div>
</div>';
}
?>

</div>
</div>
<div class="col-md-4">
<div class="content">
<div class="title">Mais Conquistas</div>

<?php
$getScore = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 4 ORDER BY users_settings.achievement_score DESC LIMIT 6");
while($scoreStats = mysql_fetch_array($getScore)) {
echo '<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url('.$Holo['avatar'] . $scoreStats['look'].'&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;">'.$scoreStats['achievement_score'].'</span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/'.$scoreStats['username'].'"><span class="user-style '.$scoreStats['user_style'].'">'.$scoreStats['username'].'</span></a>
</div>
</div>';
}
?>

</div>
</div>
<div class="col-md-4">
<div class="content">
<div class="title">Maior tempo Online</div>

<?php
$getTime = mysql_query("SELECT * FROM users INNER JOIN users_settings ON users.id=users_settings.user_id WHERE users.rank < 4 ORDER BY users_settings.online_time DESC LIMIT 6");
$time = 3600*24; // 60*60*24
while($TimeStats = mysql_fetch_array($getTime)) {
echo '<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url('.$Holo['avatar'] . $TimeStats['look'].'&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;">' . date('j \H\o\r\a\s\ ', $TimeStats['online_time']) . '</span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/'.$TimeStats['username'].'"><span class="user-style '.$TimeStats['user_style'].'">'.$TimeStats['username'].'</span></a>
</div>
</div>';
}
?>

</div>
</div>
</div>

<div style="font-size: 20px; margin-bottom: 10px; color: #337ab7; border-bottom: 1px solid #c3c3c3; padding-bottom: 5px;">Os mais Ricos</div>
<div class="row">
<div class="col-md-4">
<div class="content">
<div class="title">Ricos de Moedas</div>
<?php $users = mysql_query("SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 6");
while($user = mysql_fetch_array($users)){ ?>
<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url(<?php echo $Holo['avatar'] . $user['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;"><?php echo $user['credits']; ?></span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/<?php echo $user['username']; ?>"><span class="user-style <?php echo $user['user_style']; ?>"><?php echo $user['username']; ?></span></a>
</div>
</div>
<?php } ?>
</div>
</div>
<div class="col-md-4">
<div class="content">
<div class="title">Ricos de Duckets</div>

<?php
$getDuckets = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 6");
while($ducketsStats = mysql_fetch_array($getDuckets)) {
echo '<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url('.$Holo['avatar'] . $ducketsStats['look'].'&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;">'.$ducketsStats['amount'].'</span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/'.$ducketsStats['username'].'"><span class="user-style '.$ducketsStats['user_style'].'">'.$ducketsStats['username'].'</span></a>
</div>
</div>';
}
?>

</div>
</div>
<div class="col-md-4">
<div class="content">
<div class="title">Ricos de Diamantes</div>

<?php
$getDaimands = mysql_query("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 6");
while($daimands = mysql_fetch_array($getDaimands)) {
echo '<div class="activity-item" style="padding-left: 5px; padding-bottom: 5px;">
<div style="float: left;">
<div style="background: url('.$Holo['avatar'] . $daimands['look'].'&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #525050; margin-top: 6px;">'.$daimands['amount'].'</span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/'.$daimands['username'].'"><span class="user-style '.$daimands['user_style'].'">'.$daimands['username'].'</span></a>
</div>
</div>';
}
?>

</div>
</div>
</div>

</div>

<div class="col-sm-3">
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
<div class="content" style="background: #525050; color: white; margin-top: 10px;">
<div class="title">Eventos Ganhos</div><br>
<?php $getPremiar = mysql_query("SELECT * FROM users WHERE rank < 4 ORDER BY premiar DESC LIMIT 10");
while($premiar = mysql_fetch_array($getPremiar)){ ?>
<div class="list-item adaptive">
<div style="float: left;">
<div style="background: url(<?php echo $Holo['avatar'] . $premiar['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #FFFFFF; margin-top: 6px;"><?php echo $premiar['premiar']; ?></span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/<?php echo $premiar['username']; ?>"><span class="user-style <?php echo $premiar['user_style']; ?>"><?php echo $premiar['username']; ?></span></font></a>
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