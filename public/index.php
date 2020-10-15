<?php

require_once "../config/conf.php";
require_once ("../app/initautoloader.php");
use Balobasta\lib\Router;

echo Router::run($_SERVER['REQUEST_URI']);