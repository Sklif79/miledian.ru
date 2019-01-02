<?php
/**
* Основные параметры WordPress.
*
* Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
* секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
* на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
*
* Этот файл используется сценарием создания wp-config.php в процессе установки.
* Необязательно использовать веб-интерфейс, можно скопировать этот файл
* с именем "wp-config.php" и заполнить значения.
*
* @package WordPress
*/

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'sklif_0');

/** Имя пользователя MySQL */
define('DB_USER', 'sklif_0');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'eXjvmuDK');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/* отключение автообновлений*/
define( 'WP_AUTO_UPDATE_CORE', false );

/**#@+
* Уникальные ключи и соли для аутентификации.
*
* Смените значение каждой константы на уникальную фразу.
* Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
* Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
*
* @since 2.6.0
*/
define('AUTH_KEY',         '8bs%MZQ].W@x %O@+[7ick?wi4kX22cRF9DeC7oh{&A*+)H_jjIT_p*c+BSy|U&m');
define('SECURE_AUTH_KEY',  'RdP,tN0Wo&*#9BVc6z#S]`g#WEcK85 UyRIMv6lpe<GM;<+0N5cd~1gK`Cc3?R2P');
define('LOGGED_IN_KEY',    ' ,iZ|:G9!r MU,a=F.lZWn6e+eRDW1z5uaZZ:~U.v$z=*y~b.9pgvp=SS*`C?-2b');
define('NONCE_KEY',        'JnYDz;=PC%HSt `j|g( iJ:Vwj=/i|8y`BfzQCz* 4&4j_aZ#5*|<{/+7m[eaMcV');
define('AUTH_SALT',        ' +*Oo2btu_H=7]<v1pRt%sP<TIJIjOf{Q{R5$n`AnrA{y-+t3|$a#;9Sm#/|(#UU');
define('SECURE_AUTH_SALT', 'pW7vV&7](f>?}PO:5cc^Bj#/])R+qJ24+Vs4Oy;]fRHb*6};9u*z_&P/=]`)iH$/');
define('LOGGED_IN_SALT',   ';u4J/pg|VNgcGhl-%+R;%wN;=Qx@?fy%8dxzP+-a2fB+uc?=[`nR?NJ_||mi<;1%');
define('NONCE_SALT',       'S#id-L+$y^/p~z4bp{*J=pSpdw!PW*o}`S5M}CSz(4n$^hX&<PAzAT+q-+so2fFi');

/**#@-*/

/**
* Префикс таблиц в базе данных WordPress.
*
* Можно установить несколько блогов в одну базу данных, если вы будете использовать
* разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
*/
$table_prefix  = 'if0fgrta_';

/**
* Язык локализации WordPress, по умолчанию английский.
*
* Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
* для выбранного языка должен быть установлен в wp-content/languages. Например,
* чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
* и присвойте WPLANG значение 'ru_RU'.
*/
define('WPLANG', 'ru_RU');
define("WP_CACHE", true);
define('WP_POST_REVISIONS', false);
/**
* Для разработчиков: Режим отладки WordPress.
*
* Измените это значение на true, чтобы включить отображение уведомлений при разработке.
* Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
* в своём рабочем окружении.
*/
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');


