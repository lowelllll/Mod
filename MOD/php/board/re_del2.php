<?php
    include "../db_info.php";
    
    $idx = $_GET['idx'];
    $bidx = $_GET['bidx'];
    $sql = "delete from reple where idx = '{$idx}'";
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