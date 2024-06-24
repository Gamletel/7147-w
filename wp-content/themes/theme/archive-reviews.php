<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */
$posts_per_load = 6;

get_header();
?>

    <main id="primary" class="archive archive-reviews">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <h1 class="page-title">
                Отзывы
            </h1>

            <div class="archive__wrapper">
                <?php if (have_posts()) { ?>

                    <div class="archive__holder">
                        <div class="posts">
                            <?php
                            $curposts = 0;
                            /* Start the Loop */
                            while (have_posts() && $curposts <= $posts_per_load) :
                                the_post();

                                get_template_part('templates/review-card');

                                $curposts++;

                            endwhile; ?>
                        </div>

                        <?php if ($curposts >= $posts_per_load) { ?>
                            <div id="loadmore" class="btn-mini transparent">
                                Показать еще
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                } else {
                    get_template_part('template-parts/content', 'none');
                }
                ?>

                <div class="archive__form">
                    <div class="archive__form-wrapper">
                        <h4 class="form__title">Оставить отзыв</h4>

                        <div class="form__subtitle p2">Оставьте отзыв, он пройдет модерацию и появится на сайте</div>

                        <div class="form__btn btn" data-modal="review">Оставить отзыв</div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                const btn = $('.archive-reviews #loadmore');
                const parent = $('.archive-reviews .archive__holder .posts');

                btn.click(function () {
                    $(this).hide();

                    $.ajax({
                        type: 'POST',
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: 'load_reviews',
                        },
                        beforeSend: function (xhr) {
                            parent.addClass('loading');
                        },
                        success: function (response) {
                            parent.html(response);
                            parent.removeClass('loading');
                        }
                    });
                })
            });
        </script>
    </main><!-- #main -->

<?php
// get_sidebar();
get_footer();
