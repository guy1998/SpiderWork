<?php

session_start();

if (isset($_POST['viewable'])) {
    $_SESSION['viewableId'] = $_POST['viewable'];
}

if (isset($_POST['listing_id'])) {
    $_SESSION['viewableListing'] = $_POST['listing_id'];
}
