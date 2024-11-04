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
			<h1 class="titre-xxl"><?php the_title(); ?></h1>
		</div>
	</div>

</div>


<div class="container container-page container-formation--header ">

	<div class="row">
		<div class="col col-lg-4 offset-lg-1 col-12 my-auto">

			<div class="card-formation--type">
				<div class="card-formation--type--formation">Formation</div>
			</div>

			<div class="texte-xl"><?php echo $c['contenus']['introduction'] ?></div>
			<?php if ($c['configuration']['formation_certifiante'] == true) : ?>
								<div class="formation-certifiante texte-s">Formation certifiante</div>
				<?php endif; ?>

			<?php if ($c['configuration']['ademe']): ?>
				<div class="row formation-certifications">
					<?php foreach ($c['configuration']['ademe'] as $val): ?>
						<?php if ($val == 1): ?>
							<div class="col col-12 col-xl-6">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation/ademe.png">
								<div class="texte-s">Formation selon le référentiel ADEME</div>
							</div>
						<?php endif; ?>
						<?php if ($val == 2): ?>
							<div class="col col-12 col-xl-6">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/logos/formation/cpf.png">
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
						<a href="<?php echo $c['contenus']['pdf_programme'] ?>" class="btn" target="_blank">Programme en détail</a>
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
						<a href="<?php echo $c['contenus']['guide_certification'] ?>" class="btn" target="_blank">guide du candidat à la
							certification</a>
					<?PHP endif; ?>

				</div>
			<?php endif ?>


		</div>
		<div class="col col-lg-3 offset-lg-1 col-12 container-formation--detail">

			<div class="formation-detail">
				<div class="titre-s ico-formation ico-tarif">TARIF</div>
				<div class="titre-m">SUR DEVIS</div>
			</div>

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


<?php require_once( get_stylesheet_directory().'/includes/_realisations.php');  ?>



<?php if ( empty($c['configuration']['session'])) : ?>
<div class="zone-contact">
	<a href="/contact" class="bloc-contact bloc-contact--formation">
		<div class="texte-xxl">Cette <?php if ($c['type'] == 1): ?> formation <?php else : ?>animation<?php endif; ?> vous intéresse ?</div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>
<?php else : ?>
	<div class="zone-contact">
	<div class="bloc-contact bloc-contact--formation">
		<div class="bloc-contact-contenu">
		<div class="texte-xxl align-right"><strong>Prochaines<br>sessions</strong></div>
		<div class="session-select">
			<select id="select-session">
				<?php foreach( $c['configuration']['session'] as $session) : ?>
					<option value="<?php echo $session['code'] ?>"><?php echo $session['dates'] ?></option>
				<?php endforeach; ?> 
			</select>
		</div>
		<div class="btn btn-preinscription">se pré-inscrire</div>
		<a href="/contact" class="btn-contact">
			<div class="texte-xxl"><strong>Besoin d’infos&nbsp;?</strong></div>
			<div class="btn-texte">Nous contacter</div>
		</a>
		</div>
		<div class="bloc-contact--fond"></div>
	</div>
</div>
<?php endif; ?>

<?php
get_footer();
?>