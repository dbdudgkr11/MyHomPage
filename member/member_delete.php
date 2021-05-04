<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/MyHomPage/db/db_connect.php";
    $id = $_POST["id"];

    $sql = "delete from members  where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));

    if ($value) {
        echo "<script>
                    alert('고객님 그동안 감사합니다.');
                    history.go(-1);
              </script>";
        
    } else {
        echo "<script>
                    alert('삭제 실패');
                    history.go(-1);
              </script>";
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/index.php";
?>






