<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme
 */

$logo = wp_get_attachment_image_url(theme('logo'), 'full');
$phones = @settings('phones');
$emails = @settings('emails');
$socials = @settings('socials');
//$additionals = @settings('additional');
$header_additional_text = theme('header_additional_text');
$header_title = theme('header_title');
$header_subtitle = theme('header_subtitle');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
    />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="header" class="site-header">
    <div class="header">
        <div class="header__top">
            <div class="container">
                <div class="header__top-wrapper">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'mobileMenu',
                        'container' => false,
                        'menu' => 'Главное',
                        'menu_class' => 'menuTop',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                    ]);
                    ?>

                    <?php if ($header_additional_text) { ?>
                        <div class="additional-text p2"><?= $header_additional_text; ?></div>
                    <?php } ?>

                    <?php if (!empty($phones) && is_array($phones)) {
//                        $name = $phones[0]['name'];
                        $value = $phones[0]['value'];
                        ?>
                        <a href="tel:<?= $value; ?>" class="phone p1"><?= $value; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="header__middle">
            <div class="container">
                <div class="header__middle-wrapper">
                    <?php if ($logo) { ?>
                        <a href="/" class="logo">
                            <img src="<?= $logo; ?>" alt="">
                        </a>
                    <?php } ?>

                    <?php if ($header_title || $header_subtitle) { ?>
                        <div class="header__text">
                            <?php if ($header_title) { ?>
                                <div class="header__title p1"><?= $header_title; ?></div>
                            <?php } ?>

                            <?php if ($header_subtitle) { ?>
                                <div class="header__subtitle p3"><?= $header_subtitle; ?></div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="header__additionals">
                        <?php echo do_shortcode('[fibosearch]'); ?>

                        <a href="<?= wc_get_cart_url(); ?>" class="cart-btn btn-mini">
                            Корзина
                        </a>

                        <a href="<?= wc_get_favorites_url(); ?>" class="favorite-btn wc-btn">
                            <?php
                            $favCount = WCFAVORITES()->count_items();
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                 fill="none">
                                <path d="M19.0714 13.6422L13.4146 19.299C12.6335 20.0801 11.3672 20.0801 10.5862 19.299L4.92931 13.6422C2.97669 11.6895 2.97669 8.52372 4.92931 6.57109C6.88193 4.61847 10.0478 4.61847 12.0004 6.57109C13.953 4.61847 17.1188 4.61847 19.0714 6.57109C21.0241 8.52372 21.0241 11.6895 19.0714 13.6422Z"
                                      stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <div class="number p3"><?= WCFAVORITES()->count_items(); ?></div>
                        </a>

                        <div class="burger open_menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__bottom">
            <div class="container">
                <div class="header__bottom-wrapper">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'mobileMenu',
                        'container' => false,
                        'menu' => 'Меню',
                        'menu_class' => 'menuTop',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-mnu">
        <div id="close-mnu">×</div>

        <a href="/" class="logo__holder">
            <img src="<?= $logo; ?>" alt="" class="logo">
        </a>

        <?php
        wp_nav_menu([
            'theme_location' => 'mobileMenu',
            'container' => false,
            'menu' => 'Главное',
            'menu_class' => 'menuTop',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ]);
        ?>

        <?php
        wp_nav_menu([
            'theme_location' => 'mobileMenu',
            'container' => false,
            'menu' => 'Меню',
            'menu_class' => 'menuTop',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
        ]);
        ?>

        <?php if (!empty($phones)) { ?>
            <div class="phones__holder">
                <?php foreach ($phones as $item) { ?>
                    <a href="tel:<?= $item['value']; ?>" class="phone__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/phone.svg'); ?>
                        <?= $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
        <?php if (!empty($emails)): ?>
            <div class="email__holder">
                <?php foreach ($emails as $item) { ?>
                    <a href="mailto:<?= $item['value']; ?>" class="email__item">
                        <?= file_get_contents(TEMPLATEPATH . '/assets/images/mail.svg'); ?>
                        <?php echo $item['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>
        <?php if (!empty($adresses)): ?>
            <div class="adresses__holder">
                <?php foreach ($adresses as $adress) { ?>
                    <?= $adress['value']; ?>
                <?php } ?>
            </div>
        <?php endif ?>
        <?php if (!empty($socials)): ?>
            <div class="soc__holder">
                <?php foreach ($socials as $item) { ?>
                    <a href="<?= $item['value']; ?>" class="soc__item" target="_blank">
                        <?= get_image($item['icon'], [24, 24]); ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>
</header><!-- #masthead -->
