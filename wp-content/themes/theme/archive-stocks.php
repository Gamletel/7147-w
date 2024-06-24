<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */
$posts_per_load = 4;

get_header();
?>

    <main id="primary" class="archive archive-stocks">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <h1 class="page-title">
                Акции
            </h1>

            <?php if (have_posts()) { ?>

                <div class="archive__holder">
                    <?php
                    $cur_posts = 1;
                    /* Start the Loop */
                    while (have_posts() && $cur_posts <= $posts_per_load) :
                        the_post();
                        get_template_part('templates/stock-card');
                        $cur_posts++;
                    endwhile;
                    ?>
                </div>

                <?php if ($cur_posts >= $posts_per_load) {?>
                    <div id="loadmore" class="btn-mini transparent">Показать еще</div>
                <?php } ?>

                <?php

                get_template_part('inc/parts/pagination');

            } else {

                get_template_part('template-parts/content', 'none');

            }
            ?>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                const btn = $('.archive-stocks #loadmore');
                const parent = $('.archive-stocks .archive__holder');

                btn.click(function () {
                    $(this).hide();

                    $.ajax({
                        type: 'POST',
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: 'load_stocks',
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
