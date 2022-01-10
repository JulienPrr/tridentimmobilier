<?php

require 'public/util.php';
require_once 'controllers/Router.php';
initPhpSession();
$router = new Router();
$router->routeReq();
 ?>
