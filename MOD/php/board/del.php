<?php
    session_start();
    if(!isset($_SESSION['id'])&&!isset($_SESSION['pw'])){
        echo "<script>alert('로그인을 해주세요');location.href='../login.html';</script>";
        exit;
    }
    $idx = $_GET['idx'];
?>
<script>
    var re = confirm('정말 삭제하시겠습니까?');
    
    if(re){
        location.href='del2.php?idx=<?=$idx?>';
    }else{
        history.back();
    }
</script>