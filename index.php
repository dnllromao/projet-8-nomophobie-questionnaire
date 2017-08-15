
<?php include 'inc/html.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Nomophobie Questionaire</title>
	<!-- Compressed CSS -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.2/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" /> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.2/css/foundation.min.css" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="row medium-8 large-7 columns">
		<h1>Souffrez-vous de nomophobie?</h1>
		<p>Des chercheurs de l’Université de l’Iowa ont mis au point un test pour savoir si l’on souffre de nomophobie. C’est le résultat du mémoire de maîtrise de Caglar Yildirim qui vient d’être publié dans la revue Computers in Human Behavior.</p>
		<h2 class="h3">Qu’est-ce que la nomophobie?</h2>
		<p>La nomophobie est un mal de l’ère moderne. Il s’est développé avec l’augmentation de l’interaction entre l’homme et les technologies mobiles, en particulier le téléphone.</p>
		<p>Avez-vous déjà perdu ou oublié votre téléphone quelque part? Pour certains, l’absence de téléphone s’accompagne d’une poussée d’anxiété qui peut s’avérer très grave. C’est dans le but de mesurer cette nomophobie et d’établir son degré de sévérité que ces chercheurs de l’Université de l’Iowa ont élaboré un questionnaire</p>
		<p>L’étude a été menée en deux phases. La première a consisté en l’exploration qualitative de la nomophobie à travers des entrevues avec neuf étudiants. C’est à la suite de cette étape que quatre dimensions ont été définies : l’incapacité à communiquer, la perte de connectivité, l’impossibilité d’accéder à de l’information et l’abandon de la commodité.</p>
		<p>À partir de ces réponses, le questionnaire suivant a été élaboré dans la seconde phase de l’étude.</p>
		<h2 class="h3">Le questionnaire de la nomophobie</h2>
		<p>Vous devez répondre aux questions suivantes selon une échelle de 1 (fortement en désaccord) à 7 (fortement en accord). Plus votre résultat est élevé, plus le niveau de votre nomophobie est élevé (20 étant le score le moins élevé et 140 étant le score le plus élevé).</p>
		<div class="columns">
			<?php print_quiz() ?>
		</div>
	</div>
</body>
</html>