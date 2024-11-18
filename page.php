<?php
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

<div class="container container-page ">
    <div class="row row-page-contenu">
        <div class="col col-12 col-lg-10 offset-lg-1 ">
        <h1 class="titre-xxl align-center"><?php echo get_the_title()?></h1>
        <?php the_content() ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>