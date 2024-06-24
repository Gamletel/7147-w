<?php
/**
 * The Template for displaying image swatches field.
 *
 * @version 6.4.0
 * @package woocommerce-product-addons
 *
 * phpcs:disable WordPress.Security.NonceVerification.Missing
 */

global $product;

$loop = 0;
$field_name = !empty($addon['field_name']) ? $addon['field_name'] : '';
$required = !empty($addon['required']) ? $addon['required'] : '';
$restriction_data = WC_Product_Addons_Helper::get_restriction_data($addon);

?>
<div
	class="form-row form-row-wide wc-pao-addon-wrap wc-pao-addon-<?php echo esc_attr(sanitize_title($field_name)); ?> block-margin">
	<?php if (empty($required)) { ?>
		<a href="#" style="display: none" title="<?php echo esc_attr__('None', 'woocommerce-product-addons'); ?>"
		   class="wc-pao-addon-image-swatch" data-value="" data-price="">
			<img src="<?php echo esc_url(WC_Product_Addons_Helper::no_image_select_placeholder_src()); ?>"
				 alt="<?php echo esc_attr__('None', 'woocommerce-product-addons'); ?>"/>
		</a>
	<?php } ?>

	<div class="swiper wc-pao-addon-swiper wc-pao-addon-swiper-<?= $field_name; ?>" data-swiper-id="<?= $field_name; ?>">
		<div class="swiper-wrapper">
			<?php
			foreach ($addon['options'] as $i => $option) {
				$loop++;
				$price = !empty($option['price']) ? $option['price'] : '';
				$price_class = 0 < $price ? 'primary' : '';
				$price_prefix = 0 < $price ? '+' : '';
				$price_type = $option['price_type'];
				$price_raw = apply_filters('woocommerce_product_addons_option_price_raw', $price, $option);

				if ('percentage_based' === $price_type) {
					$price_tip = $price_prefix . $price_raw . ' %';
					$price_display = apply_filters(
						'woocommerce_product_addons_option_price',
						$price_raw ? '(' . $price_prefix . $price_raw . '%)' : '',
						$option,
						$i,
						'image'
					);
				} else {
					$price_tip = $price_prefix . wc_price(WC_Product_Addons_Helper::get_product_addon_price_for_display($price_raw));
					$price_display = apply_filters(
						'woocommerce_product_addons_option_price',
						$price_raw ? '(' . $price_prefix . wc_price(WC_Product_Addons_Helper::get_product_addon_price_for_display($price_raw)) . ')' : '',
						$option,
						$i,
						'0'
					);
				}
				$image_src = wp_get_attachment_image_src($option['image'], apply_filters('woocommerce_product_addons_image_swatch_size', 'wide', $option));
				$image_title = $option['label'] . ' ' . $price_tip;
				?>
				<div class="swiper-slide">
				<a href="#" title="<?php echo esc_attr($image_title); ?>" class="wc-pao-addon-image-swatch"
				   data-value="<?php echo esc_attr(sanitize_title($option['label']) . '-' . $loop); ?>"
				   data-price="<?php echo esc_attr(' <span class="wc-pao-addon-image-swatch-price">' . wptexturize($option['label'])); ?> <?php echo !empty($price_display) ? esc_attr('<span class="wc-pao-addon-price">' . wp_kses_post($price_display) . '</span>') : ''; ?>">
					<img
						src="<?php echo esc_url(is_array($image_src) && $image_src[0] ? $image_src[0] : wc_placeholder_img_src()); ?>"
						alt="<?php echo esc_attr(wp_strip_all_tags($image_title)); ?>"/>

					<div class="wc-pao-addon-image-swatch__text">
						<h5 class="wc-pao-addon-image-swatch__title"><?= $option['label']; ?></h5>

						<span class="wc-pao-addon-image-swatch__subtitle p2 <?= $price_class; ?>"><?= $price_tip; ?></span>
					</div>
				</a>
				</div>
			<?php } ?>

			<span class="wc-pao-addon-image-swatch-selected-swatch" style="display: none"></span>

			<select class="wc-pao-addon-image-swatch-select wc-pao-addon-field"
					name="addon-<?php echo esc_attr(sanitize_title($field_name)); ?>"
					id="addon-<?php echo esc_attr(sanitize_title($field_name)); ?>"
					data-restrictions="<?php echo esc_attr(json_encode($restriction_data)); ?>"
			>
				<?php if (empty($required)) { ?>
					<option value=""><?php esc_html_e('None', 'woocommerce-product-addons'); ?></option>
				<?php } else { ?>
					<option value=""><?php esc_html_e('Select an option...', 'woocommerce-product-addons'); ?></option>
					<?php
				}

				$loop = 0;

				foreach ($addon['options'] as $i => $option) {
					$loop++;

					$price = !empty($option['price']) ? $option['price'] : '';
					$price_raw = apply_filters('woocommerce_product_addons_option_price_raw', $price, $option);
					$price_type = !empty($option['price_type']) ? $option['price_type'] : '';
					$label = !empty($option['label']) ? $option['label'] : '';

					apply_filters_deprecated('woocommerce_addons_add_price_to_name', array(true, $product), '6.4.0', 'woocommerce_addons_add_product_price_to_value');

					$add_price_to_value = apply_filters('woocommerce_addons_add_product_price_to_value', true, $product);

					$price_for_display = $add_price_to_value ? apply_filters(
						'woocommerce_product_addons_option_price',
						$price_raw ? '(' . wc_price(WC_Product_Addons_Helper::get_product_addon_price_for_display($price_raw)) . ')' : '',
						$option,
						$i,
						'image'
					) : '';

					$price_display = WC_Product_Addons_Helper::get_product_addon_price_for_display($price_raw);

					if ('percentage_based' === $price_type) {
						$price_display = $price_raw;
					}
					?>
					<option data-raw-price="<?php echo esc_attr($price_raw); ?>"
							data-price="<?php echo esc_attr($price_display); ?>"
							data-price-type="<?php echo esc_attr($price_type); ?>"
							value="<?php echo esc_attr(sanitize_title($option['label']) . '-' . $loop); ?>"
							data-label="<?php echo esc_attr(wptexturize($label)); ?>"><?php echo wp_kses_post(wptexturize($label) . ' ' . $price_for_display); ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="swiper-additionals">
			<div class="swiper-btns">
				<div class="swiper-btn-prev" data-swiper-id="<?= $field_name; ?>"><?= inline('assets/images/swiper-btn.svg'); ?></div>

				<div class="swiper-btn-next" data-swiper-id="<?= $field_name; ?>"><?= inline('assets/images/swiper-btn.svg'); ?></div>
			</div>

			<div class="swiper-pagination" data-swiper-id="<?= $field_name; ?>"></div>
		</div>
	</div>
</div>
