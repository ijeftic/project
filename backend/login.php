<?php
require_once('db_connection.php');

session_start();

$request=$_POST;

if(isset($request) && !empty($request)){
   $email = htmlentities($request['email']);
   $password = htmlentities($request['password']);
   
   if($email=="" || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
       echo 'Email is either empty or invalid.';
       die();
   }
   
   if($password=="" || empty($password) || strlen((string) $password) < 6) {
       echo 'Password is either empty or invalid.';
       die();
   }
   
   $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_object($result);
        $_SESSION['user'] = $user;
        header('Location:/project/portal/index.php');
    } else {
        echo "Error logging you in.";
    }
}