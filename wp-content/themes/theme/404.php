<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme
 */
$error_page_bg = wp_get_attachment_image_url(theme('error_page_bg'), 'full');

get_header();
?>

	<main id="primary" class="site-main error-page">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="error-page__wrapper">
                <div class="error-page__404">
                    <img src="<?= get_theme_root_uri(); ?>/theme/assets/images/404.png" alt="">
                </div>

                <div class="error-page__content">
                    <h1 class="error-page__title">Произошла ошибка!</h1>

                    <div class="error-page__subtitle p2">Данная страница находится в разработке или её не существует. Пожалуйста, вернитесь на главную</div>

                    <a href="/" class="btn">НА ГЛАВНУЮ</a>
                </div>
            </div>
        </div>

        <?php if ($error_page_bg) {?>
            <img src="<?= $error_page_bg; ?>" alt="" class="error-page__bg">
        <?php } ?>
	</main><!-- #main -->

<?php
get_footer();
