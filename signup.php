<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //DataBase Connection

    $conn = new mysqli('localhost','root','','record');
    if($conn->connect_error)
    {
        die('Connection Failed  : '.$conn->conect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into stud(username,email,password)
        values(?, ?, ?)");
        $stmt->bind_param("ssi",$username ,$email ,$password);
        $stmt->execute();
        echo "<script>alert('Log In Successfully.....');window.location='./index.html'</script>";
        $stmt->close();
        $conn->close();
    }
?>