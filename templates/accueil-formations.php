<?php
/*
  Template Name: Toutes les formations 
*/
get_header();
$c = get_fields();
$services = getServices($post->ID);
$formations = getFormations();
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
			<div class="texte-xl"><?php echo $c['introduction'] ?></div>
		</div>
	</div>
</div>



<div class="container">
	<div class="row">

		<?php foreach ($formations as $formation): ?>
			<div class="col col-12 col-lg-4 col-xl-3 ">
				<a class="card card-formation" href="<?php the_permalink($formation->ID) ?>">
					<?php if ($formation->fields['type'] == 1): ?>
						<div class="card-formation--type">
							<div class="card-formation--type--formation">Formation</div>
						</div>
					<?php else: ?>
						<div class="card-formation--type">
							<div class="card-formation--type--animation">Animation</div>
						</div>
					<?php endif; ?>

					<h2 class="titre-m"><?php echo $formation->post_title ?></h2>

					<div class="card-formation--detail">
						<?php foreach ($formation->fields['configuration']['lieu']['type_lieu'] as $lieu): ?>
							<?php if ($lieu == 2): ?>
								<div class="tag">INTRA</div>
							<?php endif; ?>
							<?php if ($lieu == 1): ?>
								<div class="tag">INTER</div>
							<?php endif; ?>
						<?php endforeach; ?>

						<?php if ($formation->fields['configuration']['formation_certifiante'] == true): ?>
							<div class="formation-certifiante texte-s">Certifiante</div>
						<?php endif; ?>

					</div>
				</a>
			</div>
		<?php endforeach; ?>

	</div>
</div>

<div class="container zone-contenus container-cta-formation">

	<div class="row">
		<div class="col col-lg-6 col-12 align-right">
			<a href="/contact" class="btn">intéressé ? nous contacter</a>
		</div>
		<div class="col col-lg-6 col-12  ">
			<a href="/contact" class="btn btn--vert">télécharger le catalogue</a>
		</div>
	</div>
</div>

<div class="container zone-contenus ">


	<div class="row ">
		<div class="col col-lg-10 offset-lg-1 col-12">
			<div class="row">
				<div class="col col-6 my-auto">

					<div class="row ">
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-formation-1"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Approche respectueuse</strong><br>du
										vivant
									</div>
								</div>
							</div>
						</div>
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-formation-2"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Apports
											<br>théoriques</strong><br>solides
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-formation-3"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Mise en<br>situation</strong></div>
								</div>
							</div>
						</div>
						<div class="col col-6 my-auto ">
							<div class="picto">
								<div class="picto-image picto-formation-4"></div>
								<div class="picto-texte">
									<div class="texte-xl align-center"><strong>Exemples</strong><br>et témoignages</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col col-6 my-auto ">
					<div class="titre-xl marge-6">
						<?php echo $c['sous-titre'] ?>
					</div>
					<div class="texte-m marge-6">
						<?php echo $c['texte'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container zone-contenus">

	<div class="row">
		<div class="col col-lg-10 offset-lg-1 col-12">
			<div class="titre-xl  align-center">Nos formateurs</div>
		</div>
	</div>

	<div class="row ">
		<?php foreach ($c['formateurs'] as $formateur): ?>
			<div class="col  col-12 col-xl-4 col-lg-6">
				<div class="card-formateur ">
					<div class="card-formateur--portrait"
						style="background-image:url(<?php echo get_field('photo_3', $formateur->ID)['sizes']['medium'] ?>);">
					</div>
					<div class="card-formateur--nom">
						<div class="titre-s"><?php echo $formateur->post_title ?></div>
						<div class="texte-m"><?php echo $formateur->titre_formateur ?></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container zone-contenus ">

	<?php if ($c['ils_nous_font_confiance']): ?>

		<div class="row ">
			<div class="ils_nous_font_confiance">
				<div class="titre-xl ">Ils nous font confiance</div>
				<div class="ils_nous_font_confiance-logos">
					<?php foreach ($c['ils_nous_font_confiance'] as $logo): ?>
						<img src="<?php echo $logo['sizes']['large'] ?>">
					<?php endforeach; ?>
				</div>
			</div>
		</div>

	<?php endif ?>

</div>

<?php require_once(get_stylesheet_directory() . '/includes/_realisations.php'); ?>

<?php if ($c['afficher_chiffres']): ?>


	<div class="container zone-contenus">

		<div class="row row-chiffres">
			<div class="col col-12 col-lg-10 offset-lg-1">
				<div class="row ">
					<div class="col col-12">
						<div class="texte-xxl">En quelques chiffres</div>
					</div>
				</div>
				<div class="row ">
					<div class="col col-lg-4 col-12">
						<div class="chiffre"><?php echo $c['chiffre_1'] ?></div>
						<div class="titre-s"><?php echo $c['texte_1'] ?></div>
					</div>
					<div class="col col-lg-4 col-12">
						<div class="chiffre"><?php echo $c['chiffre_2'] ?></div>
						<div class="titre-s"><?php echo $c['texte_2'] ?></div>
					</div>
					<div class="col col-lg-4 col-12">
						<div class="chiffre"><?php echo $c['chiffre_3'] ?></div>
						<div class="titre-s"><?php echo $c['texte_3'] ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif ?>

<?php

get_footer();
?>