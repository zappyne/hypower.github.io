<?php

if (!isset($_POST["submit"])) {

    $name = $_POST["name"];
    $gt = $_POST["gamertag"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $pwd, $pwdRepeat, $gt) !== false) {
        header("location: ../signup.php?error=emptyinputs");
        exit();
    }

    if (invalidUid($name) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $name) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $pwd, $gt);

}
else {
    header("location: ../signup.php");
};
