<?php
$post_id = $post->ID;
$title = get_the_title($post);
$date = get_field('date', $post);
$thumbnail = get_the_post_thumbnail_url($post, 'wide');
$text = get_field('text', $post);
$images = get_field('images', $post);
?>
<div class="review-card">
    <div class="review-card__head">
        <div class="review-card__thumbnail">
            <?php if ($thumbnail) { ?>
                <img src="<?= $thumbnail; ?>" alt="">
            <?php } else { ?>
                <img src="<?= get_theme_file_uri(); ?>/assets/images/user.png" alt="">
            <?php } ?>
        </div>

        <h5 class="review-card__title"><?= $title; ?></h5>

        <?php if ($date) { ?>
            <div class="review-card__date p3"><?= $date; ?></div>
        <?php } ?>
    </div>

    <?php if ($text) { ?>
        <div class="review-card__text p2"><?= $text; ?></div>
    <?php } ?>

    <?php if (!empty($images) || is_array($images)) { ?>
        <div class="review-card__images">
            <?php foreach ($images as $image) {
                $image_wide = wp_get_attachment_image_url($image, 'wide');
                $image_full = wp_get_attachment_image_url($image, 'full');
                ?>
                <div class="image">
                    <img src="<?= $image_wide; ?>" alt="" data-fancybox='gallery-review-<?= $post_id; ?>'
                         data-src='<?= $image_full; ?>' loading="lazy">
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
