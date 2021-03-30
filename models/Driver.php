<?php

require_once ROOT . "/Database.php";

class Driver extends Database {

    //accept orders
    public function getOrders() {
        $sql = "select orderh.id, orderh.ddate, orderh.customer_name, sd.address, sd.tele from orderh, shipping_details as sd where orderh.id = sd.order_id and orderh.driver_id = 1";
        $query = $this->con->query($sql);
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
//find driver
    public function findUserById($id)
    {
      $sql = "SELECT * FROM deliverydriver WHERE id='$id'";
      $query = $this->con->query($sql);
      $query->execute();
      $data = $query->fetch(PDO::FETCH_ASSOC);
      return $data;
    }
//send message
    public function sendMessage($data)
  {
    $id = $data['id'];
    $email = $data['email'];
    $username = $data['username'];
    $subject = $data['subject'];
    $message = $data['message'];

    $sql = "INSERT INTO contact_admin (user_id,username,email,subject,message) VALUES (' $id', '$username', '$email', '$subject','$message')";
    if ($this->con->query($sql)) {
      return true;
    } else {
      return false;
    }
  }


}