<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mod</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../css/login_common.css">
</head>
<body>
    <form action="login_insert.php" method="post">
        <table>
           <tr>
               <td class="login">
                   <h2>LOGIN</h2>
               </td>
           </tr>
           <tr></tr><tr></tr>
           <table>
                <tr>
                     <td>
                         <input type="text" name="id" placeholder="ID">
                     </td>
                     <td rowspan="2">
                         <button>
                             LOGIN    
                         </button>
                     </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pw" placeholder="PASSWORD">
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="sign.php">아이디가 없으시다면?</a>
                    </td>
                    <td>
                        <a href="found.php">아이디/비밀번호 찾기</a>
                    </td>
                </tr>
            </table>
        </table>
    </form>
</body>
</html>