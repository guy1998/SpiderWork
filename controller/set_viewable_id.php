<?php

session_start();

if(isset($_POST['viewable'])){
    $_SESSION['viewableId'] = $_POST['viewable'];
}