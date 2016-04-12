<?php 
	require 'includes/form.php'
?>

<section>
	<form action="#" method="post">
		<div class="main-input"> 
			<label for="user_q">entrez le nom d'un film ou d'une ville</label>
			<input type="text" name="user_q" id="user_q" value="<?= $user_q ?>" >
		</div>
	</form>
</section>