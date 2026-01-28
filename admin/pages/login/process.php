<?php
session_start();
include "../../../connection.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "
    SELECT * FROM user
    WHERE username = '$username'
    LIMIT 1
    ");

    if (mysqli_num_rows($query)=== 1){
        $data = mysqli_fetch_assoc($query);

        if(password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];

            header("Location: ../../index.php");
            exit;
        } else {
            header("Location: index.php?error=password");
            exit;
        }
    }else{
        header("Location: index.php?error=username");
        exit;
    }

}



?>