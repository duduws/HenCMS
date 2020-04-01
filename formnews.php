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
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank < 5");
while($newuse = mysql_fetch_assoc($newuser)){ 
header("Location: /error"); die();?><?php } ?>
<div id="page">
<div id="dynamic">
<div id="main-wrapper">
<div class="container">
<div class="row content-box">

<div class="col-md-8" style="height: auto !important; min-height: 0px !important;">
<div class="article-header">
<h3 style="margin: 0;"><?php echo $noticia3; ?></h3>
<div class="article-info">Públicada por <a href="/home/<?php echo $noticia5; ?>" style="color: white; font-weight: bold;"><?php echo $noticia5; ?></a> a <?php echo GetLast($noticia6); ?>.</div>
</div>
<div class="article-banner" style="background: url(<?php echo $noticia2; ?>) center;"></div>
<div class="content article-content">
<div class="article-body">
<?php $news = mysql_query("SELECT * FROM cms_news_form WHERE news_id = '" . $noticia8 . "' ORDER BY id DESC");
while($new = mysql_fetch_assoc($news)){ 

$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE id = '".$new['user_id']."'"));
?><p><br><h6><?php echo $authorinfo['username'] ?> enviou:</h6><input name="urlresultado" value="<?php echo mysql_real_escape_string($new['urlresultado']); ?>" size="98" type="text" disabled /></p><hr>
<?php } ?>
</div>
</div>
</div>

<div class="col-md-4">
<div class="content">
<p><a class="btn btn-primary btn-sm" href="/news/<?php echo $noticia8; ?>" style="margin-top: 10px;">Clique aqui para Sair desta página »</a></p>
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