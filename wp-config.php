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
define('DB_NAME', 'dbzaval');

/** Имя пользователя MySQL */
define('DB_USER', 'userzaval');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Smp0*74%(M9phC');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

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
 define('WP_HOME','http://zaval.water-dev.ru'); 
define('WP_SITEURL','http://zaval.water-dev.ru');

define('AUTH_KEY',         '9Rxc?By;k5Gx~n2l6jCzJ!!6 Jyu|?q`Mg72pUH@e5p)-nOwzM1hao:ECqNi6y6}');
define('SECURE_AUTH_KEY',  'g4O`tWBXYVb->/`&Mb?9H])LD?DLk&}T7w%#on;DAdiTUttH<Bq6AS+TF4C-l397');
define('LOGGED_IN_KEY',    'o*}T*_151UjnU<SAhJ^S;Mc>XafJHFhh6-0E8+^T<!1+<j[;nTeX.leYI/|b*2^v');
define('NONCE_KEY',        'x9Q|;3]n#L mSW`jVw$v{x!+*YS4f @{RQ<U2S@=:65DLVY|-x$R(]{J7$j::n:Z');
define('AUTH_SALT',        ' ay@LQ$Zk4|F|7gm$^-g;k9Z)+c*pRm_!n#uE*IwysbcOyCkrgPI^xV^uCt:Z|m0');
define('SECURE_AUTH_SALT', 'O|6@qT+vT[bh9O>v4.TPpy91BJMd1p|KlB1,  ,QFL:Q^#3uN66S3xvZ/MRk.@u0');
define('LOGGED_IN_SALT',   ';e$AM*=ksaMBilop}ec)n&e_8-meJGpm@dM3NKg]@m[pw^-<q-iX;P=g1)kqV4.6');
define('NONCE_SALT',       'P-!nnBDsKE?Lz^XCIrn8N* q!>,bzeOLB!{z!^Z@NF.vNLN7RL[!3P*[+5UiD~gs');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'fd_';

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
define('ABSPATH', __DIR__ . '/');
/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
