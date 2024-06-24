<?php
$classes = isset($block['className']) ? $block['className'] : '';
$align   = (isset($block['align']) && !empty($block['align'])) ? 'align'.$block['align'] : '';

$categories = get_field('categories');
?>
<div id="categories-block" class="block-margin <?=$classes;?> <?=$align;?>">
    <div class="archive__categories">
        <?php foreach ($categories as $item) {
            get_template_part('templates/product-cat', null, array('item'=>$item));

        } ?>
    </div>
</div>