<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/db/db_connect.php";
    session_start();
    if (isset($_SESSION["userlevel"])&& $_SESSION["userlevel"] != 1 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num   = $_GET["num"];

    $sql = "delete from members where num = $num";
    $result = mysqli_query($con, $sql);

    mysqli_close($con);

    if(!$result) {
        echo "
        <script>
             alert('삭제실패');
             history.go(-1)
        </script>
      ";
    }else {
        echo "
        <script>
            alert('삭제완료');
            location.href = 'http://{$_SERVER["HTTP_HOST"]}/MyHomPage/admin/admin.php';
        </script>
      ";
       
    }
?>

