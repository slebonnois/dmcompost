<?php
/*
  Template Name: Cible 
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


<div class="container container-page container-cible zone-contenus ">

	<div class="row ">
		<div class="col col-12 ">

			<div class="row">
				<div class="cible-illu" style="background-image:url('<?php echo $c['visuels']['personnage']['url'] ?>')"></div>
				<div class="cible-fond " style="background-image:url('<?php echo $c['visuels']['fond']['url'] ?>')"></div>></div>
				<div class="col col-lg-5 offset-1 ">
					<div class="cible-header ">
						<h1 class="titre-xxl"><?php the_title(); ?></h1>
						<div class="texte-m"><strong>
								<?php echo $c['introduction'] ?>
							</strong></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col col-12 ">
					<div class="titre-xl align-center">Quel est votre besoin ?</div>
				</div>

				<div class="col col-12 ">
				</div>
			</div>



			<?php $i = 1;
			foreach ($c['besoin'] as $besoin):
				 ?>

				<div class="row row-contenu">

				<div class="col col-12 col-lg-5 row-contenu--image">
						<div class="image-contenu" style="background-image:url(<?php echo $besoin['image']['url'] ?>)">
							<div class="filtre"></div>
						</div>
					</div>
					
					<div class="col col-12 col-lg-5 row-contenu--texte  my-auto">

						<div class="tag-besoin"><strong>Besoin n°<?php echo $i ?></strong></div>

						<div class="titre-m"><?php echo $besoin['titre'] ?></div>
						<div class="texte-m"><?php echo $besoin['description'] ?></div>
						<?php 
							if ( !empty($besoin['lien'] )) $lien = $besoin['lien']; 
							else $lien =get_permalink($besoin['lien_service']);
						 ?>
						<a href="<?php echo $lien ?>" class="btn btn--vert">+ d’infos</a>
					</div>

					
				</div>
				
				<?php $i++; ?>
			<?php endforeach; ?>


		</div>
	</div>



</div>

<?php require_once( get_stylesheet_directory().'/includes/_realisations.php');  ?>

<div class="zone-contact">
	<a href="/contact" class="bloc-contact">
		<div class="texte-xxl">
		Vous souhaitez échanger<br> et nous poser <strong>toutes vos questions</strong>
		</div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>



<?php

get_footer();
?>