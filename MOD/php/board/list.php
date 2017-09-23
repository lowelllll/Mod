<?php
    include "../db_info.php";

    $page_size = 20;
    
    if(isset($_GET['no'])){
        $no = $_GET['no'];
    }
    if(!isset($no)||$no<0){
        $no = 0;
    }
    
    
    $sql="select * from board order by idx desc limit $no,$page_size";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    
    $sql2="select count(*) from board";
    $go2 = $pdo -> prepare($sql2);
    $go2 -> execute();
    $re2 = $go2 -> fetch();

    
    $total_row = $re2[0];
    if($total_row<=0){
        $total_row=0;
    }

    $total_page = ceil($total_row/$page_size);
    $current_page = ceil(($no+1)/$page_size);

    
    
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MOD</title>
    <link rel="stylesheet" href="../../css/board_list.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <a href="../../index.php"><h1>MOD</h1></a>
        <a href="../logout.php" id="logout_button">LOGOUT</a>
        <table width=700>
            <tr>
                <td colspan="4" align=left class="Notice">
                    Notice board
                </td>
            </tr>
            <?php
                while($re = $go->fetch()){
            ?>
            <tr>
                <td width=100 align=left>
                    <a href="read.php?idx=<?=$re['idx']?>&no=<?=$no?>"><?=$re['idx']?></a>
                </td>
                <td width=400 align=center>
                  <a href="read.php?idx=<?=$re['idx']?>&no=<?=$no?>"><?=$re['title']?></a>
                </td>
                <td width=100 align=center>
                  <?=$re['name']?>
                </td>
                <td width=100 align=center>
                    <?=$re['view']?>
                </td>
            </tr>
            <?php
                }
            ?>
            <tr>
               <td></td>
               <td></td>
               <td></td>
                <td align=center><a href="write.php">글쓰기</a></td>
            </tr>
        </table>
        <table>
            <tr>
                <td align=center>
                   <?php
                        
                        $page_list_size = 10;
                        $start_page = floor(($current_page-1)/$page_list_size)* $page_list_size +1;
                    
                        $end_page = $start_page + $page_list_size -1;
                    
                        if($total_page<$end_page){
                            $end_page=$total_page;
                        }
                    
                        if($start_page >= $page_list_size){
                            
                            $prev_list = ($start_page-2*$page_size);
                            echo "<a href=list.php?no=$prev_list>◀</a>";
                        }
                        for($i = $start_page; $i<=$end_page; $i++){
                            $page = ($i-1)*$page_size;
                            if($no != $page){
                                echo "<a href='list.php?no=$page'>";
                            }
                            echo "      ".$i;
                            if($no != $page){
                                echo "</a>";
                            }
                        }
                    
                        if($end_page<$total_page){
                            $next_page = $end_page * $page_size;
                            echo "<a href='list.php?no=$next_page'>▶</a>";
                        }
                    
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>