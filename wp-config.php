<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', '7147.localhost' );

/** Имя пользователя базы данных */
define( 'DB_USER', '7147.localhost' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '7147.localhost' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd7U>^0X1Gr<[966L$z}b1aEs#%eteKKemyLo=t Y>G9l!y(RhuC]Fu{/xT@*`&+O' );
define( 'SECURE_AUTH_KEY',  'a,jhxwu.P>s7X`|>LTXVee%a/b-Wo{b<&Rv6Hr@>z4:T2{4Mi,]qJW2GoB~wo!$*' );
define( 'LOGGED_IN_KEY',    '@gto[/y=R#r>V~kmX3H+;=n|rMl(vD}Rj7L86$r6<+R?;DY5qkb4_*.zw,@E<V`J' );
define( 'NONCE_KEY',        'YUxwQb:=b]e9v?H9<oErFc}J^L2|GGjc<#fh%!&Shq~*fovy@xb(U1xF~nSR46h%' );
define( 'AUTH_SALT',        'L?b I=*jq&#*jKoFCf*+ -0Iz|M7[Q^/AK@~#.sw{e$>5C9}rbS;_cjd=-:mxN)w' );
define( 'SECURE_AUTH_SALT', 'D&Kst5C^KkFrtSguf=Y7zSc5f/hFp{`;=K~1v/$yH$zoky~vQW2N;L6I!V/QTADU' );
define( 'LOGGED_IN_SALT',   '}rYHog(;u2{H^+K#XnWAb(NJ!D pB6W6,1yjhH@`;=E8 4>2_~;8XyCE-@4p*rWn' );
define( 'NONCE_SALT',       'r>L.z9h7Xn0`dz4kvtaLz-xoAu)vw+9`0?Ec^GeJb,m6<rj*yn!b43QnLCTF.$.~' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
