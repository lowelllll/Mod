<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mod</title>
    <link rel="stylesheet" href="../css/sign_common.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <form action="sign_insert.php" method="POST">
        <table>
            <tr>
                <td colspan="1"><h2>SIGN IN</h2> </td>
                
            </tr>
            
            <tr>
                <td class="title">NAME</td><td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td class="title">ID</td><td><input type="text" name="id" required></td>
            </tr>
            <tr>
                <td class="title">PASSWORD</td><td><input type="password" name="pw" required></td>
            </tr>
            <tr>
                <td class="title">BIRTH</td>
                <td>
                    <select name="year" id="year">
                        <?php
                            for($i=1940;$i<=2017;$i++){
                                echo"<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>&nbsp;
                    <select name="mon" id="mon">
                        <?php
                            for($i=1;$i<=12;$i++){
                                echo"<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>&nbsp;
                    <select name="date" id="date">
                        <?php
                            for($i=1;$i<=31;$i++){
                                echo"<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title">Eamil</td><td><input type="text" name="mail" required></td>
            </tr>
            <tr>
                <td rowspan="2" class="title">ADDRESS</td>
                <td><input type="text" id="sample6_postcode" placeholder="우편번호" name="zip" required>
                <input type="button" onclick="sample6_execDaumPostcode()" value="Zip code" class="find"></td>
               </td>
               </tr>
                <tr>
                    <td>
                        <input type="text" id="sample6_address" placeholder="주소" name="zip2" required>
                        <input type="text" id="sample6_address2" placeholder="상세주소" name="zip3" required>
                        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
 
                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수
 
                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;
 
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }
 
                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }
 
                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('sample6_address').value = fullAddr;
 
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('sample6_address2').focus();
            }
        }).open();
    }
</script>
                    </td>
                </tr>
            </tr>
            <tr>
                <td class="title">TEL</td>
                <td>
                    <select name="tel" id="tel">
                        <option value="010">010</option>
                        <option value="018">018</option>
                        <option value="017">017</option>
                    </select>
                    -
                    <input type="text" size="5" maxlength="4" class="phone" name="tel2" required>
                    -
                    <input type="text" size="5" maxlength="4" class="phone" name="tel3" required>
                </td>
            </tr>
            
            
        </table>
        <button>SIGN IN</button>
    </form>
</body>
</html>