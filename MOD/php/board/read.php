<?php
    include "../db_info.php";
    session_start();
    $idx = $_GET['idx'];
    $sql="select * from board where idx = '{$idx}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/board_read.css">
</head>
<body>
    <table width=780 id="tab">
        <tr>
            <td class="name" align=left>
                <?=$re['name']?>
            </td>
        </tr>
        <tr>
            <td class="title" align=left>
                <?=$re['title']?>
            </td>
        </tr>
        <tr>
            <td class="date" align=left>
                <?=$re['date']?>
                        &nbsp;&nbsp;&nbsp;
                <?=$re['view']?>
            </td>
            <td align=right>
               <?php
            if($_SESSION['id']==$re['id']){
            ?>
               <a href="edit.php?idx=<?=$idx?>">수정</a>
               <a href="del.php?idx=<?=$idx?>">삭제</a>
               <?php
            }
                ?>
                <a href="list.php">목록</a>
                <a href="write.php">글쓰기</a>
            </td>
        </tr>
        <tr >
            <td colspan=3>
            <div id="hr"></div>
            </td>
        </tr>
        <tr>
            <td colspan=3>
                 <pre class="content">
                 <?=$re['content']?><br>
                 <?php
                    if($re['filename']!=""){
                        echo "<img src='./uploads/{$re['filename']}' width='700' height='700'>";
                    }
                 ?>
                 </pre>
            </td>
        </tr>
    </table>
    <form action="reple.php" method="post">
    <table width=780>
        <tr>
            <td width=100>
               <?=$_SESSION['name']?>
            </td>
            <td>
                <input type="text" name="content">
                <input type="hidden" name="bidx" value="<?=$idx?>">
            </td>
            <td colspan="2">
                <button>댓글 입력</button>
            </td>
        </tr>
        <tr>
           
        </tr>
        <?php
        
            $sql = "select * from reple  where bidx = '{$idx}' order by idx desc";
            $go = $pdo -> prepare($sql);
            $go -> execute();
            while($re = $go->fetch()){
        ?>
        <tr height=10>
            <td>
                <?=$re['name']?>
            </td>
            <td>
                <?=$re['content']?>
            </td>
            <td align="right">
               <?php
                if($_SESSION['id']==$re['id']){
                    echo "<a href='re_del.php?idx={$re['idx']}&bidx=$idx'>삭제</a>";
                 }
            ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    </form>
</body>
</html>
<?php
    
    
    $sql="update board set view = view+1 where idx = $idx";
    $go = $pdo -> prepare($sql);
    $go -> execute();
?>