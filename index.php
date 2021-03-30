<?php

$dir_name = dirname($_SERVER['SCRIPT_NAME']);

define('ROOT', __DIR__);

// url => http://localhost:81/mvcp/user/add-post
// url => user/add-post
$url = trim(substr_replace(trim($_SERVER['REQUEST_URI'], '/'), '', 0, strlen($dir_name)), "?");

// associative arrays
$routes = [

  //main controllers
    'main/index' => 'MainController@index',
    'main/about-us' => 'MainController@aboutUs',
    'main/blog' => 'MainController@blog',
    'main/restaurant' => 'MainController@restaurant',

  //authentication controller
    'auth/login' => 'AuthController@login',
    'auth/signup-user' => 'AuthController@signUpUser',
    'auth/signup-seller' => 'AuthController@signUpSeller',
    'auth/forgot-password' => 'AuthController@forgotPassword',
    'auth/reset-password' => 'AuthController@resetPassword',

  //admin Controllers
  'admin/admin' => 'AdminController@admin',
  'admin/admin' => 'AdminController@totalUsers',
  'admin/admin-report' => 'AdminController@adminReport',
  'admin/admin-report' => 'AdminController@showReport',
  'admin/user-view' => 'AdminController@viewUser',
  'admin/user-add' => 'AdminController@addUser',
  'admin/user-update' => 'AdminController@updateUser',
  'admin/user-delete' => 'AdminController@deleteUser',
  'admin/inbox-view' => 'AdminController@viewInbox',
  'admin/inbox-update' => 'AdminController@updateMessages',
  'admin/inbox-delete' => 'AdminController@deleteMessages',
  'admin/income-add' => 'AdminController@addTransaction',
  'admin/payable-view' => 'AdminController@viewPayable',
  'admin/recievable-view' => 'AdminController@viewRecievable',
  'admin/payable-update' => 'AdminController@payableUpdate',
  'admin/recievable-update' => 'AdminController@recievableUpdate',
  'admin/payable-delete' => 'AdminController@payableDelete',
  'admin/recievable-delete' => 'AdminController@recievableDelete',
  'admin/manage-users' => 'AdminController@manageUsers',
  'admin/manage-posts' => 'AdminController@managePosts',
  'admin/seller-request' => 'AdminController@viewRequest',
  'admin/seller-accept' => 'AdminController@acceptRequest',
  'admin/seller-delete' => 'AdminController@deleteRequest',
  'admin/reply-add' => 'AdminController@sendReply',
  'admin/map' => 'AdminController@map',
  'admin/income' => 'AdminController@income',
  'admin/logout' => 'AdminController@logout',

  //user
    'user/user-dash' => 'UserController@userDash',
    'user/add-post' => 'UserController@addPost',
    'user/view-post' => 'UserController@viewPost',
    'user/update-post' => 'UserController@updatePost',
    'user/delete-post' => 'UserController@deletePost',
    'user/contact-admin' => 'UserController@contactAdmin',
    'user/contact-nutritionist' => 'UserController@contactNutritionist',
    'user/request-meal-plan' => 'UserController@requestMealPlan',
    'user/order-food' => 'UserController@orderFood',
    'user/restaurent-menu' => 'UserController@restaurentMenu',
    'user/user-profile' => 'UserController@UserProfile',
    'user/change-password' => 'UserController@changePassword',
    'user/logout' => 'UserController@logout',
  

  //nutritionist controller
    'nutritionist/dashboard' => 'NutritionistController@dashboard',
    'nutritionist/food-add' => 'NutritionistController@addFood',
    'nutritionist/food-view' => 'NutritionistController@viewFood',
    'nutritionist/food-update' => 'NutritionistController@updateFood',
    'nutritionist/food-delete' => 'NutritionistController@deleteFood',
    'nutritionist/request-list' => 'NutritionistController@requestList',
    'nutritionist/mealplan-ignore' => 'NutritionistController@ignoreMealPlan',
    'nutritionist/mealplan-add' => 'NutritionistController@addMealPlan',
    'nutritionist/mealplan-view' => 'NutritionistController@viewMealPlan',
    'nutritionist/mealplan-delete' => 'NutritionistController@deleteMealPlan',
    'nutritionist/post-add' => 'NutritionistController@addPost',
    'nutritionist/post-view' => 'NutritionistController@viewPost',
    'nutritionist/post-update' => 'NutritionistController@updatePost',
    'nutritionist/post-delete' => 'NutritionistController@deletePost',
    'nutritionist/contact-admin' => 'NutritionistController@contactAdmin',
    'nutritionist/my-profile' => 'NutritionistController@myProfile',
    'nutritionist/change-password' => 'NutritionistController@changePassword',
    'nutritionist/inbox' => 'NutritionistController@inbox',
    'nutritionist/send-reply' => 'NutritionistController@sendReply',
    'nutritionist/logout' => 'NutritionistController@logout',
    
  //seller controller
  'seller/dash' => 'SellerController@dash',
  'seller/edit-restaurant-details' => 'SellerController@editRestaurantDetails',
  'seller/add-food-item' => 'SellerController@addFoodItem',
  'seller/edit-food-item' => 'SellerController@editFoodItem',
  'seller/my-profile' => 'SellerController@myProfile',
  'seller/view-food-item' => 'SellerController@viewFoodItem',
  'seller/view-order' => 'SellerController@viewOrder',
  'seller/order-history' => 'SellerController@orderHistory',
  'seller/contact-admin' => 'SellerController@contactAdmin',
  'seller/accept-order' => 'SellerController@acceptOrder',
  'seller/reject-order' => 'SellerController@rejectOrder',
  'seller/assign-driver' => 'SellerController@assignDriver',
  'seller/logout' => 'SellerController@logout',
  'seller/change-password' => 'SellerController@changePassword',


  //driver
  'driver/dash' => 'DriverController@dash',
  'driver/accept-orders' => 'DriverController@acceptOrders',
  'driver/contact-admin' => 'DriverController@contactAdmin',
  'driver/delivery-history' => 'DriverController@deliveryHistory',
  'driver/earnings' => 'DriverController@earnings',
  'driver/edit-profile' => 'DriverController@editProfile',
  'driver/my-profile' => 'DriverController@myProfile',
  'driver/update-location' => 'DriverController@updateLocation',
];

$found = false;
$request_path_only = explode("?", $url)[0];

foreach($routes as $route => $name) {
  if ($route === $request_path_only) {
    $found = true;
    // UserController@addPost
    $split = explode("@", $name);
    // [UserController, addPost]
    $controller_file = $split[0];
    $method = $split[1];

    require_once __DIR__ . "/controllers/" . $controller_file . ".php";
    $controller = new $controller_file();
    call_user_func([$controller, $method]);
  }
}



if ($found == false) {
  echo "404 Page Not Found";
}