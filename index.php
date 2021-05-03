<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1513a75356.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css?after4">
    <link rel="stylesheet" href="./css/normalize.css">
    <script src="./js/common.js"></script>
    <title>My HomePage</title>
</head>
<body onload="slide_func()">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/header.php";?>
    </header>   
    <section>
        <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/main.php";?>
    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/MyHomPage/footer.php"; ?>
    </footer>
</body>
</html>