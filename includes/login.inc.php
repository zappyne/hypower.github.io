<?php

if (!isset($_POST["submit"])) {
    
    $username = $_POST["name"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinputs");
        exit();

    }

    loginUser($conn, $username, $pwd);

}
else {
    header("location: ../index.php");
    exit();
}