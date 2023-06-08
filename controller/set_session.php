<?php
session_start();

if (isset($_POST['listing_id'])) {
  $_SESSION['listing_id'] = $_POST['listing_id'];
}else if(isset($_POST['user_type'])){
  $_SESSION['user_type'] = $_POST['user_type'];
}

?>