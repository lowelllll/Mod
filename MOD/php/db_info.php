<?php
    //try-catch 프로그램 실행 중 예외가 발생했을때 개발자가 직접 처리할수있도록 제공하는 구문
    //
    try{
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=data;charset=utf8","root","");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //echo "성공";
    }catch(PDOException $e){
        die("실패".$e -> getMessage());
    }
?>