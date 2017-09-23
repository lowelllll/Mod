
<?php
    include "db_info.php";

    $id = $_POST['id'];
    $id = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $id);
    //특수문자를 제거한후 반환
    $id = strip_tags($id);
    //html 태그와 php 태그를 제거한후 반환

    $sql = "select * from info where id = '{$id}'";
    //아이디 중복검사
    $go = $pdo -> prepare($sql);
    $go -> execute();
    $re = $go -> fetch();

    if($re['id']==$id){
        echo "<script>alert('아이디가 중복되었습니다');location.href='sign.php';</script>";
        exit;
    }
    
    $birth = $_POST['year'].$_POST['mon'].$_POST['date'];
    $tel = $_POST['tel'].$_POST['tel2'].$_POST['tel3'];
    $zip = $_POST['zip2'].$_POST['zip3'];

    $sql = "insert into info set name='{$_POST['name']}', id='{$id}',pw='{$_POST['pw']}',birth='{$birth}',mail='{$_POST['mail']}',host='{$_POST['zip']}',zip='{$zip}',tel='{$tel}'";
    $go = $pdo -> prepare($sql);
    $go -> execute();

    echo "<script>alert('회원가입이 완료되었습니다!');location.href='../index.php'</script>";
?>
!