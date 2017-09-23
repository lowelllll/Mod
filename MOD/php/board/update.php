<?php
   session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>alert('로그인을 해주세요');location.href='../login.html';</script>";
        exit;
    }
    include "../db_info.php";
    $idx = $_GET['idx'];
    $sql = "update board set title = '{$_POST['title']}',content = '{$_POST['content']}' where idx= '{$idx}'
    ";
    $go = $pdo -> prepare($sql);
    $go -> execute();

?>
<script>
    alert('게시글이 수정되었습니다');
    location.href='read.php?idx=<?=$idx?>';
</script>