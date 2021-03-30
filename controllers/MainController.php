<?php

require_once ROOT  . '/View.php';
require_once ROOT . '/models/Restaurant.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MainController {
  public function index() {
    $view = new View("main/index");
  }

  public function aboutUs() {
    $view = new View("main/about-us");
  }

  public function blog() {
    $view = new View("main/blog");
  }

  public function restaurant() {
    $view = new View("main/restaurant");
    $model = new Restaurant();
    $restaurants = $model->show();
    $view->assign('restaurants', $restaurants);
  }
}