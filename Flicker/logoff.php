<?php
session_start();

if(isset($_SESSION['email']) && $_SESSION['email']!== ''){
  unset($_SESSION['email']);
  header('location:login.php');
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
