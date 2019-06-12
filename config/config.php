<?php
/**
 * Created by PhpStorm.
 * User: a71
 * Date: 2019/3/28
 * Time: 10:59
 */
require 'dbconfig.php';

define('DEBUG_MODE', true);

define('HOST_URL', 'http://myphp.com/public');

define('REDIS_ROOT', 'test:');

define('SESSION_TIMEOUT', 86400);

define('SESSION_TABLE_NAME', 'SESSION:');

define('SESSION_NAME', 'NOVASID');

define('COOKIE_PATH', '/');

define('COOKIE_DOMAIN', '');