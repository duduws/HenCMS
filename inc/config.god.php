<?php class Conexion {
	
public function MySQL() {
	
		$mysqld = array (
			'host'  =>  'localhost',
			'user'  =>  'root',
			'pass'  =>  '',
			'db'    =>  'morning'
			);

		mysql_connect($mysqld['host'], $mysqld['user'], $mysqld['pass']) or die(mysql_error());
		mysql_select_db($mysqld['db']) or die(mysql_error());
	}
}

Conexion::MySQL();

$Holo = array(
	'ip'           =>     '127.0.0.1',
	'url'          =>     'http://localhost',
	'client_url'   =>     'http://localhost/client',
	'panel'        =>     'housekeeping',
	'name'         =>     'Haddo',
    'mision'       =>     'HenCMS a Melhor.',
    'monedas'      =>     '1000',
	'maxrank'      =>     '7',
	'minhkr'       =>     '5',
	'gender'       =>     'M',
	'look'         =>     'hr-115-42.hd-195-19.ch-3030-82.lg-275-1408.fa-1201.ca-1804-64',
	'facebook'     =>     '',
	'twitter'      =>     '',
	'discordid'    =>     '',
	'cameraurl'    =>     'http://arcturus.pw/camera/Wulles/',
	'avatar'       =>     'https://www.habbo.com.br/habbo-imaging/avatarimage?figure=',
	'url_badges'   =>     'http://localhost/c_images/album1584/',
	'discordwid'   =>     '494878296010391553',
	'discordtheme' =>     'light',
	'recaptcha'    =>     '6Lf6ZZUUAAAAACUAysW1Q-ggfDqfn9-Bd68ISEbi');
	
?>