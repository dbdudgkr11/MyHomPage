<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "localhost";
    $user_name = "root";
    $pass = "1234";
    $db_name = "solo_example";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists solo_example";
    $result = $con->query($query) or die($con->error);
    // query문을 실행하고 결과값이 오류가 나오면 프로그램을 멈춤, 에러메세지 출력
     //$result = $con->query($query):쿼리문 실행

     //데이터 베이스 선택(sample선택)
    $con->select_db($db_name) or die($con->error);
   
    //결과가 잘못되었을때 경고하고 백함
    function alert_back($message){
        echo("
			<script>
			alert('$message');
			history.go(-1)
			</script>
			");
    }

    function input_set($data){
        $data = trim($data);
        $data = stripslashes($data);    //슬래시 역할을 방어
        $data = htmlspecialchars($data); // html -> < => $lt;
        return $data;
    }
?>