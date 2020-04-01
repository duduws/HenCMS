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

$do = (!empty($_GET['do'])) ? ($_GET['do']) : '';
$key = (!empty($_GET['key'])) ? (int) $_GET['key'] : '';

if($do == 'LikePhotoItem' && !empty($key)) {
  mysql_query("INSERT INTO users_likes SET user_id = '". $myrow['id'] ."', photo_id = '".$key."', feed_id = '0'") or die(mysql_error());
  mysql_query("UPDATE camera_web SET likes = likes + 1 WHERE id = '".$key."'") or die(mysql_error());
  echo '<META http-equiv="refresh" content="0;URL=/photos"> ';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Fotos</title>
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

<div class="col-md-9" role="toolbar">

<?php $photos = mysql_query("SELECT * FROM camera_web ORDER BY id DESC LIMIT 18");
while($photo = mysql_fetch_array($photos)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysql_fetch_assoc($roominfo = mysql_query("SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
<div class="col-md-4">
	<div class="creation" style="height: 310px;">
		<a type="button" data-toggle="modal" data-target="#exampleModal<?php echo $photo['id'] ?>" style="cursor: pointer;">
			<div class="creation-image room" style="background: url(<?php echo $photo['url'] ?>); background-position: center; background-repeat: no-repeat; background-color: black;">
				<div class="creation-reactions"><?php echo $photo['likes'] ?> <div style="font-size: 20px;">Curtidas</div></div>
			</div>
		</a>
		<div class="creation-info-box" style="position: relative;">
			<div type="button" data-toggle="modal" data-target="#exampleModal<?php echo $photo['id'] ?>" class="creation-quickview" style="background: url(/images/site/zoom.gif); height: 24px; width: 13px; position: absolute; top: 10px; right: 10px; cursor: pointer;"></div>
			<div class="creation-info">
				<small>Públicada por <div class="user-style"><a href="/home/<?php echo $authorinfo['username'] ?>"><span class="user-style <?php echo $authorinfo['user_style']; ?>"><b><?php echo $authorinfo['username']; ?></b></span></a></div></small>
			</div>
			<div class="cl-description">Públicada <?php echo GetLast($photo['timestamp']); ?> atrás.</div>
		</div>
	</div>
</div>
<?php } ?>

</div>

<div class="col-md-3">
<div class="content-header generic-purple">
<div class="content-header-title">Galeria</div>
<div class="content-header-desc">Imagina ter a foto mais curtida?</div>
</div>
<div class="content" style="padding-top: 10px;">
<img src="/images/achievements/ACH_CREATIONS_1.gif" style="float: right; margin-top: 20px;">
<p>Entre no Hotel, tire uma foto e públique.</p>
<p>Sua foto vai aparecer aqui e corre grandes riscos de se tornar a foto mais curtida de todo o <?php echo $Holo['name']; ?>, assim você acaba se tornando um <?php echo $Holo['name']; ?> Influencer.</p>
<a class="btn btn-success btn-block btn-md" href="/hotel"><img src="/images/site/hoteljoin.png" style="float: right; margin-top: -5px;"> Entrar no <?php echo $Holo['name']; ?> Hotel » </a>
</div>
<div class="content-header crane" style="min-height: 70px; padding: 0; margin-bottom: 10px; position: relative; overflow: hidden;">
<div class="content-header title"> Foto mais curtida</div>
<?php $photos = mysql_query("SELECT * FROM camera_web ORDER BY likes ASC LIMIT 1");
while($photo = mysql_fetch_array($photos)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE id = '".$photo['user_id']."'"));		
?>
<div style="background: url(<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&amp;gesture=sml); height: 90px; width: 64px; position: absolute; "></div>
<div style="color: white; margin-left: 65px; padding: 10px 10px 10px 0px;">
<div style="color: white; font-size: 20px;"><span class="user-style <?php echo $authorinfo['user_style']; ?>"><?php echo $authorinfo['username']; ?></span></div>
<div style="color: white; font-size: 12px;"><b><?php echo $photo['likes']; ?></b> Curtidas <img src="/images/icons/thumbs-up.gif"></div>
<div style="color: white; font-size: 12px;"><a href="/home/<?php echo $authorinfo['username']; ?>" style="color: white;">Clique aqui para visitar o perfil »</a></div>
</div>
<?php } ?>
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

<?php $photos = mysql_query("SELECT * FROM camera_web ORDER BY id DESC LIMIT 18");
while($photo = mysql_fetch_array($photos)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE id = '".$photo['user_id']."'"));	
$roominfo = mysql_fetch_assoc($roominfo = mysql_query("SELECT * FROM rooms WHERE id = '".$photo['room_id']."'"));	
?>
<div class="modal fade creation-quickview-modal in" id="exampleModal<?php echo $photo['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="creation-quickview-image" style="background: black;">
				<img src="<?php echo $photo['url'] ?>" class="img-responsive creation-canvas" style="background: black; max-height: 550px; padding: 10px;">
				</div>
				<div class="creation-quickview-info" style="background: white; padding: 10px;">
					<div class="creation-info">
						<small>Foto públicada por  <div class="user-style"><a href="/home/<?php echo $authorinfo['username'] ?>"><span class="user-style <?php echo $authorinfo['user_style']; ?>"><b><?php echo $authorinfo['username']; ?></b></span></a></div></small>
					</div>
					<div class="cl-title">Tirada no Quarto: <?php echo mysql_real_escape_string($roominfo['name']); ?></div>
					<div class="cl-description">Públicada <?php echo GetLast($photo['timestamp']); ?> atrás.</div>
				</div>
				
<?php $check = number_format(mysql_num_rows(mysql_query("SELECT * FROM users_likes WHERE user_id = '".$myrow['id']."' AND photo_id = '".$photo['id']."' LIMIT 1"))); 

if ($check > 0) 
{}
else
{
?>
				<a href="?do=LikePhotoItem&key=<?php echo $photo['id']; ?>">
				<div class="creation-quickview-more" style="height: 60px; background: #9ac699; padding: 20px; color: white;">
					<div class="creation-like-btn">
					<span class="creation-likes-count">Clique para Curtir</span>
					</div>
				</div>
				</a>
<?php } ?>
<?php $javotou = mysql_query("SELECT * FROM users_likes WHERE user_id = '".$myrow['id']."' AND photo_id = '".$photo['id']."' AND feed_id = '0' LIMIT 1");
while($javoto = mysql_fetch_array($javotou)){ ?>
				<div class="creation-quickview-more" style="height: 60px; background: #9ac699; padding: 20px; color: white;">
					<div class="creation-like-btn">
					<div class="creation-like-icon" style="margin-right: 5px;"></div>
					<span class="creation-likes-count"><?php echo $photo['likes'] ?> Curtidas</span>
					</div>
				</div>
<?php } ?>
				
			<div style="position: absolute; height: 60px; right: 0px; bottom: 0px; background: #93b792; color: white; padding: 20px; cursor: pointer;" data-dismiss="modal">Fechar</div>
		</div>
	</div>
</div>
<?php } ?>

<?php require_once("hen/notification.php"); ?>
<?php require_once("hen/footer.php"); ?>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>