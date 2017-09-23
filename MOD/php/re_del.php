<?php
    $idx = $_GET['idx'];
    $bidx = $_GET['bidx'];
?>
<script>
    
    if(re){
       location.href='re_del2.php?idx=<?=$idx?>&bidx=<?=$bidx?>';
    }else{
        history.back();
    }
</script>