<?php
/*
  Template Name: Service 
*/
get_header();
$c = get_fields();
$les_cibles = getCibles(get_the_id());

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
		<div class="col col-12 col-lg-8 offset-lg-2">
			<h1 class="titre-xxl"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row row-cibles">
		<div class="col col-12 ">
			<?php foreach ($les_cibles as $cible): ?>
				<a href="<?php echo $cible['lien'] ?>" class="tag"><?php echo $cible['titre'] ?></a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="container container-page zone-contenus reveal-start">

	<div class="row row-intro-service">

		<div class="col col-12 col-lg-8 offset-lg-2 align-center ">
			<img class="service-icone reveal-1" src="<?php echo $c['icones']['icone']['url'] ?>" alt="<?php the_title(); ?>">
			<div class="texte-xl reveal-2"><?php echo $c['introduction'] ?></div>
		</div>
	</div>

	<?php foreach ($c['contenus'] as $ligne): ?>
		<div class="row row-contenu reveal">
			<div class="col col-12 col-lg-5 row-contenu--texte  my-auto reveal-1">
				<div class="texte-m"><?php echo $ligne['texte'] ?></div>
			</div>

			<div class="col col-12 col-lg-5 row-contenu--image reveal-2">
				<div class="image-contenu" style="background-image:url(<?php echo $ligne['image']['url'] ?>)">
					<div class="filtre"></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>



<?php if ($c['accompagne']['texte_1'] == true): ?>
	<div class="conteneur-vague">
		<div class="vague"></div>
	</div>

	<div class="container  zone-contenus">
		<div class="row ">
			<div class="col col-12 col-lg-10 offset-lg-1">
				<div class="row row-accompagne reveal">
					<div class="col-demi">
						<div class="titre-xl reveal-1 ">
							nous vous<br>accompagnons<br>pour :
						</div>
						<div class="row">
							<div class="col-demi">

							</div>
							<div class="col-demi reveal-2">
								<div class="card-accompagne card-accompagne-image">
									<div class="filtre"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-demi">
						<div class="row">
							<div class="col-demi">
								<div class="card-accompagne reveal-3">
									<div class="card-accompagne--nbr titre-xl">1</div>
									<div class="card-accompagne--texte texte-m"><?php echo $c['accompagne']['texte_1'] ?>
									</div>
								</div>
								<div class="card-accompagne reveal-4">
									<div class="card-accompagne--nbr titre-xl">2</div>
									<div class="card-accompagne--texte texte-m"><?php echo $c['accompagne']['texte_2'] ?>
									</div>
								</div>
							</div>
							<div class="col-demi reveal-5">
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
	</div>
<?php endif; ?>


<?php if ($c['afficher_chiffres'] == true): ?>
	<div class="container  container-chiffres zone-contenus reveal">
		<div class="row row-chiffres reveal-1">
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

		<div class="row row-chiffres row-chiffres-mobile  reveal-1">
			<div class="col col-12 col-lg-10 offset-lg-1">
				<div class="row ">
					<div class="col col-12  align-center">
						<div class="texte-xxl"><?php echo $c['texte-chiffres'] ?><br><br></div>
					</div>
				</div>
				<div class="row ">
					<div class="col col-12">

						<div class="splide splide-chiffres">
							<div class="splide__track">
								<ul class="splide__list">

									<li class="splide__slide align-center">
										<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_1']['libelle'] ?></div>
										<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_1']['valeur'] ?></div>
										<div class="chiffre-legende texte-m"><?php echo $c['chiffre_1']['legende'] ?></div>
									</li>

									<li class="splide__slide align-center">
										<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_2']['libelle'] ?></div>
										<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_2']['valeur'] ?></div>
										<div class="chiffre-legende texte-m"><?php echo $c['chiffre_2']['legende'] ?></div>
									</li>

									<li class="splide__slide align-center">
										<div class="chiffre-libelle titre-s"><?php echo $c['chiffre_3']['libelle'] ?></div>
										<div class="chiffre-valeur chiffre"><?php echo $c['chiffre_3']['valeur'] ?></div>
										<div class="chiffre-legende texte-m"><?php echo $c['chiffre_3']['legende'] ?></div>
									</li>

								</ul>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

	</div>



	</div>
<?php endif; ?>


<?php require_once(get_stylesheet_directory() . '/includes/_realisations.php'); ?>


<div class="zone-contact reveal">
	<a href="/contact" class="bloc-contact reveal-1">
		<div class="texte-xxl">Vous aider à construire votre solution <strong>sur mesure</strong></div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>


<?php
get_footer();
?>