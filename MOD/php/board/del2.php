<?php
    include "../db_info.php";
    $idx = $_GET['idx'];
    $sql = "delete from board where idx = '{$idx}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();

?>
<script>
    alert('게시글이 삭제되었습니다');
    location.href="list.php";
</script>