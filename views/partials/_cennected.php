<?php if(!isset($_SESSION['user'])) : ?>
	<div id="branding" class=""><p>BONJOUR!</p></div>
<?php else: ?>
	<div id="branding" class=""><a href="index.php">Todolist</a></div>
    <div class="ta-right"><a href="index.php?a=getLogout&r=auth">Déconnexion</a></div>
<?php endif; ?>