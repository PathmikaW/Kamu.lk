<?php

require_once ROOT . "/Database.php";

class Request extends Database {

    public function showRequest() {
      $sql = "SELECT * FROM req_seller";
      $query = $this->con->query($sql);
      $query->execute();
      $data = $query->fetchAll();
      return $data;
    } 

    public function removeRequest($id){
      $sql = "DELETE FROM seller WHERE res_id = '$id'";
      if($this->con->query($sql)){
        return true;
      }else{
        return false;
      }
    }

    public function acceptSeller($data) {
    
    $resname = $data['resname'];
    $resaddress = $data['resaddress'];
    $sellername = $data['sellername'];
    $tele = $data['phonenumber'];
    $email = $data['email'];
    $password = $data['password'];
    $user_type_id = $data['user_type_id'];
    $res = "Restaurant";

    $sql = "INSERT INTO users (email,username,password,user_type_id) VALUES ('$email', '$sellername', '$password', '$user_type_id')";
    

    if($this->con->query($sql)){
      $sql1 = "SELECT * FROM users WHERE username='$sellername'";
      $query = $this->con->query($sql1);
      $query->execute();
      $data = $query->fetch(PDO::FETCH_ASSOC);
      
      $user_id = $data['id'];
      $sellername = $data['username'];
      $email = $data['email'];
      $password = $data['password'];

      $sql2 = "INSERT INTO seller (res_id,resname,resaddress,sellername,phonenumber,email,password,businesstype) VALUES ('$user_id','$resname', '$resaddress', '$sellername', '$tele', '$email', '$password','$res')";
      if($this->con->query($sql2)){
        $sql = "DELETE FROM req_seller WHERE email = '$email'";
        if($this->con->query($sql)){
          return true;
        }else{
          return false;
        }
      }else{
          return false;
      }
    }else
        return false;


    }



    
}