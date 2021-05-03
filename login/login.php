<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/MyHomPage/db/db_connect.php";

    $id   = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);

    //store procedures call
    $sql = "call signin('$id','$pass',@resultCode)";
    $result = mysqli_query($con, $sql);

    $sql = "select @resultCode";
    $out_result = mysqli_query($con, $sql);

    //$out_raw["@resultCode"] || $out_raw[0] = 0,-1,-2 확인
    $out_row = mysqli_fetch_array($out_result);
    $resultCode = $out_row[0];

    if($resultCode == -1){
      alert_back("아이디 다시 입력 요망");
      exit;
    }else if($resultCode == -2){
      alert_back("비밀번호 확인 요망");
      exit;
    }else if($resultCode == 0){
      $row = mysqli_fetch_array($result);

      //세션값을 할당한다.
      session_start();
      $_SESSION["userid"] = $row["id"];  //슈퍼글로벌변수
      $_SESSION["username"] = $row["name"];
      $_SESSION["userlevel"] = $row["level"];
      $_SESSION["userpoint"] = $row["point"];

      echo("
          <script>
            location.href = 'http://{$_SERVER["HTTP_HOST"]}/MyHomPage/index.php';
          </script>
        ");
    }//end of if
?>
