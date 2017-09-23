<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>alert('로그인을 해주세요');location.href='../login.html';</script>";
        exit;
    }
    

    include "../db_info.php";
    $idx = $_GET['idx'];
    $sql = "select * from board where idx = '{$idx}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();

    if($_SESSION['id']!=$re['id']){
        echo "<script>alert('수정 권한이 없습니다');location.href='list.php';</script>";
        exit;
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
  <link rel="stylesheet" href="../../css/write.css">
</head>
<body>
    <form action="update.php?idx=<?=$idx?>" method="post">
        <table>
            <tr>
                <td align=left>
                    <input type="text" placeholder="제목" name="title" value=<?=$re['title']?>>
                </td>
                <td align=left class="bt">
                    <button>글쓰기</button>
                </td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="content" id="content" cols="100" rows="30" placeholder="내용" style="resize:none"><?=$re['content']?>
                </textarea></td>
            </tr>
        </table>
    </form>
</body>
</html>