<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>아이디/비밀번호찾기</title>
    <link rel="stylesheet" href="../css/found.css">
</head>
<body>
    <div class="wrap">
        <form action="forgetid.php" method="post">
            <table>
                
            <tr><td><h2>FORGET ID</h2></td></tr>
            <tr><td><input type="text" placeholder="이름" name="name"></td></tr>
            <tr><td><input type="text" placeholder="이메일" name="email"></td></tr>
            <tr><td><button>아이디 찾기</button></td></tr>
            </table>
        </form>
        <form action="forgetpw.php" method="post">
             <table>
                
            <tr><td><h2>FORGET PASSWORD</h2></td></tr>
            <tr><td><input type="text" placeholder="이름" name="name"></td></tr>
            <tr><td><input type="text" placeholder="아이디" name="id"></td></tr>
            <tr><td><button>비밀번호 찾기</button></td></tr>
            </table>
        </form>
    </div>
</body>
</html>