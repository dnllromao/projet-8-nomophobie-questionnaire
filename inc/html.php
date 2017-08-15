<?php 

	$questions = [
		'Je me sentirais mal à l’aise sans un accès constant à de l’information sur mon téléphone cellulaire.',
		'Je me sentirais agacé si je ne pouvais pas consulter de l’information sur mon téléphone quand bon me semble.',
		'Je me sentirais nerveux si je ne pouvais pas m’informer (actualité, météo, etc.) sur mon téléphone.',
		'Je me sentirais agacé si je ne pouvais pas utiliser mon téléphone ou ses fonctionnalités quand bon me semble.',
		'Manquer de batterie pour mon cellulaire me ferait peur.',
		'Si j’atteignais la limite de mon plan de données, je paniquerais.',
		'Si je n’avais pas de signal ou de connexion wifi, je vérifierais constamment mon téléphone pour voir si le signal revenait.',
		'Si je ne pouvais pas utiliser mon téléphone, j’aurais peur de rester pris quelque part.',
		'Si je ne pouvais pas vérifier mon téléphone pendant quelque temps, je sentirais le besoin de le faire.',
		'Je serais inquiet de ne pas pouvoir communiquer avec mes amis ou ma famille instantanément.',
		'Je serais inquiet de ne pas pouvoir être joint par mes amis ou ma famille.',
		'Je serais inquiet de ne pas pouvoir recevoir de messages texte ni d’appels.',
		'Je me sentirais anxieux de ne pas pouvoir garder le contact avec ma famille ou mes amis.',
		'Je serais inquiet de ne pas savoir si quelqu’un essaie de me rejoindre.',
		'Je me sentirais anxieux de savoir que ma connexion constante avec mes amis et ma famille est interrompue.',
		'Je serais inquiet d’être déconnecté de mon identité en ligne.',
		'Je serais mal à l’aise de ne pas pouvoir rester à jour dans l’actualité de mes réseaux sociaux.',
		'Je serais mal à l’aise de ne pas pouvoir recevoir les notifications de mes connexions et de mes réseaux en ligne.',
		'Je me sentirais anxieux de ne pas pouvoir vérifier ma boîte de courriels.',
		'Je me sentirais bizarre parce que je ne saurais pas quoi faire.'
	];

	$score = 0;

	if(!empty($_POST)) {

		foreach ($_POST as $key => $value) {
			
			$score += $value;
			
		}
	}

	function print_quiz () {
		global $questions, $score;
		ob_start(); 
		?>
			<form action="#" method="post">
				<ol>
				<?php foreach ($questions as $key => $value) { ?>

						<?php if ($key + 1 == 10) : ?>
							<p><b>Si je n’avais pas mon téléphone avec moi :</b></p>
						<?php endif; ?>

						<li>
							<fieldset>
								<legend><?= $value ?></legend>
								<?php for ($i=1; $i <= 7 ; $i++) { ?>
									<input type="radio" name="<?= $key + 1; ?>" value="<?= $i; ?>" id="<?= ($key + 1); ?>.<?= $i; ?>" required>
									<label for="<?= ($key + 1); ?>.<?= $i; ?>"><?= $i; ?></label>
								<?php } ?>
							</fieldset>
						</li>
						<?php
					}
				?>
				</ol>

				<p>Alors, qu’est-ce que ça donne?</p>
				<p>
					<input type="submit" class="button" value="Submit">
					<?php if($score > 0) : ?>
						<span><b>Total: <?= $score; ?></b></span>
					<?php endif; ?>
				</p>
			</form>
		<?php

	    echo ob_get_clean(); 

	}

	
