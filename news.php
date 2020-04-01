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

if(isset($_GET['url'])) 
{ 
    if(!empty($_GET['url']))
    { 
        $id_noticia = (int) mysql_real_escape_string($_GET['url']); 
        $query_noticias = mysql_query("SELECT * FROM cms_news WHERE id = '".$id_noticia."' LIMIT 1");
        if(mysql_num_rows($query_noticias) > 0)
        { 
            $columna = mysql_fetch_assoc($query_noticias);
			$user_n = mysql_fetch_assoc(mysql_query("SELECT id,username,look,user_style FROM users WHERE username = '". $columna['author'] ."'"));
			$noticia = '' . $columna['longstory'] . '';
			$noticia2 = '' . $columna['image'] . '';
			$noticia3 = '' . $columna['title'] . '';
			$noticia4 = '' . $columna['shortstory'] . '';
			$noticia5 = '' . $columna['author'] . '';
			$noticia6 = '' . $columna['date'] . '';
			$noticia7 = '<div id="header" style="background-image: url(' . $columna['image'] . ');">';
			$noticia8 = '' . $columna['id'] . '';
			
		} 
        else 
        { 
            header("Location: /me");
            exit;
        } 
    } 
    else 
    { 
        header("Location: /me");
        exit;
    } 
} 
else
{ 
        header("Location: /me");
        exit;  
}

if(isset($_POST['resultado']))
{
	$urlresultado = mysql_real_escape_string($_POST['urlresultado']);

    mysql_query("INSERT INTO cms_news_form SET user_id = '". $myrow['id'] ."', news_id = '". $noticia8 ."', urlresultado = '". $urlresultado ."', date = '". time() . "'");
    $aok = 'Formulário enviado com sucesso.';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: <?php echo $noticia3; ?></title>
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

<div class="col-md-8" style="height: auto !important; min-height: 0px !important;">
<div class="article-header">
<div style="float: right;">
<a class="twitter-share-button" data-size="large" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $noticia3; ?> %23<?php echo $noticia8; ?>! Leia mais em: <?php echo $Holo['url']; ?>/news/<?php echo $noticia8; ?>" style="margin-top: 10px; color: white;"><i class="fa fa-twitter" aria-hidden="true"></i> Compartilhar no Twitter</a>
</div>
<h3 style="margin: 0;"><?php echo $noticia3; ?></h3>
<div class="article-info">Públicada por <a href="/home/<?php echo $noticia5; ?>" style="color: white; font-weight: bold;"><?php echo $noticia5; ?></a> a <?php echo GetLast($noticia6); ?>.</div>
</div>
<div class="article-banner" style="background: url(<?php echo $noticia2; ?>) center;"></div>
<div class="content article-content">
<div class="article-body"><p><?php echo $noticia; ?></p>
<?php if($columna['active_form'] == 1){ ?>
<br>
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
<div class="interactions" style="text-align: center;">
<form id="resultado" method="post">
<span style="text-align: center;"></span>
<span style="text-align: center; color: rgb(50,153,204);">Envie seu Resultado: <input name="urlresultado" required="" size="25" type="text"/></span>
<span style="text-align: center;"></span>
<input class="btn btn-success" type="submit" name="resultado" value="Enviar">
</form>
</div>
<?php } ?>
</div>
</div>
</div>

<div class="col-md-4">
<?php $isadmin = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank > 5");
while($isadm = mysql_fetch_assoc($isadmin)){ ?>
<div class="content">
<center>
<a class="btn btn-danger btn-sm" href="/formnews/<?php echo $noticia8; ?>" style="margin-top: 10px;">STAFF - Abrir formulário desta notícia</a></p>
</center>
</div>
<?php } ?>
<div class="content">
<div class="title">Outras de <a href="/home/<?php echo $noticia5; ?>"><?php echo $noticia5; ?></a></div>
<div class="feed-articles">
<?php $news = mysql_query("SELECT * FROM cms_news WHERE author = '" . $noticia5 . "' ORDER BY rand() LIMIT 5");
while($new = mysql_fetch_assoc($news)){ ?>
<a href="/news/<?php echo $new['id'] ?>">
<div class="fh-article">
<div class="fh-thumbnail" style="background: url(<?php echo $new['image'] ?>) center;"></div>
<div class="fh-content">
<div class="fh-title"><?php echo mb_strimwidth($new['title'], 0, 30, "..."); ?></div>
<div class="fh-story"><?php echo mb_strimwidth($new['shortstory'], 0, 30, "..."); ?></div>
<div class="fh-timestamp" style="font-size: 12px; margin-top: 5px;"><i class="fa fa-clock-o"></i> <?php echo GetLast($new['date']); ?>. </div>
</div>
</div>
</a>
<?php } ?>
</div>
</div>
<div class="content">
<p>Esta procurando por outras Notícia? Confira a nossa página de Notícias.<br><br>
<a class="btn btn-primary btn-sm" href="/articles" style="margin-top: 10px;">Ver outras Notícias »</a></p>
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