<?php
    include "db_info.php";
    
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $id = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $id);
    $pw = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $pw);
    //특수문자를 제거한후 반환
    $id = strip_tags($id);
    $pw = strip_tags($pw);

    $sql = "select * from info where id = '{$id}' and pw = '{$pw}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();

    if(isset($re['id'])&&isset($re['pw'])){
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['pw']=$pw;
        
        $sql = "select name from info where id = '{$id}'";
        $go = $pdo -> prepare($sql);
        $go -> execute();
        $re = $go -> fetch();
        
        $_SESSION['name']=$re['name'];
        
        
        echo"<script>alert('로그인성공');</script>";
        
    }else{
        echo "<script>alert('아이디 혹은 비밀번호를 확인해주세요');history.back();</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mod</title>
</head>
<body>
    <meta http-equiv="refresh" content="0;url=../index.php">
</body>
</html>