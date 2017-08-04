<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', '.yiidemo.com'); //注意domain.com换成你自己的域名
ini_set('session.cookie_lifetime', '3600');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../components/QueryList/vendor/autoload.php');
require(__DIR__ . '/../components/guzzle/vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
