<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>mingle</title>
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/css/common.css">
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/login/css/login.css">
	    <link rel="stylesheet" href="./css/normalize.css">
        <script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/login/js/login.js"></script>
	    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/MyHomPage/js/common.js"></script>
    </head>
    <body onload="slide_func()">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/header.php"; ?>
        </header>
        <section>
            <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/main_img_bar.php"; ?>
            <div id="main_content">
                <div id="login_box">
                    <div id="login_title">
                        <span>로그인</span>
                    </div>
                    <div id="login_form">
                        <form  name="login_form" method="post" action="login.php">
                            <ul>
                                <li><input type="text" name="id" placeholder="아이디" ></li>
                                <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                            </ul>
                            <div id="login_btn">
                                <a href="#"><img src="../img/login.png" onclick="check_input()"></a>
                            </div>
                        </form>
                    </div> <!-- login_form -->
                </div> <!-- login_box -->
            </div> <!-- main_content -->
            <div>
                <input type="button" value="kakao">
                <input type="button" value="kakao">
                <input type="button" value="kakao">
            </div>
        </section>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/MyHomPage/footer.php"; ?>
        </footer>
    </body>
</html>

