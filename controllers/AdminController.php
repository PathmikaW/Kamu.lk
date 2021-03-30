<?php

require_once ROOT  . '/View.php';
require_once ROOT . '/models/User.php';
require_once ROOT . '/models/Message.php';
require_once ROOT . '/models/Stats.php';
require_once ROOT . '/models/Transaction.php';
require_once ROOT . '/models/Request.php';
require_once ROOT . '/models/Seller.php';

class AdminController {

  //----------------- Dash Board Statistics View ---------------------//
  public function totalUsers(){
    $model = new Stats();

    $countAdmin= $model->countAdmin();
    $countNutritionist= $model->countNutritionist();
    $countReguser= $model->countReguser();
    $countSeller= $model->countSeller();
    $countDriver= $model->countDriver();
    $orderDelivered= $model->orderDelivered();
    $orderOnprocess= $model->orderOnprocess();
    $orderCancelled= $model->orderCancelled();
    $orderRejected= $model->orderRejected();
    $consultancyChecked= $model->consultancyChecked();
    $consultancyOnprocess= $model->consultancyOnprocess();
    $consultancyCancelled= $model->consultancyCancelled();
    $consultancyRejected= $model->consultancyRejected();

    $view = new View("admin/admin");

    $view->assign('adminCount', $countAdmin);
    $view->assign('nutritionistCount', $countNutritionist);
    $view->assign('reguserCount', $countReguser);
    $view->assign('sellerCount', $countSeller);
    $view->assign('driverCount', $countDriver);
    $view->assign('deliveredOrder', $orderDelivered);
    $view->assign('processOrder', $orderOnprocess);
    $view->assign('cancelledOrder', $orderCancelled);
    $view->assign('rejectedOrder', $orderRejected); 
    $view->assign('checkedRequest', $consultancyChecked);
    $view->assign('processRequest', $consultancyOnprocess);
    $view->assign('cancelledRequest', $consultancyCancelled);
    $view->assign('rejectedRequest', $consultancyRejected);  
  }

//----------------- Report Page Statistics View ---------------------//

  public function showReport(){
    $model = new Stats();
    $countAllUsers= $model->countAllUsers();
    $countMealRequest= $model->countMealRequest();
    $countNutritionist= $model->countNutritionist();
    $countReguser= $model->countReguser();
    $countSeller= $model->countSeller();
    $countDriver= $model->countDriver();
    $countOrders= $model->countOrders();
    $calculateRevenue= $model->calculateRevenue();
    $calculatePayable= $model->calculatePayable();
    $calculateRecievable= $model->calculateRecievable();

    $view = new View("admin/admin-report");
    $view->assign('allUserCount', $countAllUsers);
    $view->assign('allMealPlan', $countMealRequest);
    $view->assign('nutritionistCount', $countNutritionist);
    $view->assign('reguserCount', $countReguser);
    $view->assign('sellerCount', $countSeller);
    $view->assign('driverCount', $countDriver);
    $view->assign('orderCount', $countOrders);
    $view->assign('totalRevenue', $calculateRevenue);
    $view->assign('totalPayable', $calculatePayable);
    $view->assign('totalRecievable', $calculateRecievable);
  }
  
//----------------- Add User Controller ---------------------//
  public function addUser() {
    $data = [
      'id' => '',
      'email' => '',
      'username' => '',
      'password' => '',
      'user_type_id' => '',
      'Error' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'user_type_id' => trim($_POST['user_type_id']),
        'Error' => ''
      ];

      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
//----------------- Check User Existance Controller ---------------------//
      $model = new User();
      if ($model->findUser($data['username'])) {
        $data['Error'] = 'User is already inserted';
      }

    if (empty($data['Error'])){
      $model = new User();
      if ($model->addUser($data)){
        header('location: user-view');
      } else {
          die('Something went wrong.');
      }
    }  
  }
    $view = new View("admin/user-add");
    $view->assign('Error', $data['Error']);
  }

  public function viewUser() {
    $view = new View("admin/user-view");
    $model = new User();
    $users = $model->show();
    $view->assign('users', $users);
  }

  public function updateUser(){
    $id = $_GET['id'];
    $model = new User();
    $users = $model->findUserById($id);
    
    
    $type = $model->findUserType($users['user_type_id']);
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $_GET['id'],
        'email' => trim($_POST['email']),
        'username' => trim($_POST['username']),
        'user_type_id' => trim($_POST['user_type_id']),
        'Error' => ''
      ];

      $model = new User();
      if ($model->update($data)) {
        header('location: user-view');
      } else {
          die('Something went wrong.');
      }
    }

    $view = new View("admin/user-update");
    $view->assign('id', $users['id']);
    $view->assign('email', $users['email']);
    $view->assign('username', $users['username']);
    $view->assign('password', $users['password']);
    $view->assign('user_type_id', $users['user_type_id']);
    $view->assign('user_type', $type['type']);  
  }

  public function deleteUser(){
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $model = new User();
      if($model->delete($id)) {
        header('location: user-view');
      } else {
        die('Something went wrong!');
      }
    }
  }

