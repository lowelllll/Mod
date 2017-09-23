<?php
    $idx = $_GET['idx'];
    $bidx = $_GET['bidx'];
?>
<script>
    var re = confirm('댓글을 삭제하시겠습니까?');
    if(re){
       location.href='re_del2.php?idx=<?=$idx?>&bidx=<?=$bidx?>';
    }else{
        history.back();
    }
</script>