<?php
    include "../db_info.php";
    session_start();
    
    if(isset($_SESSION['name'])&&isset($_SESSION['id'])){
        
    }else{
        echo "<script>alert('로그인을 하십시오');location.href='../login.php';</script>";
        exit;
    }

    //파일업로드
    $target_dir="uploads/";
    $target_file=$target_dir . basename($_FILES['file']['name']);
    $file_name=basename($_FILES['file']['name']);
    //target_file 파일이 업로드될 경로
    $uploadok=1;
    $type=pathinfo($target_file,PATHINFO_EXTENSION);
    //파일의 확장자 얻음
    
    if(isset($_POST['submit'])){
        $check = getimagesize($_FILES['file']['tmp_name']);
        if($check !==false){
              $uploadok=1;
        }else{
            echo "<script>alert('이파일은 사진이 아닙니다');history.back();</script>";
            exit;
            $uploadok=0;
        }
    }
    if(file_exists($target_file)){
        $uploadok=0;
    }
    
    
    if($_FILES['file']['size']>500000){
        echo "<script>alert('사진은 500kb가 넘으면 안됩니다.');history.back();</script>";
        exit;
        $uploadok=0;
    }

    if($uploadok==1){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            
        }else{
             echo "<script>alert('사진 업로드 실패.');history.back();</script>";
        exit;
        }
    }

    
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $content = strip_tags($_POST['content']);
    $title = strip_tags($_POST['title']);

    
    $sql = "insert into board set name = '{$name}',id='{$id}',title='{$title}',content='{$content}',date=now(),view=0,filename='{$file_name}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();
    
    
?>
<script>
    location.href="list.php";
</script>