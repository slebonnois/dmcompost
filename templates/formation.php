<?php
/*
  Template Name: Formation 
*/

get_header();

$c = get_fields();

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
			<h1 class="titre-xxl"><?php
			if (!empty($c['titre_formate']['titre_2']))
				echo $c['titre_formate']['titre_2'];
			else
				the_title();
			?></h1>
		</div>
	</div>
</div>


<div class="container container-page container-formation--header zone-contenus">

	<div class="row ">
		<div class="col col-lg-4 offset-lg-1 col-12 my-auto">

			<?php if ($c['type'] == 1): ?>
				<div class="card-formation--type">
					<div class="card-formation--type--formation">Formation</div>

					<?php if ($c['configuration']['formation_certifiante'] == true): ?>
						<div class="formation-certifiante texte-s">Certifiante</div>
					<?php endif; ?>

				</div>
			<?php else: ?>
				<div class="card-formation--type">
					<div class="card-formation--type--animation">Animation</div>

					<?php if ($c['configuration']['formation_certifiante'] == true): ?>
						<div class="formation-certifiante texte-s">Certifiante</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>

			<div class="texte-xl"><?php echo $c['contenus']['introduction'] ?></div>


			<?php if ($c['configuration']['ademe']): ?>
				<div class="row formation-certifications">
					<?php foreach ($c['configuration']['ademe'] as $val): ?>
						<?php if ($val == 1): ?>
							<div class="col col-12 col-xl-6">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation/ademe.png" alt="ADEME">
								<div class="texte-s">Formation selon le référentiel ADEME</div>
							</div>
						<?php endif; ?>
						<?php if ($val == 2): ?>
							<div class="col col-12 col-xl-6">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation/cpf.png" alt="CPF">
								<div class="texte-s">Formation éligible au CPF selon conditions</div>
							</div>

						<?php endif; ?>
					<?php endforeach; ?>


				</div>



			<?php endif ?>
		</div>

		<div class="col col-12 col-lg-5 offset-lg-1 row-contenu--image my-auto">
			<div class="image-contenu" style="background-image:url(<?php echo $c['contenus']['visuel']['url'] ?>)">
				<div class="filtre"></div>
			</div>
		</div>


	</div>

	<div class="row container-formation">
		<div class="col col-lg-6 offset-lg-1 col-12">

			<?php if (!empty($c['contenus']['objectifs'])): ?>
				<div class="formation-section formation-objectifs">
					<div class="titre-m">Objectifs</div>
					<div class="texte-l"><?php echo $c['contenus']['objectifs'] ?></div>
				</div>
			<?php endif ?>

			<?php if (!empty($c['contenus']['prerequis'])): ?>
				<div class="formation-section formation-prerequis">
					<div class="titre-m">Prérequis</div>
					<div class="texte-l"><?php echo $c['contenus']['prerequis'] ?></div>
				</div>
			<?php endif ?>


			<?php if (!empty($c['contenus']['programme']) || !empty($c['contenus']['pdf_programme'])): ?>
				<div class="formation-section formation-programme">
					<div class="titre-m">programme</div>

					<?php if (!empty($c['contenus']['programme'])): ?>
						<div class="texte-m"><?php echo $c['contenus']['programme'] ?></div>
					<?PHP endif; ?>

					<?php if ($c['contenus']['pdf_programme']): ?>
						<a href="<?php echo $c['contenus']['pdf_programme'] ?>" class="btn btn--formation" target="_blank">Programme en
							détail</a>
					<?PHP endif; ?>
				</div>
			<?php endif ?>

			<?php if (!empty($c['contenus']['infos_supplementaires']) || !empty($c['contenus']['guide_certification'])): ?>
				<div class="formation-section formation-complement">
					<div class="titre-m">infos supplémentaires</div>

					<?php if (!empty($c['contenus']['infos_supplementaires'])): ?>
						<div class="texte-m"><?php echo $c['contenus']['infos_supplementaires'] ?></div>
					<?PHP endif; ?>

					<?php if ($c['contenus']['guide_certification']): ?>
						<a href="<?php echo $c['contenus']['guide_certification'] ?>" class="btn btn--formation" target="_blank">guide du
							candidat à la
							certification</a>
					<?PHP endif; ?>

				</div>
			<?php endif ?>


		</div>
		<div class="col col-lg-3 offset-lg-1 col-12 container-formation--detail">

			<?php if ($c['configuration']['tarif_groupe']['sur_devis'] == true): ?>
				<div class="formation-detail">
					<div class="titre-s ico-formation ico-tarif">TARIF</div>
					<div class="titre-m">SUR DEVIS</div>
				</div>
			<?php elseif (!empty( $c['configuration']['tarif_groupe']['tarif_solidaire']['montant'] )): ?>


					<div class="formation-detail formation-tarif formation-tarif-principal">
						<div class="titre-s ico-formation ico-tarif">TARIF</div>
						<div><span class="chiffre"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['montant'] ?></strong></span> <span class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['unite'] ?></strong></span></div>
						<div class="formation-tarif-complement">
							<div class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['montant_option'] ?></strong></div>
							<div class="texte-s"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['commentaire_option'] ?></strong></div>
						</div>
					</div>

					<div class="formation-detail  formation-tarif">
						<div class="titre-s ico-formation ico-tarif">TARIF SOLIDAIRE</div>
						<div><span class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif_solidaire']['montant'] ?></strong> <strong><?php echo $c['configuration']['tarif_groupe']['tarif_solidaire']['unite'] ?></strong></span></div>
						<div class="formation-tarif-complement">
						<?php if(!empty($c['configuration']['tarif_groupe']['tarif_solidaire']['montant_option'])) : ?><div class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif_solidaire']['montant_option'] ?></strong></div><?php endif; ?>
							<div class="texte-s"><strong><?php echo $c['configuration']['tarif_groupe']['tarif_solidaire']['commentaire_option'] ?></strong></div>
						</div>
						<div class="texte-s"><strong>- Nombre de places limité -</strong></div>
					</div>
					<?php else : ?>

						<div class="formation-detail formation-tarif  ">
						<div class="titre-s ico-formation ico-tarif">TARIF</div>
						<div><span class="chiffre"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['montant'] ?></strong></span> <span class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['unite'] ?></strong></span></div>
						<div class="formation-tarif-complement">
						<?php if(!empty($c['configuration']['tarif_groupe']['tarif']['montant_option'])) : ?><div class="titre-m"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['montant_option'] ?></strong></div><?php endif; ?>
							<div class="texte-s"><strong><?php echo $c['configuration']['tarif_groupe']['tarif']['commentaire_option'] ?></strong></div>
						</div>
					</div>
			<?php endif; ?>

			<div class="formation-detail">
				<div class="titre-s ico-formation ico-duree">Durée</div>
				<div class="titre-m"><?php echo $c['configuration']['duree_groupe']['duree'] ?></div>
				<div class="texte-s"><?php echo $c['configuration']['duree_groupe']['duree_commentaire'] ?></div>
			</div>

			<div class="formation-detail">
				<div class="titre-s ico-formation ico-public">Public</div>
				<div class="texte-s"><?php echo $c['configuration']['public'] ?></div>
			</div>

			<div class="formation-detail">
				<div class="titre-s ico-formation ico-lieu">Lieu</div>

				<?php foreach ($c['configuration']['lieu']['type_lieu'] as $lieu): ?>
					<?php if ($lieu == 2): ?>
						<div class="tag">INTRA</div>
					<?php endif; ?>
					<?php if ($lieu == 1): ?>
						<div class="tag">INTER</div>
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="texte-s"><?php echo $c['configuration']['lieu']['commentaire'] ?></div>

			</div>


		</div>
	</div>
