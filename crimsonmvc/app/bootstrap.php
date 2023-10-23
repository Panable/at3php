<?php
require_once 'config/config.php';
//    require_once 'libraries/core.php';
//    require_once 'libraries/controller.php';
//    require_once 'libraries/Database.php';

require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
