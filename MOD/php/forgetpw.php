<?php
    include "db_info.php";
    
    if($_POST['name']==""||$_POST['id']==""){
        echo "<script>alert('이름 혹은 아이디를 입력해주세요');history.back();</script>";
        exit;
    }
    $name = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST['name']);
    $id = preg_replace("/[ #\&\+\-%=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $_POST['id']);
    
    $name = strip_tags($name);
    $id = strip_tags($id);

    $sql = "select * from info where name = '{$name}' and id = '{$id}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();
    
    if(isset($re['name'])&&isset($re['id'])){
        echo "<script>alert('비밀번호는 {$re['pw']} 입니다');location.href='login.php';</script>";
        exit;
        
    }else{
        echo "<script>alert('입력하신 정보와 일치하는 계정이 없습니다.');history.back();</script>";
        exit;
    }
?>