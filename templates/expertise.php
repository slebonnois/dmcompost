<?php
/*
  Template Name: Expertise 
*/
get_header();
$c = get_fields();
$services = getServices($post->ID);

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


<div class="container container-expertise--services">
	<div class="row">
		
				<?php foreach ($services as $service): ?>
					<div class="col col-12 col-lg-4 ">
						<a class="card " href="<?php the_permalink($service->ID) ?>">
							<div class="card-header">
								<div class="row ">
									<div class="texte-l col  my-auto d-flex align-items-center"><strong><?php echo $service->post_title ?></strong></div>
									<div class="col col-auto"><img
											src="<?php echo $service->fields['icones']['icone']['url'] ?>">
									</div>
								</div>
								<div class="card-header--accroche texte-s">
									<?php echo $service->fields['vignette_page_expertise']['accroche'] ?>
								</div>
							</div>
							<div class="card-conteneur"
								style="background-image:url(<?php echo $service->fields['vignette_page_expertise']['vignette']['sizes']['medium_large'] ?>)">
								<div class="filtre"></div>
								<div class="btn-xs"></div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
		
	</div>
</div>

<?php require_once( get_stylesheet_directory().'/includes/_realisations.php');  ?>


<?php
get_footer();
?>