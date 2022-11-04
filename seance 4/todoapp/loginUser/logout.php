<?php 
    session_start();
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location:loginPage.phtml?msg=you have been loged out&type=success");
?>