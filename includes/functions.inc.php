<?php

function emptyInputSignup($name, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($name) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $name) {
    $sql = "SELECT * FROM users WHERE usersName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $pwd, $gt) {
    $sql = "INSERT INTO users (usersName, usersPwd, usersGt) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=usercreated");
		echo "<p>User Created</p>";
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $hashedPwd, $gt);
    mysqli_stmt_execute($stmt);
    header("location: ../signup.php?error=usercreated");
    echo "<p>User Created</p>";
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser ($conn, $username, $pwd) {
    $userExists = uidExists($conn, $username);

    if ($userExists === false) {
        header("location: ../login.php?error=wrongusername");
        exit();
    }

    $pwdHashed = $userExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $userExists["usersId"]; 
        $_SESSION["username"] = $userExists["usersName"];
        header("location: ../index.php");
        exit();
    }
}