<?php
get_header();
$c = get_fields();
$terms = get_terms(array(
    'taxonomy' => 'reference',
    'hide_empty' => false,
));


usort($c['references'], 'sortByOption');
function sortByOption($a, $b) {
  return strcmp($a['logo']['filename'], $b['logo']['filename']);
}
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
        <div class="col col-10 offset-1">
            <div class="titre-xxl align-center">Références</div>
    
            <div class="texte-xl align-center">Découvrez nos clients par secteur et nos partenaires.</div>
        </div>
    </div>
    <div class="row row-references-categories">
        <div class="col col-12">
            
                <div  data-filter="tout" class=" tag tag-reference tag-reference-tout is-active">Tout</div>
                <?php foreach ($terms as $term):?>
                    <div data-filter="categorie-<?php echo $term->term_id ?>" class=" tag tag-reference " ><?php echo $term->name ?></div>
                <?php endforeach; ?>
           
        </div>
    </div>
</div>

<div class="container container-page  container-references">

    <div class="row">
        <div class="col col-12 col-lg-10 offset-lg-1 ">
            <div class="row ">
                <?php foreach ($c['references'] as $ref): ;?>
                <?php 
                    $class="";
                    foreach ($ref['classement'] as $classement) {
                        $class .= ' categorie-'.$classement.' ';
                    }
                ?>
                    <div class=" col-reference <?php echo $class ?> is-active" >
                        <div class="reference">
                            <img src="<?php echo $ref['logo']['sizes']['medium'] ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</div>

<div class="zone-contact">
	<a href="/contact" class="bloc-contact">
		<div class="texte-xxl">Vous aider à construire votre solution <strong>sur mesure</strong></div>
		<div class="btn">contactez-nous</div>
		<div class="bloc-contact--fond"></div>
	</a>
</div>



<?php get_footer(); ?>