// -----------*----------*---------*------Inbox (View/Update/Delete)---*-----------*-----------*--------------*-------//
    public function sendReply(){
    $id = $_GET['id'];
    $model = new Message();
    $users = $model->findMessageById($id);
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'inbox_id' => $_GET['inbox_id'],
        'from_id' => $_GET['from_id'],
        'to_id' => $_GET['to_id'],
        'email' => trim($_POST['email']),
        'subject' => trim($_POST['subject']),
        'reply' => trim($_POST['reply']),
        'Error' => ''
      ];

      $model = new Message();
      if ($model->addReply($data)) {
        header('location: inbox-view');
      } else {
          die('Something went wrong.');
      }
    }

    $view = new View("admin/reply-add");
    $view->assign('inbox_id', $users['inbox_id']);
    $view->assign('from_id', $users['from_id']);
    $view->assign('to_id', $users['to_id']);
    $view->assign('email', $users['email']);
    $view->assign('subject', $users['subject']);
  }



    /*public function sendReply() {
      $data = [
        'reply_id' => '',
        'inbox_id' => '',
        'from_id' => '',
        'to_id' => '',
        'email' => '',
        'subject' => '',
        'reply' => '',
        'Error' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'inbox_id' => trim($_POST['inbox_id']),
          'from_id' => trim($_POST['from_id']),
          'to_id' => trim($_POST['to_id']),
          'email' => trim($_POST['email']),
          'subject' => trim($_POST['subject']),
          'reply' => trim($_POST['reply']),
          'Error' => ''
        ];

      
    //----------------- Check User Existance Controller ---------------------//
        $model = new Message();
        if ($model->findMessage($data['inbox_id'])) {
          $data['Error'] = 'Reply is already inserted';
        }

      if (empty($data['Error'])){
        $model = new Message();
        if ($model->addReply($data)){
          header('location: inbox-view');
        } else {
            die('Something went wrong.');
        }
      }  
    }
      
    $view = new View("admin/reply-add");
    $view->assign('Error', $data['Error']);
  }*/


  public function viewInbox() {
    $view = new View("admin/inbox-view");
    $model = new Message();
    $users = $model->showMessage();
    $view->assign('users', $users);
  }

  /*public function updateMessages(){
    $id = $_GET['id'];
    $model = new Message();
    $users = $model->findMessageById($id);
    
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'inbox_id' => $_GET['inbox_id'],
        'from_id' => $_GET['from_id'],
        'to_id' => $_GET['to_id'],
        'email' =>$_GET['email'],
        'subject' => $_GET['subject'],
        'message' => $_GET['message'],
        'status' => $_GET['status'],
        'Error' => ''
      ];

    

      $model = new Message();
      if ($model->updateInbox($users)) {
        header('location: inbox-view');
      } else {
          die('Something went wrong.');
      }
    }

    $view = new View("admin/inbox-view");
    $view->assign('inbox_id', $users['inbox_id']);
    $view->assign('from_id', $users['from_id']);
    $view->assign('to_id', $users['to_id']);
    $view->assign('email', $users['email']);
    $view->assign('subject', $users['subject']);
    $view->assign('message', $users['message']);
    $view->assign('status', $users['status']);
    
  }*/

  public function deleteMessages(){
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $model = new Message();
      if($model->deleteMessage($id)) {
        header('location: inbox-view');
      } else {
        die('Something went wrong!');
      }
    }
  }


  //---------------*----------------------Transaction Functions Control--------------------*----------------------*--------//
    
  public function addTransaction() {
      $data = [
        'trans_id' => '',
        'order_id' => '',
        'user_id' => '',
        'date' => '',
        'payment_type' => '',
        'amount' => '',
        'status' => '',
        'Error' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'order_id' => trim($_POST['order_id']),
          'user_id' => trim($_POST['user_id']),
          'date' => trim($_POST['date']),
          'payment_type' => trim($_POST['payment_type']),
          'amount' => trim($_POST['amount']),
          'status' => trim($_POST['status']),
          'Error' => ''
      ];

      //Check if Transaction already recorded.
      $model = new Transaction();
      if ($model->findTransaction($data['trans_id'])) {
        $data['Error'] = 'Transaction is already inserted';
      }

      if (empty($data['Error'])){
        $model = new Transaction();
        if ($model->addTransaction($data)) {
          header('location: recievable-view');
        } else {
            die('Something went wrong.');
        }
      } 
    }
      $view = new View("admin/income-add");
      $view->assign('Error', $data['Error']);
    }

    public function viewPayable(){
      $view = new View("admin/payable-view");
      $model = new Transaction();
      $trans = $model->showPayable();
      $view->assign('trans', $trans);
    }

    public function viewRecievable(){
      $view = new View("admin/recievable-view");
      $model = new Transaction();
      $trans = $model->showRecievable();
      $view->assign('trans', $trans);
    }

    public function payableUpdate(){
      $id = $_GET['id'];
      $model = new Transaction();
      $trans = $model->findTransactionById($id);

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'trans_id' => $_GET['trans_id'],
          'order_id' => trim($_POST['order_id']),
          'user_id' => trim($_POST['user_id']),
          'date' => trim($_POST['date']),
          'payment_type' => trim($_POST['payment_type']),
          'amount' => trim($_POST['amount']),
          'status' => trim($_POST['status']),
          'Error' => ''
        ];

        $model = new Transaction();
        if ($model->updatePayable($data)) {
          header('location: payable-view');
        } else {
            die('Something went wrong.');
        }
      }

      $view = new View("admin/payable-update");
      $view->assign('trans_id', $trans['trans_id']);
      $view->assign('order_id', $trans['order_id']);
      $view->assign('user_id', $trans['user_id']);
      $view->assign('date', $trans['date']);
      $view->assign('payment_type', $trans['payment_type']);
      $view->assign('amount', $trans['amount']);
      $view->assign('status', $trans['status']);
      
    }

    public function payableDelete(){
      $id = $_GET['id'];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $model = new Transaction();
        if($model->deletePayable($id)) {
          header('location: payable-view');
        } else {
          die('Something went wrong!');
        }
      }
    }

    public function recievableUpdate(){
      $id = $_GET['id'];
      $model = new Transaction();
      $trans = $model->findTransactionById($id);

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'trans_id' => $_GET['trans_id'],
          'order_id' => trim($_POST['order_id']),
          'user_id' => trim($_POST['user_id']),
          'date' => trim($_POST['date']),
          'payment_type' => trim($_POST['payment_type']),
          'amount' => trim($_POST['amount']),
          'status' => trim($_POST['status']),
          'Error' => ''
        ];

        $model = new Transaction();
        if ($model->updateRecievable($data)) {
          header('location: recievable-view');
        } else {
            die('Something went wrong.');
        }
      }

      $view = new View("admin/recievable-update");
      $view->assign('trans_id', $trans['trans_id']);
      $view->assign('order_id', $trans['order_id']);
      $view->assign('user_id', $trans['user_id']);
      $view->assign('date', $trans['date']);
      $view->assign('payment_type', $trans['payment_type']);
      $view->assign('amount', $trans['amount']);
      $view->assign('status', $trans['status']);
      
    }

    public function recievableDelete(){
      $id = $_GET['id'];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $model = new Transaction();
        if($model->deleteRecievable($id)) {
          header('location: recievable-view');
        } else {
          die('Something went wrong!');
        }
      }
    }
    //--------------------------------------*******************--------------------*****************---------------//

    public function viewRequest() {
      $model = new Request();
      $users = $model->showRequest();
      $view = new View("admin/seller-request");
      $view->assign('users', $users);
    }

    public function acceptRequest() {
      $id = $_GET['id'];
      $model = new Seller();
      $seller = $model->findSellerByID($id);
      // print_r($seller);
      // die();
      $model = new Request();
      if($model->acceptSeller($seller)){
      //   print_r($seller);
      // die();
        header('location: user-view');
      }
      $view = new View("admin/accept-request");
    }



    public function deleteRequest(){
      $id = $_GET['id'];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $model = new Request();
        if($model->removeRequest($id)) {
          header('location: seller-request');
        } else {
          die('Something went wrong!');
        }
      }
    }






    //--------------------------------------*******************--------------------*****************---------------//


    public function manageUsers() {
      $view = new View("admin/manage-users");
    }

    public function admin() {
      $view = new View("admin/admin");
    }

    public function adminInbox() {
      $view = new View("admin/admin-inbox");
    }
    
    public function adminReport() {
      $view = new View("admin/admin-report");
    }

    public function manageSellerRequest() {
      

      $view = new View("admin/seller-request");
    }

    public function map() {
      $view = new View("admin/map");
    }

    public function income() {
      $view = new View("admin/income");
    }

    public function managePosts() {
      $view = new View("admin/manage-posts");
    }
    public function logout() {
      $view = new View("admin/logout");
    }
}