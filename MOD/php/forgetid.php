<?php
    include "db_info.php";
      if($_POST['name']==""||$_POST['email']==""){
        echo "<script>alert('이름 혹은 이메일를 입력해주세요');history.back();</script>";
        exit;
    }
    $name = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST['name']);
    $email = preg_replace("/[ #\&\+\-%=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST['email']);

    $name = strip_tags($name);
    $email = strip_tags($email);
    
    $sql = "select * from info where name = '{$name}' and mail = '{$email}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();

    if(isset($re['name'])&&isset($re['mail'])){
        echo "<script>alert('아이디는 {$re['id']} 입니다.');location.href='login.php';</script>";
        exit;
    }else{
        echo "<script>alert('입력하신 정보와 일치하는 계정이 없습니다.');history.back();</script>";
        exit;
    }

?>