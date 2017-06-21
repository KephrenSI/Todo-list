<header class="wrapper grid">
    <?php //include('_connected.php'); ?>
    <?php if(!isset($_SESSION['user'])) : ?>
		<div id="branding" class=""><p>BONJOUR!</p></div>
	<?php else: ?>
		<div id="branding" class=""><p>Connecté en tant que <?php echo $_SESSION['user']->name; ?></p></div>
	    <div class="ta-right"><a href="index.php?a=getLogout&r=auth">Déconnexion</a></div>
	<?php endif; ?>
</header>