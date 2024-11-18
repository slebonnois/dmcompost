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


<div class="container container-expertise--services reveal">
	<div class="row">

		<?php $i = 1;
		foreach ($services as $service): ?>
			<div class="col col-12 col-sm-6 col-md-6 col-lg-4 reveal-<?php echo $i ?>">
				<a class="card " href="<?php the_permalink($service->ID) ?>">
					<div class="card-header">
						<div class="row ">
							<div class="texte-l  col-lg-8 col my-auto d-flex align-items-center">
								<strong><?php echo $service->post_title ?></strong></div>
							<div class="col col-4"><img
									src="<?php echo $service->fields['icones']['icone']['url'] ?>" alt="<?php echo $service->post_title ?>">
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
			<?php $i++; endforeach; ?>

	</div>
</div>

<div class="container zone-contenus reveal">

	<div class="row row-chiffres quelques-chiffres reveal-1">
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

	<div class="row row-chiffres row-chiffres-mobile quelques-chiffres reveal-1">
            <div class="col col-12 col-lg-10 offset-lg-1">
                <div class="row ">
                    <div class="col col-12">
                        <div class="texte-xxl">En quelques chiffres</div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col col-12">

                        <div class="splide splide-chiffres splide-chiffres-mobile">
                            <div class="splide__track">
                                <ul class="splide__list">

                                    <li class="splide__slide">
                                        <div class="chiffre"><?php echo $c['chiffre_1'] ?></div>
                                        <div class="titre-s"><?php echo $c['texte_1'] ?></div>
                                    </li>

                                    <li class="splide__slide">
                                        <div class="chiffre"><?php echo $c['chiffre_2'] ?></div>
                                        <div class="titre-s"><?php echo $c['texte_2'] ?></div>
                                    </li>

                                    <li class="splide__slide">
                                        <div class="chiffre"><?php echo $c['chiffre_3'] ?></div>
                                        <div class="titre-s"><?php echo $c['texte_3'] ?></div>
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