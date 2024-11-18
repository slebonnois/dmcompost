
<?php 

$reals = getRealisations(get_the_id()); 
$template = getTemplate(get_the_ID());

?>
	<?php if (!empty($reals)): ?>
<div class="zone-realisations reveal" id="realisations">

	<div class="splide splide-images reveal-1">
		<div class="splide__track">
			<ul class="splide__list">

				<?php foreach ($reals as $real): ?>
					<li class="splide__slide">
						<div class="splide__slide--image"
							style="background-image:url(<?php echo $real->fields['visuel']['url'] ?>)">

						</div>

					</li>
				<?php endforeach; ?>


			</ul>
		</div>
	</div>

	<div class="container zone-contenus reveal-2">


		<?php if (!empty($reals)): ?>
			<div class="row row-realisations" id="realisations">



				<div class="col-lg-5 col-12 offset-lg-6">
					<?php if ( ($template !='formation') && ($template !='accueil-formations') ): ?>
						<div class="titre-xl">Nos réalisations</div>
					<?php else : ?>
						<div class="titre-xl">Témoignages</div>
					<?php endif; ?>
				
					<div class="splide splide-textes ">
						<div class="splide__track">
							<ul class="splide__list">
								<?php foreach ($reals as $real): ?>
									<li class="splide__slide ">
										<div class="splide_conteneur">
										<div class="titre-m"><?php echo $real->fields['societe'] ?></div>
										<div class="texte-m"><?php echo $real->fields['misison'] ?></div>
										<div class="citation couleur-be"><?php echo $real->fields['temoignage'] ?></div>
										<div class="titre-s couleur-be"><?php echo $real->fields['nom'] ?></div>
										<div class="texte-m couleur-be"><?php echo $real->fields['fonction'] ?></div>
										</div>
									</li>
								<?php endforeach; ?>


							</ul>
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>
	</div>

</div>
<?php endif; ?>