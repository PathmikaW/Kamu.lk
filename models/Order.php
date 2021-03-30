<?php

require_once ROOT . "/Database.php";

class Order extends Database {
  public function showRestaurant() {
    $sql = "select * from seller";
    $query = $this->con->query($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
 }

 public function showMenu($id) {

    $sql="SELECT distinct menu_item.item_name , menu_item.price FROM menu_item,seller WHERE seller.res_id = $id and seller.res_id = menu_item.res_id";
    $query = $this->con->query($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
 }
  public function countPost(){

    $sql = "SELECT * FROM post WHERE post_id= '1'";
    $query = $this->con->query($sql);
    $query->execute();
    $count = $query->rowCount();
    return $count;

  }

  public function countOrder(){

    $sql = "SELECT * FROM post WHERE post_id='1'";
    $query = $this->con->query($sql);
    $query->execute();
    $count = $query->rowCount();
    return $count;
      
  }

  public function countReqMealplan(){
    $sql = "SELECT * FROM reply WHERE users_id='1'";
    $query = $this->con->query($sql);
    $query->execute();
    $count = $query->rowCount();
    return $count;
      

  }

}