<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align = (isset($block['align']) && !empty($block['align'])) ? 'align' . $block['align'] : '';

$slides = get_field('slides');
?>
<?php if (!empty($slides) && is_array($slides)) { ?>
    <div id="mainbanner-block" class="<?= $classes; ?> <?= $align; ?>">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                $has_title = false;
                foreach ($slides as $slide) {
                    $image = wp_get_attachment_image_url($slide['image'], 'wide');
                    $title = $slide['title'];
                    $btn = $slide['btn'];
                    $btn_type = $btn['type'];
                    ?>
                    <div class="swiper-slide">
                        <div class="content">
                            <?php if ($image) { ?>
                                <div class="content__image">
                                    <img src="<?= $image; ?>" alt="">
                                </div>
                            <?php } ?>

                            <div class="container">
                                <div class="content__wrapper">
                                    <?php if ($title) { ?>
                                        <?php if (!$has_title) { ?>
                                            <h1 class="content__title"><?= $title; ?></h1>
                                        <?php } else { ?>
                                            <h2 class="content__title"><?= $title; ?></h2>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php switch ($btn_type) {
                                        case 'none':
                                            break;

                                        case 'modal':
                                            $btn_text = $btn['text'];
                                            ?>
                                            <div class="content__btn btn" data-modal="callback"><?= $btn_text; ?></div>
                                            <?php
                                            break;

                                        case 'link':
                                            $btn_text = $btn['text'];
                                            $btn_link = $btn['link'];
                                            ?>
                                            <a href="<?= $btn_link; ?>" class="content__btn btn"><?= $btn_text; ?></a>
                                            <?php
                                            break;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-pagination block__pagination"></div>
        </div>
    </div>
<?php } ?>
