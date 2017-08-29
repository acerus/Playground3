<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'a10401_plg3');

/** Имя пользователя MySQL */
define('DB_USER', 'a10401_plg3');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'm7B47sJ2w2');

/** Имя сервера MySQL */
define('DB_HOST', 'a10401.mysql.mchost.ru');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ck$,*GZ.v2-5**d7}5nS>n0a/s0]:p*.8QzL3F}?4Zt$W<|FjI #816``X++(6d.');
define('SECURE_AUTH_KEY',  'M*&OP$mUJcM{6cvjmA(7;&9$v?YQE51/3DBxF(j6:#bZd1, /jypW(){UnBOc)=-');
define('LOGGED_IN_KEY',    'D#<&|MH7dTwYrjqG$:%F;Y[2KeUP*ALG,m$sb>%cc5,KdTA5aEJVJVj7]=0xMkX9');
define('NONCE_KEY',        '|C<>-lW6sU.Jl)92n7cpmOMvZmQL1RP9VXnv_E1N&[YNz{YV7@lUaMiY3<!JJH)k');
define('AUTH_SALT',        '`rq)<zVu>nt-_J;!+&2S5zOu% @gZ~7oBd]4||l1K*T2/gg.aIz&3>r/jGJaY#fQ');
define('SECURE_AUTH_SALT', '=PyRHh0}.Z}{t@:<~8FC3Mr$h[Fz3C)QPbv,Tw3fIQGGA%=kbZ?>Ry5G<!%9^QDf');
define('LOGGED_IN_SALT',   'ri<J+Je>:,VZp.[ME=H_l?&aTqp6XR`i6l,5;.6p87G[L9SXw<q#[}Wf2)F`Q^_l');
define('NONCE_SALT',       'WC *=wtnryL#>$Km!n8?^GE#b9s,f )W0]k[%m=1Jt~C65=K6Yq{XqX;a>MOKrP7');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'pd8dd_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
