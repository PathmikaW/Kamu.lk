<?php

require_once ROOT  . '/View.php';
require_once ROOT . "/models/Driver.php";

class DriverController {
  // driver/dash
  public function dash() {
    $view = new View("driver/dash");
  }

  // driver/accept-orders
  public function acceptOrders() {
    $model = new Driver();
    $data = $model->getOrders();
    $view = new View("driver/accept-orders");
    $view->assign("data", $data);
  }

  //contact admin
  public function contactAdmin()
  {
    $id = $_GET['id'];
    $model = new Driver();
    $user = $model->findUserById($id);
    // print_r($user);
    // die();
    $data = [
      'id' => '',
      'username' => '',
      'email' => '',
      'subject' => '',
      'message' => '',
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $_GET['id'],
        'username' => $user['username'],
        'email' => $user['email'],
        'subject' => trim($_POST['subject']),
        'message' => trim($_POST['message'])
      ];


      $model = new Driver();
      if ($model->sendMessage($data)) {
        echo "<script>alert('Successfully Sent!')</script>";
      } else {
        die('Something went wrong.');
      }
    }
    $model = new Driver();

    $view = new View("driver/contact-admin");
  }



  // driver/earnings
  public function earnings() {
    $view = new View("driver/earnings");
  }

  // driver/edit-profile
  public function editProfile() {
    $view = new View("driver/edit-profile");
  }

  // driver/my-profile
  public function myProfile() {
    $view = new View("driver/my-profile");
  }


  public function logout()
  {
    $view = new View("driver/logout");
  }



}