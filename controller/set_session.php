<?php
session_start();

if (isset($_POST['listing_id'])) {
  $_SESSION['listing_id'] = $_POST['listing_id'];
}

?>