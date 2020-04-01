<?php $finished = mysql_query("SELECT * FROM users WHERE id = '".$myrow['id']."' AND country = 'world'");
while($finish = mysql_fetch_assoc($finished)){ ?>
<div class="ui-pnotify " aria-live="assertive" style="width: 300px; opacity: 1; display: block; overflow: visible; right: 25px; top: 65px;">
<div class="alert ui-pnotify-container alert-info ui-pnotify-shadow" role="alert" style="min-height: 16px; overflow: hidden;">
<div class="ui-pnotify-icon"><span class="glyphicon glyphicon-envelope"></span></div>
<h4 class="ui-pnotify-title">Calma <?php echo $myrow['username']; ?>.</h4>
<div class="ui-pnotify-text">Termine de Configurar a sua Conta!<br><a href="/account/perfil">Clique aqui e termine a sua configuração</a>.</div>
</div>
</div>
<?php } ?>