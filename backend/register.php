<?php
require_once('../models/User.php');
require_once('db_connection.php');

session_start();

$request=$_POST;

if(isset($request) && !empty($request)){
   $email = htmlentities($request['email']);
   $password = htmlentities($request['password']);
   $repeat_password = htmlentities($request['repeat_password']);
   $name = htmlentities($request['name']);
   
   if($name=="" || empty($password)) {
       echo 'Name can\'t be empty.';
       die();
   }
   
   if($email=="" || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
       echo 'Email is either empty or invalid.';
       die();
   }
   
   if($password=="" || empty($password) || strlen((string) $password) < 6) {
       echo 'Password is either empty or invalid.';
       die();
   }
   
   if($password!=$repeat_password) {
       echo 'Passwords don\'t match.';
       die();
   }
   
   $query = "SELECT * FROM users WHERE email='$email'";
   $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) == 1) {
        echo "That email already exists, try loging in.";
        die();
    } else {
        $result = mysqli_query($mysqli, "INSERT INTO users(`name`, `email`, `password`) VALUES('$name', '$email', '$password')");
        if($result) {
            $user = new User($name, $email, $password);
            $_SESSION['user'] = $user;
            header('Location:/project/portal/index.php');
        } else {
            echo "Error while registering, please try again.";
        }
    }
}