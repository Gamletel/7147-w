<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Company
 */

$logo = wp_get_attachment_image_url(theme('logo'), 'full');
$phones = @settings('phones');
$emails = @settings('emails');
$requisites = @settings('requisites');
$footer_additional_text = theme('footer_additional_text');
//$socials = @settings('socials');
//$adress = @settings('adresses');
?>

<footer id="footer" class="site-footer">
    <div class="notice"></div>

    <div class="footer">
        <div class="container">
            <div class="footer__top">
                <?php if ($logo) { ?>
                    <a href="/" class="logo">
                        <img src="<?= $logo; ?>" alt="">
                    </a>
                <?php } ?>

                <div class="additionals">
                    <div class="menu">
                        <div class="menu__title p2">Меню</div>

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'mobileMenu',
                            'container' => false,
                            'menu' => 'Меню-футер',
                            'menu_class' => 'menuFooter',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 2,
                        ]);
                        ?>
                    </div>

                    <div class="menu">
                        <div class="menu__title p2">Общая информация</div>

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'mobileMenu',
                            'container' => false,
                            'menu' => 'Общая информация',
                            'menu_class' => 'menuFooter',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 2,
                        ]);
                        ?>
                    </div>

                    <div class="contacts">
                        <div class="menu__title p2">Общая информация</div>

                        <div class="contacts__wrapper">
                            <?php if (!empty($phones) && is_array($phones)) { ?>
                                <?php foreach ($phones as $item) {
                                    $value = $item['value'];
                                    $name = $item['name'];
                                    ?>
                                    <a href="tel:<?= $value; ?>" class="item p2">
                                        <div class="item__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path d="M19.5063 7.95952C18.0666 13.6147 13.6147 18.0666 7.95953 19.5063C5.81867 20.0513 4 18.2091 4 16V15C4 14.4477 4.44883 14.0053 4.99842 13.9508C5.92696 13.8587 6.81815 13.6397 7.65438 13.3112L9.17366 14.8305C11.6447 13.648 13.648 11.6447 14.8305 9.17367L13.3112 7.65438C13.6397 6.81816 13.8587 5.92696 13.9508 4.99842C14.0053 4.44883 14.4477 4 15 4H16C18.2091 4 20.0513 5.81867 19.5063 7.95952Z"
                                                      stroke="#85D040" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </div>

                                        <?= $value; ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>

                            <?php if (!empty($emails) && is_array($emails)) { ?>
                                <?php foreach ($emails as $item) {
                                    $value = $item['value'];
                                    $name = $item['name'];
                                    ?>
                                    <a href="mailto:<?= $value; ?>" class="item p2">
                                        <?= $name; ?>
                                    </a>
                                <?php } ?>
                            <?php } ?>

                            <?php if ($requisites) { ?>
                                <div class="requisites p2"><?= $requisites; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer__bottom">
                <a href="/privacy-policy" class="policy p2" target="_blank">
                    Политика конфиденциальности
                </a>

                <a href="https://grampus-studio.ru/?utm_source=client&utm_keyword=<?= get_site_url(); ?>;"
                   target="_blank" class="grampus p2">
                    Сайт разработан

                    <?= inline('assets/images/GRAMPUS.svg'); ?>
                </a>

                <?php if ($footer_additional_text) { ?>
                    <div class="additional-text p2"><?= $footer_additional_text; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<div id="modal-callback" class="theme-modal">
    <div class="close-modal">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.419325 0.484998C0.687899 0.216505 1.05212 0.0656738 1.43188 0.0656738C1.81164 0.0656738 2.17586 0.216505 2.44444 0.484998L7.50865 5.54921L12.5729 0.484998C12.843 0.224114 13.2047 0.0797579 13.5803 0.083021C13.9558 0.0862841 14.315 0.236906 14.5805 0.502445C14.8461 0.767984 14.9967 1.12719 14.9999 1.50271C15.0032 1.87822 14.8589 2.24 14.598 2.51011L9.53376 7.57432L14.598 12.6385C14.8589 12.9086 15.0032 13.2704 14.9999 13.6459C14.9967 14.0214 14.8461 14.3807 14.5805 14.6462C14.315 14.9117 13.9558 15.0624 13.5803 15.0656C13.2047 15.0689 12.843 14.9245 12.5729 14.6636L7.50865 9.59943L2.44444 14.6636C2.17432 14.9245 1.81255 15.0689 1.43703 15.0656C1.06152 15.0624 0.70231 14.9117 0.436771 14.6462C0.171232 14.3807 0.0206103 14.0214 0.0173472 13.6459C0.0140841 13.2704 0.15844 12.9086 0.419325 12.6385L5.48354 7.57432L0.419325 2.51011C0.150831 2.24154 0 1.87732 0 1.49755C0 1.11779 0.150831 0.753573 0.419325 0.484998Z"
                  fill="white"/>
        </svg>
    </div>
    <div class="form__holder">
        <div class="form__bg">
            <img src="<?= get_theme_file_uri(); ?>/assets/images/callback-modal-bg.png" alt="">
        </div>

        <?php get_form('callback-modal') ?>
    </div>
</div>

<div id="modal-review" class="theme-modal">
    <div class="close-modal">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.419325 0.484998C0.687899 0.216505 1.05212 0.0656738 1.43188 0.0656738C1.81164 0.0656738 2.17586 0.216505 2.44444 0.484998L7.50865 5.54921L12.5729 0.484998C12.843 0.224114 13.2047 0.0797579 13.5803 0.083021C13.9558 0.0862841 14.315 0.236906 14.5805 0.502445C14.8461 0.767984 14.9967 1.12719 14.9999 1.50271C15.0032 1.87822 14.8589 2.24 14.598 2.51011L9.53376 7.57432L14.598 12.6385C14.8589 12.9086 15.0032 13.2704 14.9999 13.6459C14.9967 14.0214 14.8461 14.3807 14.5805 14.6462C14.315 14.9117 13.9558 15.0624 13.5803 15.0656C13.2047 15.0689 12.843 14.9245 12.5729 14.6636L7.50865 9.59943L2.44444 14.6636C2.17432 14.9245 1.81255 15.0689 1.43703 15.0656C1.06152 15.0624 0.70231 14.9117 0.436771 14.6462C0.171232 14.3807 0.0206103 14.0214 0.0173472 13.6459C0.0140841 13.2704 0.15844 12.9086 0.419325 12.6385L5.48354 7.57432L0.419325 2.51011C0.150831 2.24154 0 1.87732 0 1.49755C0 1.11779 0.150831 0.753573 0.419325 0.484998Z"
                  fill="white"/>
        </svg>
    </div>
    <div class="form__holder">
        <div class="form__bg">
            <img src="<?= get_theme_file_uri(); ?>/assets/images/review-modal-bg.png" alt="">
        </div>

        <?php get_form('review-modal') ?>
    </div>
</div>

<div id="modal-success" class="theme-modal additional-form">
    <div class="close-modal">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.419325 0.484998C0.687899 0.216505 1.05212 0.0656738 1.43188 0.0656738C1.81164 0.0656738 2.17586 0.216505 2.44444 0.484998L7.50865 5.54921L12.5729 0.484998C12.843 0.224114 13.2047 0.0797579 13.5803 0.083021C13.9558 0.0862841 14.315 0.236906 14.5805 0.502445C14.8461 0.767984 14.9967 1.12719 14.9999 1.50271C15.0032 1.87822 14.8589 2.24 14.598 2.51011L9.53376 7.57432L14.598 12.6385C14.8589 12.9086 15.0032 13.2704 14.9999 13.6459C14.9967 14.0214 14.8461 14.3807 14.5805 14.6462C14.315 14.9117 13.9558 15.0624 13.5803 15.0656C13.2047 15.0689 12.843 14.9245 12.5729 14.6636L7.50865 9.59943L2.44444 14.6636C2.17432 14.9245 1.81255 15.0689 1.43703 15.0656C1.06152 15.0624 0.70231 14.9117 0.436771 14.6462C0.171232 14.3807 0.0206103 14.0214 0.0173472 13.6459C0.0140841 13.2704 0.15844 12.9086 0.419325 12.6385L5.48354 7.57432L0.419325 2.51011C0.150831 2.24154 0 1.87732 0 1.49755C0 1.11779 0.150831 0.753573 0.419325 0.484998Z"
                  fill="white"/>
        </svg>
    </div>

    <div class="additional-form__bg">
        <img src="<?= get_theme_file_uri(); ?>/assets/images/additional-form-bg.png" alt="">
    </div>

    <div class="additional-form__content">
        <h2 class="additional-form__title">
            Заявка успешно отправлена
        </h2>

        <div class="additional-form__subtitle p2">
            Скоро мы свяжемся с Вами и уточним детали заказа
        </div>

        <a href="/" class="btn">На главную</a>
    </div>
</div>

<div id="modal-success-review" class="theme-modal additional-form">
    <div class="close-modal">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.419325 0.484998C0.687899 0.216505 1.05212 0.0656738 1.43188 0.0656738C1.81164 0.0656738 2.17586 0.216505 2.44444 0.484998L7.50865 5.54921L12.5729 0.484998C12.843 0.224114 13.2047 0.0797579 13.5803 0.083021C13.9558 0.0862841 14.315 0.236906 14.5805 0.502445C14.8461 0.767984 14.9967 1.12719 14.9999 1.50271C15.0032 1.87822 14.8589 2.24 14.598 2.51011L9.53376 7.57432L14.598 12.6385C14.8589 12.9086 15.0032 13.2704 14.9999 13.6459C14.9967 14.0214 14.8461 14.3807 14.5805 14.6462C14.315 14.9117 13.9558 15.0624 13.5803 15.0656C13.2047 15.0689 12.843 14.9245 12.5729 14.6636L7.50865 9.59943L2.44444 14.6636C2.17432 14.9245 1.81255 15.0689 1.43703 15.0656C1.06152 15.0624 0.70231 14.9117 0.436771 14.6462C0.171232 14.3807 0.0206103 14.0214 0.0173472 13.6459C0.0140841 13.2704 0.15844 12.9086 0.419325 12.6385L5.48354 7.57432L0.419325 2.51011C0.150831 2.24154 0 1.87732 0 1.49755C0 1.11779 0.150831 0.753573 0.419325 0.484998Z"
                  fill="white"/>
        </svg>
    </div>

    <div class="additional-form__bg">
        <img src="<?= get_theme_file_uri(); ?>/assets/images/additional-form-bg.png" alt="">
    </div>

    <div class="additional-form__content">
        <h2 class="additional-form__title">
            Отзыв успешно отправлен
        </h2>

        <div class="additional-form__subtitle p2">
            Отзыв пройдет модерацию и появится на сайте
        </div>

        <a href="/" class="btn">На главную</a>
    </div>
</div>

<div id="modal-error" class="theme-modal additional-form">
    <div class="close-modal">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.419325 0.484998C0.687899 0.216505 1.05212 0.0656738 1.43188 0.0656738C1.81164 0.0656738 2.17586 0.216505 2.44444 0.484998L7.50865 5.54921L12.5729 0.484998C12.843 0.224114 13.2047 0.0797579 13.5803 0.083021C13.9558 0.0862841 14.315 0.236906 14.5805 0.502445C14.8461 0.767984 14.9967 1.12719 14.9999 1.50271C15.0032 1.87822 14.8589 2.24 14.598 2.51011L9.53376 7.57432L14.598 12.6385C14.8589 12.9086 15.0032 13.2704 14.9999 13.6459C14.9967 14.0214 14.8461 14.3807 14.5805 14.6462C14.315 14.9117 13.9558 15.0624 13.5803 15.0656C13.2047 15.0689 12.843 14.9245 12.5729 14.6636L7.50865 9.59943L2.44444 14.6636C2.17432 14.9245 1.81255 15.0689 1.43703 15.0656C1.06152 15.0624 0.70231 14.9117 0.436771 14.6462C0.171232 14.3807 0.0206103 14.0214 0.0173472 13.6459C0.0140841 13.2704 0.15844 12.9086 0.419325 12.6385L5.48354 7.57432L0.419325 2.51011C0.150831 2.24154 0 1.87732 0 1.49755C0 1.11779 0.150831 0.753573 0.419325 0.484998Z"
                  fill="white"/>
        </svg>
    </div>

    <div class="additional-form__bg">
        <img src="<?= get_theme_file_uri(); ?>/assets/images/additional-form-bg.png" alt="">
    </div>

    <div class="additional-form__content">
        <h2 class="additional-form__title">
            Ошибка!
        </h2>

        <div class="additional-form__subtitle p2">
            Во время отправки произошла ошибка, пожалуйста, попробуйте позже!
        </div>

        <a href="/" class="btn">На главную</a>
    </div>
</div>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>

</body>
</html>