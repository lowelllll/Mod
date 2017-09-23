<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mod</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <div id="wrap">
           <div class="content">
               <div class="mod">
                    <span id="mm">M</span><span id="oo">O</span><span id="dd">D</span>
                </div>    
                <?php
                    session_start();
                    if(isset($_SESSION['id'])&&isset($_SESSION['pw'])){
                        echo"<a href='./php/logout.php'><button>LOGOUT</button></a>";
                        echo"<a href='./php/board/list.php'><button>BOARD</button></a>";
                    }else{
                        
                         echo"<a href='./php/login.php'><button>LOGIN</button></a>";
                         echo"<a href='./php/sign.php'><button>SIGN IN</button></a>";
                    }
                  
                    
                    
                  ?>
           </div>
    </div>
</body>
</html>