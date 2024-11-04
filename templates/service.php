<?php
/*
  Template Name: Service 
*/
get_header();
$c = get_fields();
$cibles = getCibles(get_the_id());

?>

<div class="container container-chemin">
	<div class="row">
		<div class="col col-12">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb();
			}
			?>
		</div>
	</div>
</div>

<div class="container container-expertise">
	<div class="row">
		<div class="col col-12">
			<h1 class="titre-xxl"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row row-cibles">
		<div class="col col-12">
			<?php foreach ($cibles as $cible): ?>
				<a href="<?php echo $cible['lien'] ?>" class="tag"><?php echo $cible['titre'] ?></a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="container container-page ">

	<div class="row">

		<div class="col col-12 col-lg-8 offset-lg-2 align-center">
			<img class="service-icone" src="<?php echo $c['icones']['icone']['url'] ?>">
			<div class="texte-xl"><?php echo $c['introduction'] ?></div>
		</div>
	</div>

	<?php foreach ($c['contenus'] as $ligne): ?>
		<div class="row row-contenu">
			<div class="col col-12 col-lg-5 row-contenu--texte  my-auto">
				<div class="texte-m"><?php echo $ligne['texte'] ?></div>
			</div>

			<div class="col col-12 col-lg-5 row-contenu--image">
				<div class="image-contenu" style="background-image:url(<?php echo $ligne['image']['url'] ?>)">
					<div class="filtre"></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<?php if ($c['accompagne']['texte_1'] == true): ?>
		<div class="row ">
			<div class="col col-12 col-lg-10 offset-lg-1">
				<div class="row row-accompagne">
					<div class="col-demi">
						<div class="titre-xl align-right">
							nous vous<br>accompagnons<br>pour :
						</div>
						<div class="row">
							<div class="col-demi">

							</div>
							<div class="col-demi">
								<div class="card-accompagne card-accompagne-image"
									style="background-image:url(<?php echo $c['accompagne']['acc_image']['url'] ?>)">
									<div class="filtre"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-demi">
						<div class="row">
							<div class="col-demi">
								<div class="card-accompagne">
									<div class="card-accompagne--nbr titre-xl">1</div>
									<div class="card-accompagne--texte texte-m"><?php echo $c['accompagne']['texte_1'] ?>
									</div>
								</div>
								<div class="card-accompagne">
									<div class="card-accompagne--nbr titre-xl">2</div>
									<div class="card-accompagne--texte texte-m"><?php echo $c['accompagne']['texte_2'] ?>
									</div>
								</div>
							</div>
							<div class="col-demi">
								<div class="card-accompagne card-accompagne--3">
									<div class="card-accompagne--nbr titre-xl">3</div>
									<div class="card-accompagne--texte texte-m"><?php echo $c['accompagne']['texte_3'] ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<?php if ($c['afficher_chiffres'] == true): ?>
		<div class="row row-chiffres">
			<div class="col col-12 col-lg-10 offset-lg-1">
				<div class="row ">
					<div class="col-quart my-auto">
						<div class="texte-xxl"><?php echo $c['texte-chiffres'] ?></div>
					</div>
					<div class="col-quart  my-auto">
						<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_1']['libelle'] ?></div>
						<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_1']['valeur'] ?></div>
						<div class="chiffre-legende texte-m"><?php echo $c['chiffre_1']['legende'] ?></div>
					</div>
					<div class="col-quart  my-auto">
						<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_2']['libelle'] ?></div>
						<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_2']['valeur'] ?></div>
						<div class="chiffre-legende texte-m"><?php echo $c['chiffre_2']['legende'] ?></div>
					</div>
					<div class="col-quart  my-auto">
						<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_3']['libelle'] ?></div>
						<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_3']['valeur'] ?></div>
						<div class="chiffre-legende texte-m"><?php echo $c['chiffre_3']['legende'] ?></div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php require_once( get_stylesheet_directory().'/includes/_realisations.php');  ?>


<div class="zone-contact">
	<a href="/contact" class="bloc-contact">
		<div class="texte-xxl">Vous aider à construire votre solution <strong>sur mesure</strong></div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>


<?php
get_footer();
?>