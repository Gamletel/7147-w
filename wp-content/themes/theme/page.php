<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */
$title = get_the_title();
$description = get_field('description');
$thumbnail = get_the_post_thumbnail_url($post, 'wide');

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
        </div>

        <?php if ($description || $thumbnail) { ?>
            <div class="page__main-banner block-margin">
                <div class="main-banner__bg-left">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/page-banner-bg-left.png" alt="">
                </div>

                <div class="container">
                    <div class="main-banner__wrapper">
                        <div class="main-banner__content">
                            <h1 class="main-banner__title"><?= $title; ?></h1>

                            <?php if ($description) { ?>
                                <div class="main-banner__description p2"><?= $description; ?></div>
                            <?php } ?>
                        </div>

                        <?php if ($thumbnail) { ?>
                            <div class="main-banner__thumbnail">
                                <img src="<?= $thumbnail; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="main-banner__bg-right">
                    <img src="<?= get_theme_file_uri(); ?>/assets/images/page-banner-bg-right.png" alt="">
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <h1 class="page-title">
                    <?php the_title(); ?>
                </h1>
            </div>
        <?php } ?>

        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </main><!-- #main -->

<?php
get_footer();
