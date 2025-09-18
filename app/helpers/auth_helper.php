<?php
function requireLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['user_id'])) {
        // not logged in → redirect to login page
        header("Location: /index.php/login");
        exit;
    }
}
