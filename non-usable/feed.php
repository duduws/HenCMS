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

if($do == 'RemoveFeedItem' && !empty($key)) {
  mysql_query("DELETE FROM cms_feed WHERE author = '".$myrow['username']."' AND id = '".$key."'") or die(mysql_error());
  mysql_query("UPDATE users SET feed_posts = feed_posts - 1 WHERE id = '".$myrow['id']."'") or die(mysql_error());
  echo '<META http-equiv="refresh" content="0;URL=/feed">';
}

if($do == 'LikeFeedItem' && !empty($key)) {
  mysql_query("INSERT INTO users_likes SET user_id = '". $myrow['id'] ."', feed_id = '".$key."'") or die(mysql_error());
  mysql_query("UPDATE cms_feed SET likes = likes + 1 WHERE id = '".$key."'") or die(mysql_error());
  echo '<META http-equiv="refresh" content="0;URL=/feed">';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
<title><?php echo $Holo['name']; ?>: Social</title>
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

<?php $iamonlines = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND online = '0'");
while($iamonline = mysql_fetch_assoc($iamonlines)){ 
?>
<div class="feed-compose">
<?php 
if(isset($_POST['añadir']))
{ 
	$story = mysql_real_escape_string($_POST['story']);
    if(!empty($story))
    { 
        $query_Feed = mysql_query("INSERT INTO cms_feed SET story = '". filtro($story) ."', author = '". $myrow['username'] ."', date = '". time() . "'");
		mysql_query("UPDATE users SET credits = credits - 250 WHERE id = '".$myrow['id']."'");
		mysql_query("UPDATE users SET feed_posts = feed_posts + 1 WHERE id = '".$myrow['id']."'");
		echo '<META http-equiv="refresh" content="1;URL=/feed"> ';
  
        if($query_Feed) 
        { 
            echo '<div class="alert alert-success" role="alert">Parabéns! Você atualizou o seu Feed.</div>';
        } 
        else 
        { 
            echo '<div class="alert alert-danger" role="alert">Algo deu errado, tente novamente com maior atenção.</div>';

        } 
    } 
    else 
    { 
        echo '<div class="alert alert-danger" role="alert">Não deixe campos vazios.</div>';
    } 
} 
  
?>
<?php $iampoors = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND credits < 250");
while($iampoor = mysql_fetch_assoc($iampoors)){ 
?>
<center>Você não tem moedas suficientes para fazer uma Postagem.</center><br>
<?php } ?>
<?php $iampoors = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND credits > 250");
while($iampoor = mysql_fetch_assoc($iampoors)){ 
?>
<form action="" method="post">
<div class="input-group">
<textarea class="form-control mentions" id="compose-message" name="story" rows="1" placeholder="No que você está pensando, <?php echo $myrow['username']; ?>?" style="overflow: hidden; resize: none; height: 34px;" max="561" required></textarea>
<span class="input-group-btn">
<input type="submit" name="añadir" class="btn btn-primary" id="compose" value="Públicar">
</span>
</div>
</form>
<?php } ?>
<?php $iampoors = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND credits = '250'");
while($iampoor = mysql_fetch_assoc($iampoors)){ 
?>
<form action="" method="post">
<div class="input-group">
<textarea class="form-control mentions" id="compose-message" name="story" rows="1" placeholder="No que você está pensando, <?php echo $myrow['username']; ?>?" style="overflow: hidden; resize: none; height: 34px;" max="561" required></textarea>
<span class="input-group-btn">
<input type="submit" name="añadir" class="btn btn-primary" id="compose" value="Públicar">
</span>
</div>
</form>
<?php } ?>
</div>
<?php $iampoors = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND credits > 250");
while($iampoor = mysql_fetch_assoc($iampoors)){ 
?>
<div class="feed-filter" style="padding: 10px;">
<font color="#835a17">Cada postagem custa exatamente <b>250 Moedas</b>, e você atualmente tem: <b><?php echo $myrow['credits']; ?> Moedas</b>.</font>
</div>
<?php } ?>
<?php $iampoors = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND credits = '250'");
while($iampoor = mysql_fetch_assoc($iampoors)){ 
?>
<div class="feed-filter" style="padding: 10px;">
<font color="#835a17">Cada postagem custa exatamente <b>250 Moedas</b>, e você atualmente tem: <b><?php echo $myrow['credits']; ?> Moedas</b>.</font>
</div>
<?php } ?>
<?php } ?>
<?php $iamonlines = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND online = '1'");
while($iamonline = mysql_fetch_assoc($iamonlines)){ 
?>
<div class="alert alert-warning" role="alert" style="margin: 0;"><strong>Você está Conectado(a).</strong> Você só pode realizar postagens no Feed se você estiver desconectado(a), por favor, feche a Cliente e tente novamente.</div><br>
<?php } ?>

<div class="feeds">
<?php $feeds = mysql_query("SELECT * FROM cms_feed ORDER BY id DESC LIMIT 25");
while($feed = mysql_fetch_array($feeds)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$feed['author']."'"));	
?>
<div class="feed-item" <?php if($authorinfo['rank'] > 5) { echo 'style="background: #e3efe4;"'; } else { echo ''; } ?>>
	<div class="fi-avatar">
		<div style="background: url(<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&amp;head_direction=2&amp;headonly=1&amp;gesture=sml) no-repeat center; width: 48px; height: 62px;"></div>
	</div>
	<div class="fi-content">
		<div class="fc-user">
			<strong>
				<div class="user-style">
