<?php

require_once("Classes/Models/MainPageModel.php");
require_once("Classes/Controllers/MainPageController.php");
require_once("Classes/Views/MainPageView.php");
require_once('core/init.php');
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array('debug' => true));

$twig->addExtension(new Twig_Extension_Debug());

$model = new MainPageModel();
$controller = new MainPageController($model);
$view = new MainPageView($model, $controller);

//if(isset($_GET['action']) && !empty($_GET['action'])) {
//
//	$controller->{$_GET['action']}();
//
//}

//echo $view->output();
echo $twig->render("alternatemainpage.html", array(

	'news' 		=> "Nyheter!",
	'description' 	=> $model->getDescription(),
	'members' 	=> $model->getMembers(),
	'quote' 	=> array(
				'Review' => "Vilde släpper in världen i sin svenska folkmusik. De påminner om de där gatumusikanterna som man snubblade över någonstans i Europa. Gatumusikanterna som man aldrig glömde.",
				'Info' 	 => "UNT 2011-08-10"
			), 
	'nextGig' 	=> array(
				'Date' => '1/6',
				'Venue' => 'Simons födelsedag',
				'City' => 'Stockholm'
			),	
	'upcomingGigs' 	=> array(
				'0' => array(
					'Date' => '1/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),
				'1' => array(
					'Date' => '2/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),
				'2' => array(
					'Date' => '3/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),
				'3' => array(
					'Date' => '4/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),
				'4' => array(
					'Date' => '5/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),
				'5' => array(
					'Date' => '6/6',
					'Venue' => 'Simons födelsedag',
					'City' => 'Stockholm' 
				),

			),
	'playedGigs' 	=> $model->getPlayedGigs(),
	'contactInformation' => $model->getContactInformation()
));


