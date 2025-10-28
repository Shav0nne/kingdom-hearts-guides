<?php
session_start();
if (isset($_SESSION['Login'])) {
    require_once 'includes/database.php';
    session_destroy();
    header('location: /');
    exit;
} else {
    header('location: /');
    exit;
}
?>
