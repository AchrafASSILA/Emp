<?php
// Check whether the session variable SESS_MEMBER_ID is present or not
if (isset($_SESSION['alogin'])) {

    $session_id = $_SESSION['alogin'];
} else {
    header('Location: ../index.php');
}
