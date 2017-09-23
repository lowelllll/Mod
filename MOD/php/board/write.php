<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
  <link rel="stylesheet" href="../../css/write.css">
</head>
<body>
    <form action="board_insert.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td align=left>
                    <input type="text" placeholder="제목" name="title" id="title">
                </td>
                <td align=left class="bt">
                    <button>글쓰기</button>
                </td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="content" id="content" cols="100" rows="30" placeholder="내용" style="resize:none"></textarea></td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="file" value="사진" id="file">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>