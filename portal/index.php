<?php
require_once('../models/User.php');

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "Hello dragi " . $_SESSION['user']->email;