<?php

require_once("Classes/Models/MainPageModel.php");
require_once("Classes/Controllers/MainPageController.php");
require_once("Classes/Views/MainPageView.php");
require_once('core/init.php');

$model = new MainPageModel();
$controller = new MainPageController($model);
$view = new MainPageView($model, $controller);

if(isset($_GET['action']) && !empty($_GET['action'])) {

	$controller->{$_GET['action']}();

}

echo $view->output();