<?php $feedstaffs = mysql_query("SELECT * FROM users WHERE username = '".$feed['author']."' AND rank > 5");
while($feedstaff = mysql_fetch_array($feedstaffs)){
?><span class="user-style orange">STAFF</span>&nbsp;<?php } ?>
<a href="/home/<?php echo $feed['author']; ?>"><span class="user-style <?php echo $authorinfo['user_style']; ?>"><?php echo $feed['author']; ?></span></a>
				</div>
			</strong> - 
			<span><?php echo GetLast($feed['date']); ?>.</span>
		</div>
		<div class="fc-content"><?php echo mb_strimwidth($feed['story'], 0, 555, "..."); ?></div>
		<div class="fc-tools">
		
<?php $check = number_format(mysql_num_rows(mysql_query("SELECT * FROM users_likes WHERE user_id = '".$myrow['id']."' AND feed_id = '".$feed['id']."' LIMIT 1"))); 

if ($check > 0) 
{}
else
{
?>
			<span class="fc-react"><span class="likes-count"><?php echo $feed['likes']; ?></span></span>
			<a href="?do=LikeFeedItem&key=<?php echo $feed['id']; ?>" class="fc-react fc-like"><i class="fa fa-heart" style="color: #D67979;"></i></a>
<?php } ?>	
<?php $javotou = mysql_query("SELECT * FROM users_likes WHERE user_id = '".$myrow['id']."' AND feed_id = '".$feed['id']."' AND photo_id = '0' LIMIT 1");
while($javoto = mysql_fetch_array($javotou)){ ?>
			<span class="fc-react"><span class="likes-count"><font color="#337ab7"><b><?php echo $feed['likes']; ?></b></font></span></span>
			<i class="fa fa-heart" style="color: #D67979;"></i>
<?php } ?>

<?php $duckets = mysql_query("SELECT * FROM users WHERE username = '".$feed['author']."' LIMIT 1");
while($ducket = mysql_fetch_array($duckets)){ ?>
			<a href="?do=RemoveFeedItem&key=<?php echo $feed['id']; ?>" id="remove-feed-item-<?php echo $feed['id']; ?>" class="fc-delete"><i class="fa fa-trash" style="color: #7B7777;"></i></a>
<?php } ?>
		</div>
		
	</div>
</div>
<?php } ?>
</div>
</div>
</div>

<div class="col-md-4" role="toolbar">
<ul class="rslides">
<?php $news = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
while($new = mysql_fetch_array($news)){
	
$authorinfo = mysql_fetch_assoc($authorinfo = mysql_query("SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
<li>
<a href="/news/<?php echo $new['id'] ?>">
<div class="article-slider-banner" style="background: url(<?php echo $new['image'] ?>) center no-repeat;">
<div class="article-slider-header">ÚLTIMA NOTÍCIA</div>
</div>
<div class="article-slider-box">
<div class="article-slider-title"><?php echo mb_strimwidth($new['title'], 0, 30, "..."); ?></div>
<div class="article-slider-story"><?php echo mb_strimwidth($new['shortstory'], 0, 30, "..."); ?></div>
<div class="article-slider-timestamp" style="font-size: 12px; margin-top: 5px;"><i class="fa fa-clock-o"></i> <span class="timeago" title="2020-03-13 13:25:21"><?php echo GetLast($new['date']); ?></span> <span class="label label-success">NOVA</span></div>
</div>
</a>
</li>
<?php } ?>
</ul>
<a href="/hotel"><div class="content daily-gift" style="padding: 20px; background: #69a95e; color: white; cursor: pointer;"><img src="/images/site/hoteljoin.png" style="float: right; margin-top: -5px;"> Entrar no <?php echo $Holo['name']; ?> Hotel » </div></a>
<div class="content" style="background: #525050; color: white; margin-top: 10px;">
<div class="title">Com mais Postagens</div>
<div class="nano has-scrollbar" style="height: 200px;">
<div class="nano-content" tabindex="0" style="right: -17px;">
<?php $feedcounts = mysql_query("SELECT * FROM users WHERE feed_posts > 0 AND rank < 4 ORDER BY feed_posts DESC LIMIT 5");
while($feedcount = mysql_fetch_array($feedcounts)){ ?>
<div class="list-item adaptive">
<div style="float: left;">
<div style="background: url(<?php echo $Holo['avatar'] . $feedcount['look']; ?>&amp;head_direction=3&amp;headonly=1&amp;size=s); height: 30px; width: 27px;"></div>
</div>
<span style="float: right; font-style: italic; font-size: 10px; color: #FFFFFF; margin-top: 6px;"><?php echo $feedcount['feed_posts']; ?></span>
<div class="ai-title" style="height: 30px; padding: 3px;">
<a href="/home/<?php echo $feedcount['username']; ?>"><span class="user-style <?php echo $feedcount['user_style']; ?>"><?php echo $feedcount['username']; ?></span></font></a>
</div>
</div>
<?php } ?>
</div>
<div class="nano-pane" style="display: none;"><div class="nano-slider" style="height: 184px; transform: translate(0px, 0px);"></div></div></div>
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