</div>



<?php if (empty($c['configuration']['session'])): ?>
	<div class="zone-contact">
		<a href="/contact" class="bloc-contact bloc-contact--formation">
			<div class="texte-xxl">Cette <?php if ($c['type'] == 1): ?> formation <?php else: ?>animation<?php endif; ?>
				vous intéresse ?</div>
			<div class="btn">contactez-nous</div>
			<div class="bloc-contact--fond"></div>
		</a>
	</div>
<?php else: ?>
	<div class="zone-contact">
		<div class="bloc-contact bloc-contact--formation bloc-contact--formation-sessions">
			<div class="bloc-contact-contenu">
				<div class="texte-xxl  d-block d-md-none"><strong>Prochaines sessions</strong></div>
				<div class="texte-xxl align-right d-md-block d-none"><strong>Prochaines<br>sessions</strong></div>
				<div class="session-select">
					<select id="select-session">
						<?php foreach ($c['configuration']['session'] as $session): ?>
							<option value="<?php echo $session['code'] ?>"><?php echo $session['dates'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="btn btn--vert ">se pré-inscrire</div>
				<a href="/contact" class="btn-contact">
					<div class="texte-xxl"><strong>Besoin d’infos&nbsp;?</strong></div>
					<div class="btn-texte">Nous contacter</div>
				</a>
			</div>
			<div class="bloc-contact--fond"></div>
		</div>
	</div>
<?php endif; ?>


<?php require_once(get_stylesheet_directory() . '/includes/_realisations.php'); ?>



<?php
get_footer();
?>