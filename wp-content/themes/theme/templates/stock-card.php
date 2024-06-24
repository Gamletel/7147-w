<?php
$card_style = get_field('card_style', $post);
switch ($card_style){
    case 'light':
        $bg = get_theme_file_uri().'/assets/images/stock-card-bg-light.png';
    break;
    case 'dark':
        $bg = get_theme_file_uri().'/assets/images/stock-card-bg-dark.png';
        break;
}

$title = get_the_title($post);
$additional_text = get_field('additional_text', $post);
$thumbnail = get_the_post_thumbnail_url($post, 'wide');
?>
<div class="stock-card stock-card-<?= $card_style; ?>">
    <h3 class="stock-card__title"><?= $title; ?></h3>
    
    <?php if ($additional_text) {?>
        <h5 class="stock-card__additional-text"><?= $additional_text; ?></h5>
    <?php } ?>

    <div class="stock-card__btn btn-mini transparent">Заказать</div>

    <?php if ($thumbnail) {?>
        <div class="stock-card__thumbnail">
            <img src="<?= $thumbnail; ?>" alt="">
        </div>
    <?php } ?>

    <div class="stock-card__bg">
        <img src="<?= $bg; ?>" alt="">
    </div>
</div>
