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

if($_GET['action'] == 'logout') {
    session_destroy();
    header("Location: logout");
	exit;
}

if(MANTENIMIENTO == '1') 
{
    header("Location: mantenimiento");
	exit;
}

$_config['client'] = array(
	'host' 				 				=> 'localhost',
	'port' 				 				=> '30000',
	'client_starting' 		 		 	=> 'Por favor aguarde! O '.$Holo['name'].' está carregando...',
	'client_starting_revolving' 		=> 'Quando voc\u00EA menos esperar...terminaremos de carregar...\/Carregando mensagem divertida! Por favor espere.\/Voc\u00EA quer batatas fritas para acompanhar?\/Siga o pato amarelo.\/O tempo \u00E9 apenas uma ilus\u00E3o.\/J\u00E1 chegamos?!\/Eu gosto da sua camiseta.\/Olhe para um lado. Olhe para o outro. Pisque duas vezes. Pronto!\/N\u00E3o \u00E9 voc\u00EA, sou eu.\/Shhh! Estou tentando pensar aqui.\/Carregando o universo de pixels.',
	'external_variables' 			 	=> 'http://localhost/gamedata/external_variables.txt',
	'external_variables_override' 		=> 'http://localhost/gamedata/override/external_override_variables.txt',
	'external_flash_texts'  			=> 'http://localhost/gamedata/external_flash_texts_br.txt',
	'external_flash_texts_override' 	=> 'http://localhost/gamedata/override/external_flash_override_texts_br.txt',
	'productdata' 			 			=> 'http://localhost/gamedata/productdata_br.txt',
	'furnidata' 			 			=> 'http://localhost/gamedata/furnidatab.xml',	
	'external_figurepartlist' 			=> 'http://localhost/gamedata/figuredata.xml',	
	'avatareditor_promohabbos' 			=> 'http://localhost/gamedata/hotlooks.xml',	
	'flash_client_url' 	 				=> 'http://localhost/gordon/PRODUCTION-201904011212-888653470/',
	'habbo_swf' 		 				=> 'Habbo.swf'
);

$ticket = time().sha1(rand(10000,99999));

mysql_query("UPDATE users SET auth_ticket = '', auth_ticket = '".$ticket."', ip_current = '', ip_current = '".$ip."' WHERE id = '".$myrow['id']."'") or die(mysql_error());
	
$ticketsql = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."'") or die(mysql_error());
$ticketrow = mysql_fetch_assoc($ticketsql);
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
		<title><?php echo $Holo['name']; ?>: Hotel</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script type="text/javascript">var andSoItBegins = (new Date()).getTime();</script>
		<link rel="shortcut icon" href="<?php echo $Holo['url']; ?>/images/favicon.wulles.ico" type="image/vnd.microsoft.icon" />
		<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/css/client.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $Holo['url']; ?>/css/buttons.css" type="text/css">
        <script type="text/javascript" src="<?php echo $Holo['url']; ?>/js/swfobject.js"></script>
        <script type="text/javascript">
            var BaseUrl = "<?php echo $_config['client']['flash_client_url']; ?>";
            var flashvars =
            {
                "client.starting" : "<?php echo $_config['client']['client_starting']; ?>", 
				"client.starting.revolving":"<?php echo $_config['client']['client_starting_revolving']; ?>",
                "client.allow.cross.domain" : "1", 
                "client.notify.cross.domain" : "1", 
                "connection.info.host" : "<?php echo $_config['client']['host']; ?>", 
                "connection.info.port" : "<?php echo $_config['client']['port']; ?>", 
                "site.url" : "<?php echo $Holo['url']; ?>", 
                "url.prefix" : "<?php echo $Holo['url']; ?>", 
                "client.reload.url" : "<?php echo $Holo['url']; ?>/hotel", 
                "client.fatal.error.url" : "<?php echo $Holo['url']; ?>/disconnected", 
                "client.connection.failed.url" : "<?php echo $Holo['url']; ?>/disconnected", 
				"logout.url" : "<?php echo $Holo['url']; ?>/hotel?action=logout", 
				"logout.disconnect.url" : "<?php echo $Holo['url']; ?>/hotel?action=logout", 
                "external.variables.txt" : "<?php echo $_config['client']['external_variables']; ?>", 
                "external.texts.txt" : "<?php echo $_config['client']['external_flash_texts']; ?>", 
				"external.override.texts.txt" : "<?php echo $_config['client']['external_flash_texts_override']; ?>", 
				"external.override.variables.txt" : "<?php echo $_config['client']['external_variables_override']; ?>", 
                "productdata.load.url" : "<?php echo $_config['client']['productdata']; ?>", 
                "furnidata.load.url" : "<?php echo $_config['client']['furnidata']; ?>", 
				"external.figurepartlist.txt" : "<?php echo $_config['client']['external_figurepartlist']; ?>", 
				"use.sso.ticket" : "1", 
                "sso.ticket" : "<?php echo $ticketrow['auth_ticket']; ?>", 
                "processlog.enabled" : "0", 
                "flash.client.url" : BaseUrl, 
                "flash.client.origin" : "popup" 
            };
            var params =
            {
                "base" : "<?php echo $_config['client']['flash_client_url']; ?>",
                "allowScriptAccess" : "always",
                "menu" : "false"                
            };
            swfobject.embedSWF(BaseUrl + "<?php echo $_config['client']['habbo_swf']; ?>", "client", "100%", "100%", "11.0.0", "<?php echo $Holo['url']; ?>/web-gallery/swf/expressInstall.swf", flashvars, params, null, null);
		</script>
    </head>
	
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){

$('body').css('display', 'none');
$('body').fadeIn(3000);

});
</script>
	
    <body>
<?php $newuser = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND accept_rules = '0'");
while($newuse = mysql_fetch_assoc($newuser)){ 
header("Location: /way"); die();?><?php } ?>
        <div id="client">
        <habbo-client-error>
        <div class="client-error__background-frank">
        <span class="client-error__text-contents">
        <h1 class="client-error__title" translate="CLIENT_ERROR_TITLE">VOCÊ ESTÁ QUASE LÁ!</h1>
        <p translate="CLIENT_ERROR_FLASH"><b>Calma aí <?php echo $myrow['username']; ?>!</b><br><br>Você precisa ativar manualmente o Flash Player nas configurações do seu navegador antes de entrar no <?php echo $Holo['name']; ?> Hotel! Depois que o Flash estiver ativado, clique no botão Hotel e clique em "Executar Flash".</p>
        </span>
        <div class="client-error__hotel-button-div">
        <a target="_blank" rel="noopener noreferrer" class="hotel-button" href="https://www.adobe.com/go/getflashplayer"><span class="hotel-button__text" translate="NAVIGATION_HOTEL">Hotel</span></a>
        </div>
		</div>
		</habbo-client-error>
		</div>
	</body>
</html>