<?php
    session_start();
    if(!isset($_SESSION['id'])||!isset($_SESSION['name'])){
        echo "<script>alert('로그인을 하십시오.');location.href='login.php';</script>";
        exit;
    }

    $_POST['content']=strip_tags($_POST['content']);
    include "../db_info.php";
    $bidx = $_POST['bidx'];
    $sql = "insert into reple set bidx = '{$bidx}', name='{$_SESSION['name']}',id='{$_SESSION['id']}',content='{$_POST['content']}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <meta http-equiv="refresh" content="0;url=read.php?idx=<?=$bidx?>">
</body>
</html>